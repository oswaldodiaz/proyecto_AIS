<?php
	require_once('calendar/classes/tc_calendar.php');
	date_default_timezone_set('America/Caracas');
	session_start();
	header("Cache-control: private");
	if ($_SESSION['estado']  == "Conectado"){
		echo "<p><font face='arial' size='3'>Bienvenido " .$_SESSION['usuario']."<a style='margin-left: 2em' href='../index.php'>Cerrar Sesi&oacute;n</a></font></p>";
	}
	include ('conexion.php');
	$id = $_POST['id'];
	$query_servicio = mysql_query ("SELECT * FROM usuarios WHERE id = '$id'",$db_link);
	$resultado = mysql_fetch_array($query_servicio);
	$servicio = $resultado['servicio_id'];


	function dameDiaLetra($diaNumero){
		switch($diaNumero){
			case "Sunday":	return("Domingo");		break;
			case "Monday": return("Lunes");			break;
			case "Tuesday": return("Martes");		break;
			case "Wednesday": return("Miercoles");	break;
			case "Thursday": return("Jueves");		break;
			case "Friday": return("Viernes");		break;
			case "Saturday": return("Sabado");		break;
			default:	return("Nada");				break;
		}
	}

	function dameDiaMayus($diaNumero){
		switch($diaNumero){
			case "domingo":	return("Domingo");		break;
			case "lunes": return("Lunes");			break;
			case "martes": return("Martes");		break;
			case "miercoles": return("Miercoles");	break;
			case "jueves": return("Jueves");		break;
			case "viernes": return("Viernes");		break;
			case "sabado": return("Sabado");		break;
			default:	return("Nada");				break;
		}
	}
	
	function dameMes($mes){
		switch($mes){
			case "01":	return("Enero");		break;
			case "02":	return("Febrero");		break;
			case "03": 	return("Marzo");		break;
			case "04": 	return("Abril");		break;
			case "05": 	return("Mayo");			break;
			case "06": 	return("Junio");		break;
			case "07": 	return("Julio");		break;
			case "08": 	return("Agosto");		break;
			case "09": 	return("Septiembre");	break;
			case "10": 	return("Octubre");		break;
			case "11": 	return("Noviembre");	break;
			case "12": 	return("Diciembre");	break;
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Seguro</title>

		<link rel="stylesheet" href="../css/jquery.ui.all.css">
		<link rel="stylesheet" href="../css/fondo.css">
		<link rel="stylesheet" href="../css/demos.css">
		<link type="text/css" href="../css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		
		<script src="../js/sesion.js" language="javascript" type="text/javascript"> </script>
		<script language="javascript" src="calendar/calendar.js"></script>

		<script src="../js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="../js/jquery-1.7.1.js"></script>
		<script src="../js/jquery.ui.core.js"></script>
		<script src="../js/jquery.ui.position.js"></script>
		<script src="../js/jquery.ui.widget.js"></script>
		<script src="../js/jquery.ui.tabs.js"></script>
		<script>
		$(function() {
			$( "#tabs" ).tabs();
		});

		function funcion_hora_llegada(boton){
			var currentTime = new Date()
			var hours = currentTime.getHours()
			var minutes = currentTime.getMinutes()
			if (minutes < 10){
				minutes = "0" + minutes
			}
			
			if(hours > 11){
				boton.value = hours + ":" + minutes + " PM";
			} else {
				boton.value = hours + ":" + minutes + " AM";
			}
			boton.disabled = true;

		}
		function cambiarCheck(check){
			check.disabled = true;
		}
		</script>
	</head>
	
	<body>
		<div class='demo'>
			<div id='tabs'>
				<ul>
					<li><a href='#tabs-1'>Citas del dia</a></li>
				</ul>

				<div id='tabs-1' align = 'center'>
					<div id = 'resultado'>	
						<?php
							$fecha = date("Y-m-d");
							$fecha_array = explode("-",$fecha);
							
							if($dia = dameDiaLetra(strftime('%A',strtotime($fecha))) == "Nada")
								$dia = dameDiaMayus(strftime('%A',strtotime($fecha)));
							echo "<p>
									<font color = '#000000'>
										" .$dia. ", " .$fecha_array[2]. " de " .dameMes($fecha_array[1]). " de " .$fecha_array[0]. "
									</font>
								</p>";

							$query2 = mysql_query ("SELECT * FROM cita where fecha='$fecha' AND medico_id IN (SELECT id FROM usuarios WHERE servicio_id = '$servicio') ORDER BY medico_id", $db_link);

							if (mysql_num_rows($query2)!= 0){
								echo "
								<table>";
									echo "<tr>
										<td align='center'><font color = '#000000'><p>M&eacute;dico</p></font></td>
										<td align='center'><font color = '#000000'><p>C&eacute;dula, Nombre, Edad, Sexo</p></font></td>
										<td align='center'><p><font color = '#000000'>Tipo de paciente</font></p></td>
										<td align='center'><font color = '#000000'><p>Residencia: Prov/Dist/Corrg</p></font></td>
										<td align='center'><p><font color = '#000000'>Frec. Inst.</font></p></td>
										<td align='center'><p><font color = '#000000'>Frec. Serv.</font></p></td>
										<td align='center'><p><font color = '#000000'>Tipo de Atencion</font></p></td>
										<td align='center'><p><font color = '#000000'>Atencion por</font></p></td>
										<td align='center'><p><font color = '#000000'>Area de Referencia</font></p></td>
										<td align='center'><p><font color = '#000000'>Hora de Llegada</font></p></td>
										<td align='center'><p><font color = '#000000'>Atendido</font></p></td>
									</tr>";
									while ($fila = mysql_fetch_array ($query2)){
										$medico = $fila['medico_id'];
										$query_medico = mysql_query ("SELECT * FROM usuarios WHERE id = '$medico'",$db_link);
										$query_medico_resultado = mysql_fetch_array($query_medico);
										$nombre = $query_medico_resultado['nombre_completo'];

										$cita_id = $fila['id'];
										$paciente_id = $fila['paciente_id'];
										$query_paciente = mysql_query("SELECT * FROM pacientes WHERE id = '$paciente_id'",$db_link);
										$paciente_row = mysql_fetch_array ($query_paciente);

										$fecha_nacimiento = $paciente_row['fecha_nacimiento'];
										$fecha_array = explode("-",$fecha_nacimiento);
										$edad  = date("Y") - $fecha_array[0];
										$month_diff = date("m") - $fecha_array[1];
										$day_diff   = date("d") - $fecha_array[2];
										if ($day_diff < 0 || $month_diff < 0)	$edad--;
										
										echo"
										<tr>
											<td align='center'><font color = '#000000'><p>" .$nombre."</p></font></td>
											<td align='center'><p><font color = '#000000'>
											".$paciente_row['id']. ", "
											.$paciente_row['nombre_completo']. " ".$paciente_row['primer_apellido']." ".$paciente_row['segundo_apellido'].", "
											.$edad. ", " .$paciente_row['sexo']. "</font></p></td>
											<td align='center'><p><font color = '#000000'>  " .$fila['tipo_paciente']."  </font></p></td>
											<td align='center'><p><font color = '#000000'>  " .$paciente_row['provincia']."/" .$paciente_row['distrito']. "/" .$paciente_row['corregimiento']. " </font></p></td>
											<td align='center'><p><font color = '#000000'>  " .$fila['frecuentacion_inst']. " </font></p></td>
											<td align='center'><p><font color = '#000000'> " .$fila['frecuentacion_serv']. "</font></p></td>
											<td align='center'><p><font color = '#000000'>  " .$fila['tipo_atencion']. " </font></p></td>
											<td align='center'><p><font color = '#000000'>  " .$fila['atencion_por']. "</font></p></td>
											<td align='center'><p><font color = '#000000'> " .$fila['area_referencia']. "</font></p></td>
											<td align='center'><input type = 'button' id = 'secretaria_boton' name = 'secretaria_boton' value = 'Registrar Llegada' onclick ='funcion_hora_llegada(this);return false;'/></td>
											<td align='center'><input type='checkbox' name='option' value='' onclick = 'cambiarCheck(this);'><br></td>
										</tr>";
									}
								echo "</table>";
								
							}else{
								echo "No hay citas para este día";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
