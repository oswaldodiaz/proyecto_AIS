<?php
	session_start(); 
	include ('conexion.php');
	
	$id = $_POST['id'];
	$clave = $_POST['clave'];
	
	$query = mysql_query ("SELECT nombre_completo, rol FROM usuarios where id = '$id' and clave = '$clave'", $db_link);
	
	if (mysql_num_rows($query)!= 0){
		$_SESSION['estado'] = "Conectado";
		$row = mysql_fetch_array ($query);
		$nombre = explode(" ", $row['nombre_completo']);
		$_SESSION['usuario'] = $nombre[0];
        $_SESSION['rol'] = $row['rol'];
		
		echo "<style>span {display:none;}</style>";
		echo "<font face='arial' size='3'>Bienvenido " .$nombre[0]."<a style='margin-left: 2em' href='index.php'>Cerrar Sesi&oacute;n</a></font>";

		if ($_SESSION['rol'] == "Taquillero"){
			echo "<form align='center' id = 'formulario_verificar' onsubmit = 'validarCedula();return false;' action = '' method = 'POST'>
				<strong>CEDULA DEL PACIENTE: </strong><input type='text' name = 'cedula' id = 'cedula'/>
				<INPUT TYPE='submit' value='Ingresar'/>
				</form>";
		}else{
			if ($_SESSION['rol'] == "Medico"){
				echo "
				<form id = 'formulario_ver_citas_dia' onsubmit = '' action = 'php/medico.php' method = 'POST'>
				<input type='submit' value = 'Ver Citas Del Dia'/>
				<input type = 'hidden' id = 'id' name = 'id' value = '$id'/>
				</form>";
			}
		}
	}else{
		echo "<font face='arial' size='3'><p>Usted no se encuentra registrado</p><p><a href='index.php'>Volver</a></p></font>";
	}
?>
