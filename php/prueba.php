<?php
require_once('calendar/classes/tc_calendar.php');
include ('conexion.php');

$id = 18539330;
$numero_historia = ""; $primer_nombre = ""; $segundo_nombre = ""; $primer_apellido = ""; $segundo_apellido = ""; $nombre_padre = ""; $nombre_madre = ""; $sexo = ""; $telefono = ""; $fecha_nacimiento = ""; $fecha[2] = "01"; $fecha[1] = "01"; $fecha[0] = "2000" ;$lugar_nacimiento = ""; $seguro_social = ""; $provincia = ""; $distrito = ""; $corregimiento = ""; $direccion = ""; $nombre_urgencias = ""; $parentesco_urgencias = ""; $telefono_urgencias = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>TriConsole - Programming, Web Hosting, and Entertainment Directory</title>
		<script language="javascript" src="calendar/calendar.js"></script>
		<script src="../js/sesion.js" language="javascript" type="text/javascript"> </script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>

	<body>
		
		<div id = "resultadoGuardarCambiosPaciente"></div>
		
		
		
		
		<form id = "formulario_registro_paciente2" onsubmit = "GuardarCambiosPaciente();return false;" action = "" method = "POST">
							<table>
								<tr>
				  					<td><font color = "#000000">ID:</font></td>
								    <td><input style="width:150px" type = "text" id = "id" value = "<? echo $id;?>" disabled /></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Numero de historia:</font></td>
								    <td><input style="width:150px" type = "text" name = "numero_historia" id = "numero_historia" value = "<? echo $numero_historia;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Primer Nombre:</font></td>
									<td><input style="width:150px" type = "text" name = "primer_nombre" id = "primer_nombre" value = "<? echo $primer_nombre;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Segundo Nombre:</font></td>
								    <td><input style="width:150px" type = "text" name = "segundo_nombre" id = "segundo_nombre"  value = "<? echo $segundo_nombre;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Primer Apellido:</font></td>
								    <td><input style="width:150px" type = "text" name = "primer_apellido" id = "primer_apellido" value = "<? echo $primer_apellido;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Segundo Apellido:</font></td>
								    <td><input style="width:150px" type = "text" name = "segundo_apellido" id = "segundo_apellido"  value = "<? echo $segundo_apellido;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Nombre del padre:</font></td>
								    <td><input style="width:150px" type = "text" name = "nombre_padre" id = "nombre_padre" value = "<? echo $nombre_padre;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Nombre de la Madre:</font></td>
								    <td><input style="width:150px" type = "text" name = "nombre_madre" id = "nombre_madre" value = "<? echo $nombre_madre;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Sexo:</font></td>
								    <td><select name="sexo" style="width:150px" id = "sexo"> 
										<option value="Femenino" SELECTED>Femenino</option> 
										<option value="Masculino">Masculino</option> 
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Telefono:</font></td>
								    <td><input style="width:150px" type = "text" name = "telefono" id = "telefono" value = "<? echo $telefono;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Fecha de nacimiento:</font></td>
								    <td>
										<?php
											$myCalendar = new tc_calendar("fecha_nacimiento", true, false);
											$myCalendar->setIcon("calendar/images/iconCalendar.gif");
											$myCalendar->setDate(date($fecha[2]), date($fecha[1]), date($fecha[0]));
											$myCalendar->setPath("calendar/");
											$myCalendar->setYearInterval(1900, 2012);
											$myCalendar->dateAllow('1900-01-01', '2012-02-15');
											$myCalendar->setDateFormat('j F Y');
											$myCalendar->setAlignment('left', 'bottom');
											$myCalendar->writeScript();
										?>
									</td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Lugar de nacimiento:</font></td>
								    <td><input style="width:150px" type = "text" name = "lugar_nacimiento" id = "lugar_nacimiento" value = "<? echo $lugar_nacimiento;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Seguro social:</font></td>
									<td><select name="seguro_social" style="width:150px" id = "seguro_social">
										<option value="Si">Si</option>
										<option value="No">No</option>
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Provincia:</font></td>
								    <td><input style="width:150px" type = "text" name = "provincia" id = "provincia" value = "<? echo $provincia;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Distrito:</font></td>
								    <td><input style="width:150px" type = "text" name = "distrito" id = "distrito" value = "<? echo $distrito;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Corregimiento:</font></td>
								    <td><input style="width:150px" type = "text" name = "corregimiento" id = "corregimiento" value = "<? echo $corregimiento;?>"/></td>
								</tr>

								<tr>
				  					<td><font color = "#000000">Direccion:</font></td>
								    <td><input style="width:150px" type = "text" name = "direccion" id = "direccion" value = "<? echo $direccion;?>"/></td>
								</tr>
				 				<tr>
									<td><p><font color = "#000000">En caso de Urgencias llamar a:</font></p></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Nombre:</font></td>
								    <td><input style="width:150px" type = "text" name = "nombre_urgencias" id = "nombre_urgencias" value = "<? echo $nombre_urgencias;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Parentesco:</font></td>
								    <td><input style="width:150px" type = "text" name = "parentesco_urgencias" id = "parentesco_urgencias" value = "<? echo $parentesco_urgencias;?>"/></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Telefono:</font></td>
								    <td><input style="width:150px" type = "text" name = "telefono_urgencias" id = "telefono_urgencias" value = "<? echo $telefono_urgencias;?>"/></td>
								</tr>
							</table>				
				
							<input type = "submit" value="Guardar Cambios"/>
						</form>

<form id = "formulario_registro_cita2" onsubmit = "GuardarCambiosCita();return false;" action = "" method = "POST">
							<table>
								<tr>
				  					<td><font color = "#000000">Cedula del paciente:</font></td>
								    <td><input type = "text" value = "<? echo $id;?>" name = "id" id = "id" style="width:150px" disabled /></td>
								</tr>
								<tr>
									<td><font color = "#000000">Atencion por:</font></td>
				  					<td><select name="atencion_por" style="width:150px" id = "atencion_por">
										<option value="Control">Consulta-Control</option>
										<option value="Morbilidad">Consulta-Morbilidad</option>
										<option value="Urgencia">Consulta-Urgencia</option>
										<option value="Bota">Procedimiento-Bota</option>
										<option value="Ultrasonido">Procedimiento-Ultrasonido</option>
										<option value="Evaluacion">Evaluacion</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Servicio:</font></td>
				  					<td><select name="servicios" style="width:150px" id = "servicios">
									<?php
										$query=mysql_query("SELECT nombre_servicio FROM servicios ORDER BY nombre_servicio ASC");
										$i=0;
										while ($row=mysql_fetch_array($query))
										{
											echo "<option value=".$row['nombre_servicio'].">".$row['nombre_servicio']."</option>\n";
										}
									?> 
									</select></td>
								</tr>

								<tr>
									<td><font color = "#000000">Tipo de Paciente:</font></td>
				  					<td><select name="tipo_paciente" style="width:150px" id = "tipo_paciente">
										<option value="Asegurado">Asegurado</option>
										<option value="No Asegurado">No Asegurado</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Frecuentacion en la Institucion:</font></td>
				  					<td><select name="frecuentacion_institucion" style="width:150px" id = "frecuentacion_institucion">
										<option value="De Primera Vez">De primera vez</option>
										<option value="Nuevo en el anio">Nuevo en el anio</option>
										<option value="Subsiguiente">Subsiguiente</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Frecuentacion en Servicio:</font></td>
				  					<td><select name="frecuentacion_servicio" style="width:150px" id = "frecuentacion_servicio">
										<option value="De primera vez">De primera vez</option>
										<option value="Nuevo en el anio">Nuevo en el anio</option>
										<option value="Subsiguiente">Subsiguiente</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Tipo de Atencion:</font></td>
				  					<td><select name="tipo_atencion" style="width:150px" id = "tipo_atencion">
										<option value="Nuevo">Nuevo</option>
										<option value="Reconsulta">Reconsulta</option>
									</select></td>
								</tr>
								<tr>
				  					<td><font color = "#000000">Area de Referencia:</font></td>
				  					<td><select name="area_referencia" style="width:150px" id = "area_referencia">
										<option value="Consulta Externa">Consulta Externa</option>
										<option value="Instalaciones del Minsa Metro y del Hisma">Instalaciones del Minsa Metro y del Hisma</option>
										<option value="Instalaciones del Seguro Social Metro">Instalaciones del Seguro Social Metro</option>
										<option value="Minsa Interior">Minsa Interior</option>
										<option value="Seguro Interior">Seguro Interior</option>
										<option value="Clinicas Privadas">Clinicas Privadas</option>
										<option value="Centros Penitenciarios">Centros Penitenciarios</option>
										<option value="Otros">Otros</option>
									</select></td>
								</tr>
							</table>

							<input type = "submit" value="Guardar Cita"/>
							<div id = "resultadoCita"></div>
						</form>						
	</body>
</html>
