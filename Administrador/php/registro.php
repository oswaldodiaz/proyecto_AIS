<?php
	session_start(); 
	include ('conexion_usuario.php');
	$rol = $_POST['rol'];
    if ($rol == "Medico"){
		$query = mysql_query ("INSERT INTO usuarios (id, nombre_completo, sexo, telefono, direccion, servicio_id, clave, rol, tipo_profesional, codigo_profesional, codigo)	VALUES 	('{$_POST['id']}, '{$_POST['nombre_completo']}', '{$_POST['sexo']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['servicio']}','{$_POST['clave']}','{$_POST['rol']}','{$_POST['tipo_profesional']}','{$_POST['codigo_profesional']}','{$_POST['codigo_medico']}')", $db_link);
	}else{
		$query = mysql_query ("INSERT INTO usuarios (id, nombre_completo, sexo,telefono, direccion, servicio_id, clave, rol) VALUES ('{$_POST['id']}','{$_POST['nombre_completo']}', '{$_POST['sexo']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['servicio']}','{$_POST['clave']}','{$_POST['rol']}')", $db_link);
	}   
	echo "Insercion exitosa!";
?>