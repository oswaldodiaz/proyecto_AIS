<?php
session_start();

include ('conexion.php');
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador</title>

<script src="../js/sesion.js" language="javascript" type="text/javascript"> </script>
<link rel="stylesheet" href="../css/jquery.ui.all.css">
	<link rel="stylesheet" href="../css/fondo.css">
        <script src="../js/jquery-ui-1.8.17.custom.min.js"></script>
	<script src="../js/jquery-1.7.1.js"></script>
	<script src="../js/jquery.ui.core.js"></script>
	<script src="../js/jquery.ui.position.js"></script>
	<script src="../js/jquery.ui.widget.js"></script>
	<script src="../js/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="../css/demos.css">
	<link type="text/css" href="../css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
        <script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

</head>
<body>

<div id = "resultado">
 <div class="demo">

	<div id="tabs">
		<ul>
		 <li><a href="#tabs-1">Crear Usuario</a></li>
			
			
	         <li><a href="#tabs-2">Editar Usuario</a></li>
	
                </ul>
		<div id="tabs-1" align = "center">
			<p>Registrar Usuario</p>
			<form id = "formularioRegistroUsuario" onsubmit = "GuardarCambiosUsuario();return false;" action = "" method = "POST">
                        <table>
				
                        	<tr>
  					<td><font color = "#000000">Codigo de Usuario:</font></td>
                                        <td><input type = "text" id = "codigo_usuario"/></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Primer Nombre:</font></td>
                                        <td><input type = "text" id = "primer_nombre" ></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Segundo Nombre:</font></td>
                                        <td><input type = "text" id = "segundo_nombre"  ></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Primer Apellido:</font></td>
                                        <td><input type = "text" id = "primer_apellido"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Segundo Apellido:</font></td>
                                        <td><input type = "text" id = "segundo_apellido"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Sexo:</font></td>
                                        <td><input type = "text" id = "sexo" ></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Telefono:</font></td>
                                        <td><input type = "text" id = "telefono"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Direccion:</font></td>
                                        <td><input type = "text" id = "direccion"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Servicio:</font></td>
                                        <td><input type = "text"id = "servicio"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Clave:</font></td>
                                        <td><input type = "text" id = "clave"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Rol:</font></td>
                                        <td><input type = "text" id = "rol"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Tipo de Profesional:</font></td>
                                        <td><input type = "text" id = "tipo_profesional"></td>
				</tr>
				<tr>
  					<td><font color = "#000000">Codigo de Profesional:</font></td>
                                        <td><input type = "text" id = "codigo_profesional"></td>
				</tr>
			
				</table>
				
				<input type = "submit" value="Guardar Cambios">
				
			</form>
		<div id = "resultadoGuardarCambiosUsuarios"></div>
	        </div>
	        <div id="tabs-2" align = "center">
			


	        </div>
	      
       </div>
 </div>
</div>
</body>
</html>
