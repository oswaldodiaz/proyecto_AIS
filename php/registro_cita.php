<?php
	session_start(); 
	include ('conexion.php');
	date_default_timezone_set('America/Caracas');

	function dameDiaLetra($diaNumero){
		switch($diaNumero){
			case "Sunday":	return("domingo");		break;
			case "Monday": return("lunes");		break;
			case "Tuesday": return("martes");		break;
			case "Wednesday": return("miercoles");		break;
			case "Thursday": return("jueves");		break;
			case "Friday": return("viernes");		break;
			case "Saturday": return("sabado");		break;
		}
	}	
	
	$today = date("Y-m-d");
	$servicio = $_POST['servicios'];
	$id = $_POST['id'];
	
	//Si el paciente ya ha tenido cita en el servicio, se busca al medico que lo atendió por ultima vez
	$query = 	"SELECT U.id 
				FROM usuarios AS U, cita AS C 
				WHERE U.id = C.medico_id AND C.paciente_id='$id' AND U.servicio_id='$servicio'
				GROUP BY U.id";
	$query_medico = mysql_query($query,$db_link);
	if (mysql_num_rows($query_medico) != 0)//El paciente ya ha sido atendido en este servicio
	{
		$medico = mysql_fetch_array ($query_medico);
		$codigo_medico = $medico['id'];
	}
	else
	{
		$query = 	"SELECT id
					FROM usuarios 
					WHERE rol='Medico' AND servicio_id='$servicio' AND id NOT IN(SELECT medico_id
																				FROM cita
																				WHERE fecha>='$today'
																				GROUP BY medico_id)";
																				
		$query_medico = mysql_query($query,$db_link);
		if (mysql_num_rows($query_medico) != 0)//Existen medicos pertenecientes a este servicio que no tienen cita asignadas en un futuro
		{
			$medico = mysql_fetch_array ($query_medico);
			$codigo_medico = $medico['id'];
		}
		else
		{
			$query = mysql_query ("
			SELECT count(C.id), C.medico_id
			FROM cita as C, usuarios as U 
			WHERE C.fecha>='$today' AND U.rol='Medico' AND U.servicio_id='$servicio' AND C.medico_id=U.id
			GROUP BY medico_id
			ORDER BY count(C.id) ASC");
			$query_medico = mysql_query($query,$db_link);
			if (mysql_num_rows($query_medico) != 0)//Se elegirá al medico que tenga menos citas programadas
			{
				$medico = mysql_fetch_array ($query_medico);
				$codigo_medico = $medico['medico_id'];
			}
			else
			{
				$codigo_medico = 0;
			}
		}
	}
	
	if($codigo_medico != 0)
	{
		//Verificar que el paciente no tenga cita ya con el medico
		$query = "SELECT * FROM cita WHERE medico_id = '$codigo_medico' AND paciente_id=$id AND fecha>='$today'";
		$query_cita = mysql_query ($query,$db_link);
		if(mysql_num_rows($query_cita) != 0)//El paciente ya tiene una cita asignada con este medico
		{
			echo "El paciente ya tiene una cita asignada con este m&eacute;dico";
		}
		else
		{
			//Este query va a guardar el arreglo de turnos del medico $codigo_medico
			$query = "SELECT * FROM turnos WHERE medico_id = '$codigo_medico'";
			$query_dia = mysql_query ($query,$db_link);
			$array = mysql_fetch_array ($query_dia);
			
			$fecha_aux = $today;//A partir de la fecha actual se buscara la cita para la fecha más cercana
			while(true)
			{
				//Aqui se obtiene la cantidad de citas del medico en cuestion para una fecha en especifico
				$query = "SELECT * FROM cita WHERE medico_id = '$codigo_medico' AND fecha = '$fecha_aux'";
				$query_fecha = mysql_query ($query,$db_link);
				$cant = mysql_num_rows($query_fecha);
				
				//$max va a almacenar la cantidad maxima de citas para el dia 
				$dia_semana = dameDiaLetra(strftime('%A',strtotime($fecha_aux)));
				$max = $array[$dia_semana];
				
				if($cant < $max){//Existe disponibilidad para este dia
					$fecha = $fecha_aux;
					if($cant < $max/2)	$turno = "Mañana";
					else	$turno = "Tarde";
					break;
				}

				$date = new DateTime($fecha_aux);
				$date->modify('+1 day');
				$fecha_aux = $date->format('Y-m-d');
			}
			//echo(dameDiaLetra(strftime('%A',strtotime($fecha_aux))));
			$query = mysql_query ("INSERT INTO cita 
									(paciente_id, medico_id, atencion_por, tipo_paciente, frecuentacion_inst, frecuentacion_serv, tipo_atencion, area_referencia, fecha, turno)
									VALUES 
									('{$_POST['id']}', '$codigo_medico','{$_POST['atencion_por']}','{$_POST['tipo_paciente']}','{$_POST['frecuentacion_institucion']}','{$_POST['frecuentacion_servicio']}','{$_POST['tipo_atencion']}','{$_POST['area_referencia']}','$fecha','$turno')", $db_link);
		
			echo "Se guard&oacute; la cita exitosamente";
		}
	}
	
?>