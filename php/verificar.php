<?php
	session_start(); 
	include ('conexion.php');
	
	$id = $_POST['id'];
	$clave = $_POST['clave'];
	
	$query = mysql_query ("SELECT primer_nombre, primer_apellido, rol FROM usuarios where id = '$id' and clave = '$clave'", $db_link);
	
	if (mysql_num_rows($query)!= 0){
		$_SESSION['estado'] = "Conectado";
		$row = mysql_fetch_array ($query);
		$_SESSION['usuario'] = $row['primer_nombre'];
        $_SESSION['rol'] = $row['rol'];
		
		echo "<style>span {display:none;}</style>";
		echo "<font face='arial' size='3'>Bienvenido " .$row['primer_nombre']." " .$row ['primer_apellido']."</font>";

		if ($_SESSION['rol'] == "Taquillero"){
			echo "<form id = 'formulario_verificar' onsubmit = 'validarCedula();return false;' action = '' method = 'POST'>
				<strong>CEDULA: </strong><input type='text' name = 'cedula' id = 'cedula'/>
				<INPUT TYPE='submit' value='Ingresar'/>
				</form>";
		}else{
			if ($_SESSION['rol'] == "Medico"){
				echo "<form id = 'formulario_ver_citas_dia' onsubmit = 'buscar_medico();return false;' action = '' method = 'POST'>
				<input type='submit' value = 'Ver Citas Del Dia'/>
				<input type = 'hidden' id = 'medico' value = '$id'/>
				</form>";
				}
			}
	}else{
		echo "<font face='arial' size='3'> Usted no se encuentra registrado </font>";
	}
?>
