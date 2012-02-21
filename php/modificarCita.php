<?php
session_start();
header("Cache-control: private");
require_once('calendar/classes/tc_calendar.php');
date_default_timezone_set('America/Caracas');
if ($_SESSION['estado']  == "Conectado"){
  echo "<font face='arial' size='3'>Bienvenido/a " .$_SESSION['usuario']."</font>";
}
include ('conexion.php');
$id = $_POST['id'];
$taquillero = $_POST['taquillero'];


$paciente_id = ""; $medico_id = ""; $tipo_paciente = ""; $frecuentacion_inst = ""; $frecuentacion_serv = ""; $tipo_atencion = ""; $atencion_por = ""; $area_referencia = ""; $fecha = ""; $turno = ""; $codigo = "";
$query = mysql_query ("SELECT * FROM cita where id = '$id'", $db_link);
        
if (mysql_num_rows($query)!= 0)
{
	$r = mysql_fetch_array ($query);
	
	$paciente_id = $r['paciente_id'];
	$medico_id = $r['medico_id'];
	$tipo_paciente = $r['tipo_paciente'];
	$frecuentacion_inst = $r['frecuentacion_inst'];
	$frecuentacion_serv =  $r['frecuentacion_serv'];
	$tipo_atencion =  $r['tipo_atencion'];
	$atencion_por = $r['atencion_por'];
	$area_referencia = $r['area_referencia'];
	$fecha = $r['fecha'];
	$fecha_array = explode("-",$fecha);
	$turno = $r['turno'];
	
	$query2 = mysql_query ("SELECT servicio_id FROM usuarios where id = '$medico_id'", $db_link);
	$r2 = mysql_fetch_array ($query2);
	$codigo = $r2['servicio_id'];
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
		
		function modificarMedico(){
			var form = document.getElementById('formulario_modificar_cita');
			var parametros = "codigo="+form.servicios.options[form.servicios.selectedIndex].value
			divResultado = document.getElementById('div_medico');
			datos = "actualizar_medico.php";
			var ajax=false;
			try	{   ajax = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
					try {   ajax = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (E) {    ajax = false;
					}
			}
			if (!ajax && typeof XMLHttpRequest!='undefined') {    ajax = new XMLHttpRequest();   }
			ajax.open("POST", datos,true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
						divResultado.innerHTML = ajax.responseText
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send(parametros);
		}
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
						<form id = "formulario_modificar_cita" onsubmit = "GuardarModificacionCita();return false;" action = "" method = "POST">
							<table>
								<tr>
				  					<td><font color = "#000000">Cedula del paciente:</font></td>
								    <td><input type = "text" value = "<? echo $paciente_id;?>" name = "paciente" id = "paciente" style="width:150px" disabled /></td>
								</tr>
								<tr>
									<td><font color = "#000000">Atencion por:</font></td>
									<td><select name="atencion_por" style="width:150px" id = "atencion_por">
										<?php
										if($atencion_por == "Control")
											echo "<option value='Control' SELECTED>Consulta-Control</option>
											<option value='Morbilidad'>Consulta-Morbilidad</option>
											<option value='Urgencia'>Consulta-Urgencia</option>
											<option value='Bota'>Procedimiento-Bota</option>
											<option value='Ultrasonido'>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion'>Evaluacion</option>";
										if($atencion_por == "Morbilidad")
											echo "<option value='Control'>Consulta-Control</option>
											<option value='Morbilidad' SELECTED>Consulta-Morbilidad</option>
											<option value='Urgencia'>Consulta-Urgencia</option>
											<option value='Bota'>Procedimiento-Bota</option>
											<option value='Ultrasonido'>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion'>Evaluacion</option>";
										if($atencion_por == "Urgencia")
											echo "<option value='Control'>Consulta-Control</option>
											<option value='Morbilidad'>Consulta-Morbilidad</option>
											<option value='Urgencia' SELECTED>Consulta-Urgencia</option>
											<option value='Bota'>Procedimiento-Bota</option>
											<option value='Ultrasonido'>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion'>Evaluacion</option>";
										if($atencion_por == "Bota")
											echo "<option value='Control'>Consulta-Control</option>
											<option value='Morbilidad'>Consulta-Morbilidad</option>
											<option value='Urgencia'>Consulta-Urgencia</option>
											<option value='Bota' SELECTED>Procedimiento-Bota</option>
											<option value='Ultrasonido'>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion'>Evaluacion</option>";
										if($atencion_por == "Ultrasonido")
											echo "<option value='Control'>Consulta-Control</option>
											<option value='Morbilidad'>Consulta-Morbilidad</option>
											<option value='Urgencia'>Consulta-Urgencia</option>
											<option value='Bota'>Procedimiento-Bota</option>
											<option value='Ultrasonido' SELECTED>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion'>Evaluacion</option>";
										if($atencion_por == "Evaluacion")
											echo "<option value='Control'>Consulta-Control</option>
											<option value='Morbilidad'>Consulta-Morbilidad</option>
											<option value='Urgencia'>Consulta-Urgencia</option>
											<option value='Bota'>Procedimiento-Bota</option>
											<option value='Ultrasonido'>Procedimiento-Ultrasonido</option>
											<option value='Evaluacion' SELECTED>Evaluacion</option>";
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td><font color = "#000000">Servicio:</font></td>
				  					<td><select name="servicios" style="width:150px" id = "servicios" onchange = "modificarMedico()">
									<?php
										$query_servicios=mysql_query("SELECT * FROM servicios ORDER BY nombre_servicio ASC");
										$i=0;
										while ($row=mysql_fetch_array($query_servicios))
										{
											if($codigo == $row['codigo_servicio'])
												echo "<option value=".$row['codigo_servicio']." SELECTED>".$row['nombre_servicio']."</option>\n";
											else
												echo "<option value=".$row['codigo_servicio'].">".$row['nombre_servicio']."</option>\n";
										}
									?> 
									</select></td>
								</tr>

								<tr>
									<td><font color = "#000000">Tipo de Paciente:</font></td>
				  					<td><select name="tipo_paciente" style="width:150px" id = "tipo_paciente">
										<?php
										if($tipo_paciente == "Asegurado")
											echo "<option value='Asegurado' SELECTED>Asegurado</option>
											<option value='No Asegurado'>No Asegurado</option>";
										if($tipo_paciente == "No Asegurado")
											echo "<option value='Asegurado'>Asegurado</option>
											<option value='No Asegurado' SELECTED>No Asegurado</option>";
										?>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Frecuentacion en la Institucion:</font></td>
				  					<td><select name="frecuentacion_institucion" style="width:150px" id = "frecuentacion_institucion">
										<?php
										if($frecuentacion_inst == "0")
											echo "<option value='0' SELECTED>De primera vez</option>
											<option value='1'>Nuevo en el a&ntilde;o</option>
											<option value='2' SELECTED>Subsiguiente</option>";
										if($frecuentacion_inst == "1")
											echo "<option value='0'>De primera vez</option>
											<option value='1' SELECTED>Nuevo en el a&ntilde;o</option>
											<option value='2'>Subsiguiente</option>";
										if($frecuentacion_inst == "2")
											echo "<option value='0'>De primera vez</option>
											<option value='1'>Nuevo en el a&ntilde;o</option>
											<option value='2' SELECTED>Subsiguiente</option>";
										?>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Frecuentacion en Servicio:</font></td>
				  					<td><select name="frecuentacion_servicio" style="width:150px" id = "frecuentacion_servicio">
										<?php
										if($frecuentacion_serv == "0")
											echo "<option value='0' SELECTED>De primera vez</option>
											<option value='1'>Nuevo en el a&ntilde;o</option>
											<option value='2' SELECTED>Subsiguiente</option>";
										if($frecuentacion_serv == "1")
											echo "<option value='0'>De primera vez</option>
											<option value='1' SELECTED>Nuevo en el a&ntilde;o</option>
											<option value='2'>Subsiguiente</option>";
										if($frecuentacion_serv == "2")
											echo "<option value='0'>De primera vez</option>
											<option value='1'>Nuevo en el a&ntilde;o</option>
											<option value='2' SELECTED>Subsiguiente</option>";
										?>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Tipo de Atencion:</font></td>
				  					<td><select name="tipo_atencion" style="width:150px" id = "tipo_atencion">
										<?php
										if($tipo_atencion == "0")
											echo "<option value='0' SELECTED>Nuevo</option>
											<option value='1'>Reconsulta</option>";
										if($tipo_atencion == "1")
											echo "<option value='0'>Nuevo</option>
											<option value='1' SELECTED>Reconsulta</option>";
										?>
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Area de Referencia:</font></td>
				  					<td><select name="area_referencia" style="width:150px" id = "area_referencia">
										<?php
										if($area_referencia == "Consulta Externa")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Instalaciones del Minsa Metro y del Hisma")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma' SELECTED>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Instalaciones del Seguro Social Metro")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro' SELECTED>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Minsa Interior")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior' SELECTED>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Seguro Interior")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior' SELECTED>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Clinicas Privadas")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas' SELECTED>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Centros Penitenciarios")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios' SELECTED>Centros Penitenciarios</option>
												<option value='Otros'>Otros</option>";
										if($area_referencia == "Otros")
											echo "<option value='Consulta Externa'>Consulta Externa</option>
												<option value='Instalaciones del Minsa Metro y del Hisma'>Instalaciones del Minsa Metro y del Hisma</option>
												<option value='Instalaciones del Seguro Social Metro'>Instalaciones del Seguro Social Metro</option>
												<option value='Minsa Interior'>Minsa Interior</option>
												<option value='Seguro Interior'>Seguro Interior</option>
												<option value='Clinicas Privadas'>Clinicas Privadas</option>
												<option value='Centros Penitenciarios'>Centros Penitenciarios</option>
												<option value='Otros' SELECTED>Otros</option>";
										?>
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Fecha:</font></td>
								    <td>
										<?php
										$min_fecha = date("Y-m-d");
										$array = explode("-",$min_fecha);
										$min_year = $array[0];
										$array[0]++;
										$max_year = $min_year+1;
										$max_fecha = implode("-",$array);
											$myCalendar = new tc_calendar("fecha", true, false);
											$myCalendar->setIcon("calendar/images/iconCalendar.gif");
											$myCalendar->setDate(date($fecha_array[2]), date($fecha_array[1]), date($fecha_array[0]));
											$myCalendar->setPath("calendar/");
											$myCalendar->setYearInterval($min_year, $max_year);
											$myCalendar->dateAllow($min_fecha, $max_fecha);
											$myCalendar->setDateFormat('j F Y');
											$myCalendar->setAlignment('left', 'bottom');
											$myCalendar->writeScript();
										?>
									</td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Turno:</font></td>
				  					<td><select name="turno" style="width:150px" id = "turno">
										<?php
										if($turno == "Mañana")
											echo "<option value='Mañana' SELECTED>Ma&ntilde;ana</option>
											<option value='Tarde'>Tarde</option>";
										if($turno == "Tarde")
											echo "<option value='Mañana'>Ma&ntilde;ana</option>
											<option value='Tarde' SELECTED>Tarde</option>";
										?>
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Medico:</font></td>
				  					<td><div id='div_medico'>
										<select name="medico" style="width:150px" id = "medico">
											<?php
												$query_medico=mysql_query("SELECT * FROM usuarios WHERE servicio_id='$codigo' ORDER BY nombre_completo ASC");
												$i=0;
												while ($row=mysql_fetch_array($query_medico))
												{
													if($medico_id == $row['id'])
														echo "<option value=".$row['id']." SELECTED>".$row['nombre_completo']."</option>\n";
													else
														echo "<option value=".$row['id'].">".$row['nombre_completo']."</option>\n";
												}
											?>
										</select>
									</div></td>
								</tr>
								
								<?php echo "<input type = 'hidden' id = 'id' name = 'id' value = '$id'>"; ?>
								
							</table>

							<input type = "submit" value="Guardar Modificaci&oacute;n"/>
							<div id = "ModificarCita"></div>
						</form>
						<?php
							echo "<form id = 'volverModificacion' onsubmit = '' action = 'taquillero.php' method = 'POST'>
								<input type = 'hidden' id = 'taquillero' name = 'taquillero' value = '$taquillero'>
								<input type = 'hidden' id = 'cedula' name = 'cedula' value = '$paciente_id'>
								<input type = 'submit' value='Volver'/>
							</form>";
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
