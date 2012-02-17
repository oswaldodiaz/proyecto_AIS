<?php
require_once('calendar/classes/tc_calendar.php');
include ('conexion.php');

$id = 18539330;
$numero_historia = ""; $primer_nombre = ""; $segundo_nombre = ""; $primer_apellido = ""; $segundo_apellido = ""; $nombre_padre = ""; $nombre_madre = ""; $sexo = ""; $telefono = ""; $fecha_nacimiento = ""; $fecha[2] = "01"; $fecha[1] = "01"; $fecha[0] = "2000" ;$lugar_nacimiento = ""; $seguro_social = ""; $provincia = ""; $distrito = ""; $corregimiento = ""; $direccion = ""; $nombre_urgencias = ""; $parentesco_urgencias = ""; $telefono_urgencias = "";

	echo "<script type='text/javascript' language='JavaScript'>funcionloca()</script>";
	echo "<form name = 'form' id = 'formulario_ver_citas_dia' onsubmit = '' action = '' method = 'POST'>
				<input type = 'text' id = 'id' name = 'id' value = '$id'/>
				</form>
				<script type='text/javascript' language='JavaScript'>alert('QUE ES LO QUE')</script>";

				echo "<form name = 'form' id = 'formulario_ver_citas_dia' onsubmit = '' action = 'php/medico.php' method = 'POST'>
				<input type = 'text' id = 'id' name = 'id' value = '$id'/>
				</form>
				<script type='text/javascript' language='JavaScript'>document.form.submit();</script>";
?>
