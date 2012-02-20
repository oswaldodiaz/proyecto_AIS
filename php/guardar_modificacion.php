<?php
	session_start(); 
	include ('conexion.php');
	
	$query = "UPDATE cita SET 
	medico_id = '{$_POST['medico_id']}',
	tipo_paciente = '{$_POST['tipo_paciente']}',
	frecuentacion_inst = '{$_POST['frecuentacion_inst']}',
	frecuentacion_serv = '{$_POST['frecuentacion_serv']}',
	tipo_atencion = '{$_POST['tipo_atencion']}',
	atencion_por = '{$_POST['atencion_por']}',
	area_referencia = '{$_POST['area_referencia']}',
	fecha = '{$_POST['fecha']}',
	turno = '{$_POST['turno']}'
	where id = '{$_POST['cita']}'";
	$actualizar_cita = mysql_query ($query, $db_link);
		echo "Actualizacion exitosa!";	
?>