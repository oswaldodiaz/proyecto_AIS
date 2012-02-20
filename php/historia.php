<?php
session_start();
header("Cache-control: private");
if ($_SESSION['estado']  == "Conectado"){
  echo "<font face='arial' size='3'>Bienvenido/a " .$_SESSION['usuario']."</font>";
}
include ('conexion.php');
$id = $_POST['id'];
$medico = $_POST['medico'];
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
		<div id = 'resultado'>
			<div class='demo'>

				<div id='tabs'>
					<ul>
						<li><a href='#tabs-1'>Historia Médica</a></li>
					</ul>

					<div id='tabs-1' align = 'center'>
						<?php
							$query_hitoria = mysql_query ("SELECT * FROM cita where paciente_id = '$id' ORDER BY 'fecha'", $db_link);
							$query_datos = mysql_query ("SELECT * FROM pacientes WHERE id = '$id'", $db_link);
							if (mysql_num_rows($query_hitoria)!= 0){
								echo "<div id='datos_paciente'>";
									$fila = mysql_fetch_array ($query_datos);
									$array = array($fila['nombre_completo'],$fila['primer_apellido'],$fila['segundo_apellido']);
									$nombre = implode(" ", $array);
									$fecha_array = explode("-",$fila['fecha_nacimiento']);
									$edad  = date("Y") - $fecha_array[0];
									$month_diff = date("m") - $fecha_array[1];
									$day_diff   = date("d") - $fecha_array[2];
									if ($day_diff < 0 || $month_diff < 0)	$edad--;
									
									echo "
									<table>
										<tr>
											<td><p><font color = '#000000'>C&eacute;dula</font></p></td>
											<td><p><font color = '#000000'>Nombre completo</font></p></td>
											<td><p><font color = '#000000'>Sexo</font></p></td>
											<td><p><font color = '#000000'>Edad</font></p></td>
											<td><p><font color = '#000000'>N&uacute;mero de historia</font></p></td>
										</tr>
										<tr>
											<td><p><font color = '#000000'>" .$fila['id']. "</font></p></td>
											<td><p><font color = '#000000'> " .$nombre."</font></p></td>
											<td><p><font color = '#000000'>  " .$fila['sexo']. " </font></p></td>
											<td><p><font color = '#000000'>  " .$edad."  </font></p></td>
											<td><p><font color = '#000000'>  " .$fila['numero_historia']. " </font></p></td>
										</tr>
									</table><br></br>";
								
									echo "<div id='historial_citas'>";
										$query_hitoria = mysql_query ("SELECT * FROM cita where paciente_id = '$id' ORDER BY 'fecha'", $db_link);										
										if (mysql_num_rows($query_hitoria)!= 0){
										
											echo "
												<table>";
													echo "<tr>
														<td><p><font color = '#000000'>Cita</font></p></td>
														<td><p><font color = '#000000'>Servicio</font></p></td>
														<td><p><font color = '#000000'>Medico</font></p></td>
														<td><p><font color = '#000000'>Tipo de paciente</font></p></td>
														<td><p><font color = '#000000'>Frecuentacion en la institucion</font></p></td>
														<td><p><font color = '#000000'>Frecuentacion de servicio</font></p></td>
														<td><p><font color = '#000000'>Tipo de Atencion</font></p></td>
														<td><p><font color = '#000000'>Atencion por</font></p></td>
														<td><p><font color = '#000000'>Area de Referencia </font></p></td>
														<td><p><font color = '#000000'>Fecha</font></p></td>
														<td><p><font color = '#000000'>Turno</font></p></td>
														<td><p><font color = '#000000'>Ver</font></p></td>
													</tr>";
													
													while ($fila = mysql_fetch_array ($query_hitoria)){
														$medico_id = $fila['medico_id'];
														$query_servicio = mysql_query ("SELECT nombre_servicio FROM servicios where codigo_servicio IN (SELECT servicio_id FROM usuarios WHERE id = '$medico')", $db_link);
														$servicio = mysql_fetch_array ($query_servicio);
														
														$query_medico = mysql_query ("SELECT * FROM usuarios WHERE id = '$medico_id'",$db_link);
														$medico_datos = mysql_fetch_array ($query_medico);
														
														if($fila['turno'] == "Mañana")
															$fila['turno'] = "Ma&ntilde;ana";
														
														echo"
														<tr>
															<td><p><font color = '#000000'>" .$fila['id']. "</font></p></td>
															<td><p><font color = '#000000'>" .$servicio['nombre_servicio']. "</font></p></td>
															<td><p><font color = '#000000'>" .$medico_datos['nombre_completo']. " </font></p></td>
															<td><p><font color = '#000000'>" .$fila['tipo_paciente']."  </font></p></td>
															<td><p><font color = '#000000'>" .$fila['frecuentacion_inst']. " </font></p></td>
															<td><p><font color = '#000000'>" .$fila['frecuentacion_serv']. "</font></p></td>
															<td><p><font color = '#000000'>" .$fila['tipo_atencion']. " </font></p></td>
															<td><p><font color = '#000000'>" .$fila['atencion_por']. "</font></p></td>
															<td><p><font color = '#000000'>" .$fila['area_referencia']. "</font></p></td>
															<td><p><font color = '#000000'>" .$fila['fecha']. "</font></p></td>
															<td><p><font color = '#000000'>" .$fila['turno']. "</font></p></td>
															<td>
																<form id = 'volver' onsubmit = '' action = 'verCita.php' method = 'POST'>
																<input type = 'hidden' id = 'id' name = 'id' value = ".$fila['id'].">
																<input type = 'hidden' id = 'medico' name = 'medico' value = '$medico'>
																<input type = 'submit' value='Ver Cita'/></form>
															</td>
														</tr>";
													}
												echo "</table>";
												echo "<form id = 'volverMedicoDesdeHistoria' onsubmit = '' action = 'medico.php' method = 'POST'>
													<input type = 'hidden' id = 'id' name = 'id' value = '$medico'>
													<input type = 'submit' value='Volver'/>
												</form>";
										}else{
											echo "No hay registro de citas";
										}
									echo "</div>";
								echo "</div>";
							}
							else
							{
								echo "Error en el query";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
