<?php
session_start();
header("Cache-control: private");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador</title>

<script src="js/sesion.js" language="javascript" type="text/javascript"> </script>
<link rel="stylesheet" href="css/jquery.ui.all.css">
	<link rel="stylesheet" href="css/fondo.css">
        <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
	<script src="js/jquery-1.7.1.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.position.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="css/demos.css">
	<link type="text/css" href="css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />

</head>
<body>
   <div id = "resultado">  
	<div id = "sesion">
				
		<span><form id = "formulario" onsubmit = "MostrarConsulta();return false;" action = "" method = "POST">
			<p align="right"><font face="arial" color="#000000" font="font" size = "2"><strong>ID: </strong></font> 
				<input TYPE="text" NAME="usuarios" id="usuario"/>
			</p>
		        <p align="right"><font face="ARIAL" color="#000000" font size = "2"> <strong> Contrase&ntilde;a </strong></font>
				<input TYPE="password" NAME="clave" id="key"/>
			</p>
			<p align="right">
			        <INPUT TYPE="submit" value="Ingresar"/>
			</p>
						
			</form>
		</span>
			<?php
			  /*			
			   if ($_SESSION['estado']  == "Conectado"){
				echo  "<form action = 'php/cierre.php' method = 'POST'><input type='submit' value = 'Cerrar Sesi&oacute;n' /></form>";
						
				}*/
			?>
					
	</div>
 </div>
</body>
</html>

