<?php



	session_start(); 
	include ('conexion_usuario.php');
	$rol = $_GET['rol'];
        if ($rol == "Medico"){
		$query = mysql_query ("INSERT INTO usuarios (id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, telefono, direccion, servicio_id, clave, rol, tipo_profesional, codigo_profesional) VALUES ('{$_GET['id']}, '{$_GET['primer_nombre']}','{$_GET['segundo_nombre']}','{$_GET['primer_apellido']}','{$_GET['segundo_apellido']}', '{$_GET['sexo']}','{$_GET['telefono']}','{$_GET['direccion']}','{$_GET['servicio']}','{$_GET['clave']}','{$_GET['rol']}','{$_GET['tipo_profesional']}','{$_GET['codigo_profesional']}')", $db_link);
/*
*/
	echo "Insercion exitosa!";

	}else{
		$query = mysql_query ("INSERT INTO usuarios (id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo,telefono, direccion, servicio_id, clave, rol) VALUES ('{$_GET['id']}','{$_GET['primer_nombre']}','{$_GET['segundo_nombre']}','{$_GET['primer_apellido']}','{$_GET['segundo_apellido']}', '{$_GET['sexo']}','{$_GET['telefono']}','{$_GET['direccion']}','{$_GET['servicio']}','{$_GET['clave']}','{$_GET['rol']}')", $db_link);
	echo "Insercion exitosa!";

}
        
?>
