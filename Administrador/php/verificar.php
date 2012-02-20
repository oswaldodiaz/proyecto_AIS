<?php
	session_start(); 
	include ('conexion.php');
	
	$id = $_POST['id'];
	$clave = $_POST['clave'];
	$query = mysql_query ("SELECT * from admin where id = '$id' and password = '$clave'", $db_admin_link);
	
	if (mysql_num_rows($query)!= 0){
		$_SESSION['estado'] = "Conectado";
		$row = mysql_fetch_array ($query);
		echo  "<style>span {display:none;}</style>";
		echo "<p><font face='arial' size='3'>Bienvenido " .$row['nombre_completo']. "<a style='margin-left: 2em' href='index.php'>Cerrar Sesi&oacute;n</a></font></p>";
		echo "<a href = 'php/admin.php'> <INPUT TYPE='button' value='Administrar Usuarios'/></a>";
	}else{
		echo "<font face='arial' size='3'><p>Usted no se encuentra registrado</p><p><a href='index.php'>Volver</a></p></font>";
	}
?>
