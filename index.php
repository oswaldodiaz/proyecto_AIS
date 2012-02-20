<?php
session_start();
header("Cache-control: private");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Seguro</title>

		<link rel="stylesheet" href="css/jquery.ui.all.css">
		<link rel="stylesheet" href="css/fondo.css">
		<link rel="stylesheet" href="css/demos.css">
		<link type="text/css" href="css/jquery-ui-1.8.17.custom.css" rel="stylesheet"/>

		<script src="js/sesion.js" language="javascript" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="js/jquery-1.7.1.js"></script>
		<script src="js/jquery.ui.core.js"></script>
		<script src="js/jquery.ui.position.js"></script>
		<script src="js/jquery.ui.widget.js"></script>
		<script src="js/jquery.ui.tabs.js"></script>
		
	</head>

	<body>
		<br>
		<h1 align="center">Inicio de sesión</h1>
		<div id = "resultado">  
			<div id = "sesion">
				<span>
					<form align="center" id = "formularioIngreso" onsubmit = "Autenticar();return false;" action = "" method = "POST">
						<p><font face="arial" color="#000000" font="font" size = "2"><strong>ID de usuario:</strong></font>
						<input style="margin-left: 1em" TYPE="text" NAME="id" id="id"/></p>
						
						<p><font face="ARIAL" color="#000000" font size = "2"> <strong>Contrase&ntilde;a:</strong></font>
						<input style="margin-left: 1.9em" TYPE="password" NAME="clave" id="clave"/></p>
						
						<p><INPUT TYPE="submit" value="Ingresar"/></p>
					</form>
				</span>
				<?php
				  /*			
				   if ($_SESSION['estado']  == "Conectado"){
					echo  "<form action = 'php/cierre.php' method = 'POST'><input type='submit' value = 'Cerrar Sesi&oacute;n' /></form>";
						
					}*/
				?>
			</div>
			<script>
			$(function() {
				$( "#tabs" ).tabs();
			});
			</script>
		</div>
	</body>
</html>

