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

	function dameDiaLetra($diaNumero){
		switch($diaNumero){
			case "Sunday":	return("domingo");		break;
			case "Monday": return("lunes");		break;
			case "Tuesday": return("martes");		break;
			case "Wednesday": return("miercoles");		break;
			case "Thursday": return("jueves");		break;
			case "Friday": return("viernes");		break;
			case "Saturday": return("sabado");		break;
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
							
							if($dia = dameDiaLetra(strftime('%A',strtotime(date($fecha)))) == "Nada")
								$dia = strftime('%A',strtotime(date($fecha)));
							echo "<p>
									<font color = '#000000'>
										" .$dia. ", " .$fecha_array[2]. " de " .dameMes($fecha_array[1]). " de " .$fecha_array[0]. "
									</font>
								</p>";
							
							$query2 = mysql_query ("SELECT * FROM cita where medico_id = '$id' AND fecha='$fecha'", $db_link);
							
							if (mysql_num_rows($query2)!= 0){
								echo "
								<table>";
									echo "<tr>
										<td align='center'><font color = '#000000'><p>C&eacute;dula, Nombre, Edad, Sexo</p></font></td>
										<td align='center'><p><font color = '#000000'>Tipo de paciente</font></p></td>
										<td align='center'><font color = '#000000'><p>Residencia: Prov/Dist/Corrg</p></font></td>
										<td align='center'><p><font color = '#000000'><p>Frec. Inst.</font></p></td>
										<td align='center'><p><font color = '#000000'>Frec. Serv.</font></p></td>
										<td align='center'><p><font color = '#000000'>Tipo de Atencion</font></p></td>
										<td align='center'><p><font color = '#000000'>Atencion por</font></p></td>
										<td align='center'><p><font color = '#000000'>Area de Referencia</font></p></td>
										<td align='center'><p><font color = '#000000'>Historia</font></p></td>
										<td align='center'><p><font color = '#000000'>Informe</font></p></td>
									</tr>";
									while ($fila = mysql_fetch_array ($query2)){
									
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
											<td align='center'>
												<form  action = 'historia.php' method = 'POST'>
												<input type = 'hidden' id = 'id' name = 'id' value = '$paciente_id'/>
												<input type = 'hidden' id = 'medico' name = 'medico' value = '$id'/>
												<INPUT TYPE='submit' value='Ver Historia'/></form>
											</td>
											<td align='center'>
												<form  action = 'informe.php' method = 'POST'>
												<input type = 'hidden' id = 'id' name = 'id' value = '$cita_id'>
												<INPUT TYPE='submit' value='Informe'/></form>
											</td>
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
