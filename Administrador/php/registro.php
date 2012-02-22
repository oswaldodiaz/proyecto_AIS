<?php
	session_start(); 
	include ('conexion_usuario.php');
	$rol = $_POST['rol'];
	$opcion = $_POST['opcion'];
	
	if($opcion == 0)
	{
		if ($rol == "Medico"){
			$query = mysql_query ("INSERT INTO usuarios (id, nombre_completo, sexo, telefono, direccion, servicio_id, clave, rol, tipo_profesional, codigo_profesional, codigo)	VALUES 	('{$_POST['id']}, '{$_POST['nombre_completo']}', '{$_POST['sexo']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['servicio_id']}','{$_POST['clave']}','{$_POST['rol']}','{$_POST['tipo_profesional']}','{$_POST['codigo_profesional']}','{$_POST['codigo']}')", $db_link);
		}else{
			$query = mysql_query ("INSERT INTO usuarios (id, nombre_completo, sexo,telefono, direccion, servicio_id, clave, rol) VALUES ('{$_POST['id']}','{$_POST['nombre_completo']}', '{$_POST['sexo']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['servicio_id']}','{$_POST['clave']}','{$_POST['rol']}')", $db_link);
		}	
		echo "Inserci&oacute;n exitosa!";
	}
	else
	{
		if($opcion == 1){
			if ($rol == "Medico"){
				$query = mysql_query ("UPDATE usuarios SET  nombre_completo = '{$_POST['nombre_completo']}', sexo =  '{$_POST['sexo']}', telefono = '{$_POST['telefono']}', direccion = '{$_POST['direccion']}', servicio_id = '{$_POST['servicio_id']}', clave = '{$_POST['clave']}', rol = '{$_POST['rol']}', tipo_profesional = '{$_POST['tipo_profesional']}', codigo_profesional =  '{$_POST['codigo_profesional']}', codigo = '{$_POST['codigo']}' where id = '{$_POST['id']}'", $db_link);
			}else{
				$query = mysql_query ("UPDATE usuarios SET  nombre_completo = '{$_POST['nombre_completo']}', sexo =  '{$_POST['sexo']}', telefono = '{$_POST['telefono']}', direccion = '{$_POST['direccion']}', servicio_id = '{$_POST['servicio_id']}', clave = '{$_POST['clave']}', rol = '{$_POST['rol']}' where id = '{$_POST['id']}'", $db_link);
			}
			echo "Actualizaci&oacute;n exitosa!";
		}
		else
		{
			$esta = mysql_query ("SELECT * FROM usuarios WHERE id = '{$_POST['id']}'", $db_link);
			if(mysql_num_rows($esta) != 0)
			{
				$query = mysql_query ("DELETE FROM usuarios WHERE id = '{$_POST['id']}'", $db_link);
				echo "Eliminaci&oacute;n exitosa!";
			}
			else
				echo "El usuario no se encuentra registrado!";
		}
	}
?>