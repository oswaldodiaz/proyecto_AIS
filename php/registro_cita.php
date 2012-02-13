<?php
	session_start(); 
	include ('conexion.php');

	$query_servicio = mysql_query ("select codigo_servicio from servicios where nombre_servicio = '{$_POST['servicios']}'");

	$query_medico =  mysql_query ("select codigo_medico from medicos where servicio_id = '$query_servicio'");
	
	$fila2 = mysql_fetch_array ($query_medico);

	$query = mysql_query ("INSERT INTO cita (paciente_id, medico_id, atencion_por, tipo_paciente, frecuentacion_inst, frecuentacion_serv, tipo_atencion, area_referencia) VALUES ('{$_POST['id']}', '$query_medico','{$_POST['atencion_por']}','{$_POST['tipo_paciente']}','{$_POST['frecuentacion_institucion']}','{$_POST['frecuentacion_servicio']}','{$_POST['tipo_atencion']}','{$_POST['area_referencia']}')", $db_link);
	$my_error = mysql_error($db_link);
	echo $my_error;
	echo "Insercion exitosa!";
?>
