<?php
	session_start(); 
	include ('conexion.php');
	
	$query = mysql_query ("SELECT id FROM pacientes where id = '{$_POST['id']}'", $db_link);
	
	if (mysql_num_rows($query)!= 0)
	{
		$query = mysql_query ("UPDATE pacientes SET numero_historia = '{$_POST['numero_historia']}', nombre_completo = '{$_POST['nombre_completo']}', primer_apellido = '{$_POST['primer_apellido']}', segundo_apellido = '{$_POST['segundo_apellido']}', nombre_padre = '{$_POST['nombre_padre']}', nombre_madre = '{$_POST['nombre_madre']}', sexo = '{$_POST['sexo']}', telefono = '{$_POST['telefono']}', lugar_nacimiento = '{$_POST['lugar_nacimiento']}', fecha_nacimiento = '{$_POST['fecha_nacimiento']}', seguro_social = '{$_POST['seguro_social']}', provincia = '{$_POST['provincia']}', distrito = '{$_POST['distrito']}', corregimiento = '{$_POST['corregimiento']}', direccion = '{$_POST['direccion']}', nombre_urgencias = '{$_POST['nombre_urgencias']}', parentesco_urgencias = '{$_POST['parentesco_urgencias']}', telefono_urgencias = '{$_POST['telefono_urgencias']}' where id = '{$_POST['id']}'", $db_link);
		echo "Actualizacion exitosa!";
	}
	else
	{
		$query = mysql_query ("INSERT INTO pacientes (id, numero_historia, nombre_completo, primer_apellido, segundo_apellido, nombre_padre, nombre_madre, sexo,telefono, lugar_nacimiento, fecha_nacimiento, seguro_social, provincia, distrito, corregimiento, direccion, nombre_urgencias, parentesco_urgencias, telefono_urgencias) VALUES ('{$_POST['id']}','{$_POST['numero_historia']}','{$_POST['nombre_completo']}','{$_POST['primer_apellido']}','{$_POST['segundo_apellido']}','{$_POST['nombre_padre']}','{$_POST['nombre_madre']}','{$_POST['sexo']}','{$_POST['telefono']}','{$_POST['lugar_nacimiento']}','{$_POST['fecha_nacimiento']}','{$_POST['seguro_social']}','{$_POST['provincia']}','{$_POST['distrito']}','{$_POST['corregimiento']}','{$_POST['direccion']}','{$_POST['nombre_urgencias']}','{$_POST['parentesco_urgencias']}','{$_POST['telefono_urgencias']}')", $db_link);
		echo "Insercion exitosa!";
	}
?>
