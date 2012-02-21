<?php
session_start();
include ('conexion.php');
date_default_timezone_set('America/Caracas');

	$hour = date("H:i:s");
	echo "<input type = 'button' id = 'secretaria' name = 'hora' value = ".$hour." disabled />";
		
?>
