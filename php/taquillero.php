<?php
require_once('calendar/classes/tc_calendar.php');
session_start();
header("Cache-control: private");
if ($_SESSION['estado']  == "Conectado"){
  echo "<p><font face='arial' size='3'>Bienvenido " .$_SESSION['usuario']."<a style='margin-left: 2em' href='../index.php'>Cerrar Sesi&oacute;n</a></font></p>";
}
include ('conexion.php');
	
$id = $_POST['cedula'];
$numero_historia = ""; $nombre_completo = ""; $primer_apellido = ""; $segundo_apellido = ""; $nombre_padre = ""; $nombre_madre = ""; $sexo = ""; $telefono = ""; $fecha_nacimiento = ""; $fecha[2] = "01"; $fecha[1] = "01"; $fecha[0] = "2000" ;$lugar_nacimiento = ""; $seguro_social = ""; $provincia = ""; $distrito = ""; $corregimiento = ""; $direccion = ""; $nombre_urgencias = ""; $parentesco_urgencias = ""; $telefono_urgencias = "";
$query = mysql_query ("SELECT * FROM pacientes where id = '$id'", $db_link);

$mensaje_inicial = "Registrar Paciente";
        
if (mysql_num_rows($query)!= 0)
{
	$mensaje_inicial = "Editar Paciente";
	$r = mysql_fetch_array ($query);
	
	$numero_historia = $r['numero_historia'];
	$nombre_completo = $r['nombre_completo'];
	$primer_apellido = $r['primer_apellido'];
	$segundo_apellido = $r['segundo_apellido'];
	$nombre_padre =  $r['nombre_padre'];
	$nombre_madre =  $r['nombre_madre'];
	$sexo = $r['sexo'];
	$telefono = $r['telefono'];
	$fecha_nacimiento = $r['fecha_nacimiento'];
	$fecha = explode("-",$fecha_nacimiento);
	$lugar_nacimiento = $r['lugar_nacimiento'];
	$seguro_social = $r['seguro_social'];
	$provincia = $r['provincia'];
	$distrito = $r['distrito'];
	$corregimiento = $r['corregimiento'];	
	$direccion = $r['direccion'];
	$nombre_urgencias = $r['nombre_urgencias'];
	$parentesco_urgencias = $r['parentesco_urgencias'];
	$telefono_urgencias = $r['telefono_urgencias'];
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
		
		function holamundo(){
			alert("hola mundo");
		}
		
		function ActualizarHistorial(){
			var form = document.getElementById('formulario_registro_cita');
			var parametros = "id="+form.id.value;
			divResultado = document.getElementById('historial_citas');
			datos = "actualizacion_historial.php";
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
		<form id="formulario_cedula_nueva" onsubmit = "modificar_campos();return false;" action = "" method = "POST">
			<strong>CEDULA DEL PACIENTE: </strong>
			<input type="text" name = "cedula" id = "cedula"/>
			<input type="submit" value="Ingresar"/>
		</form>

		<div id = "resultado">
			<div class="demo">

				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Registro de Paciente</a></li>
						<li><a href="#tabs-2">Registro de Cita</a></li>
						<li><a href="#tabs-3" onClick="(ActualizarHistorial())">Historial de Paciente</a></li>
						
					</ul>

					<div id="tabs-1" align = "center">
						<div id = "resultadoGuardarCambiosPaciente">
							<p><?php echo $mensaje_inicial;?></p>
						</div>

						<form id = "formulario_registro_paciente" onsubmit = "GuardarCambiosPaciente();return false;" action = "#tabs-2" method = "POST">
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
				  					<td><font color = "#000000">Nombre Completo:</font></td>
									<td><input style="width:150px" type = "text" name = "nombre_completo" id = "nombre_completo" value = "<? echo $nombre_completo;?>"/></td>
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
											$myCalendar->dateAllow('1900-01-01', '2012-02-22');
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
					</div>
					
					<div id="tabs-2" align = "center">
						<p>Registrar Cita</p>

						<form id = "formulario_registro_cita" onsubmit = "GuardarCambiosCita();return false;" action = "" method = "POST">
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
										$query_servicios=mysql_query("SELECT * FROM servicios ORDER BY nombre_servicio ASC");
										$i=0;
										while ($row=mysql_fetch_array($query_servicios))
										{
											echo "<option value=".$row['codigo_servicio'].">".$row['nombre_servicio']."</option>\n";
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
										<option value="0">De primera vez</option>
										<option value="1">Nuevo en el anio</option>
										<option value="2">Subsiguiente</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Frecuentacion en Servicio:</font></td>
				  					<td><select name="frecuentacion_servicio" style="width:150px" id = "frecuentacion_servicio">
										<option value="0">De primera vez</option>
										<option value="1">Nuevo en el anio</option>
										<option value="2">Subsiguiente</option>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Tipo de Atencion:</font></td>
				  					<td><select name="tipo_atencion" style="width:150px" id = "tipo_atencion">
										<option value="0">Nuevo</option>
										<option value="1">Reconsulta</option>
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
					</div>

					<div id="tabs-3" align = "center">
						
						<?php
							$query_datos = mysql_query ("SELECT * FROM pacientes where id = '$id'", $db_link);
							if (mysql_num_rows($query_datos)!= 0){
								echo "<div id='datos_paciente'>";
									$fila = mysql_fetch_array ($query_datos);
									$array = array($fila['nombre_completo'],$fila['primer_apellido'],$fila['segundo_apellido']);
									$nombre = implode(" ", $array);
									list($year,$month,$day) = explode("-",$fecha_nacimiento);
									$edad  = date("Y") - $year;
									$month_diff = date("m") - $month;
									$day_diff   = date("d") - $day;
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
								
									echo "<div id='historial_citas'></div>";
								echo "</div>";
							}else{
								echo "No se ha registrado";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
