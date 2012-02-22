<?php
	session_start(); 
	include ('conexion.php');
	
	$id = $_POST['id'];
	$clave = $_POST['clave'];
	$query = mysql_query ("SELECT * from admin where id = '$id' and password = '$clave'", $db_admin_link);
	
	if (mysql_num_rows($query)!= 0){
		$_SESSION['estado'] = "Conectado";
		$row = mysql_fetch_array ($query);
		echo  "<style>span {display:none;}</style>
			<p><font face='arial' size='3'>Bienvenido <a style='margin-left: 2em' href='index.php'>Cerrar Sesi&oacute;n</a></font></p>
			<form align='center' id = 'formulario_verificar' onsubmit = 'validarCedula();return false;' action = '' method = 'POST'>
				<strong>CEDULA DEL USUARIO: </strong><input type='text' name = 'cedula' id = 'cedula'/>
				<INPUT TYPE='submit' value='Ingresar'/>
			</form>";
		
	}else{
		echo "<font face='arial' size='3'><p>Usted no se encuentra registrado</p><p><a href='index.php'>Volver</a></p></font>";
	}
?>
