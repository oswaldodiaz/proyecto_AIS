<?php
	session_start(); 
	include ('conexion.php');
	
	$query = mysql_query ("UPDATE cita SET informe_medico = '{$_POST['informe']}' where id = '{$_POST['id']}'", $db_link);
		echo "Informe actualizado!";	
?>
