<?php
session_start();
include ('conexion.php');
include ('conexion_usuario.php');

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
		
		function cambio_rol(){
			var form = document.getElementById('formularioRegistroUsuario');
			var parametros = "rol="+form.rol.value;
			divResultado = document.getElementById('rolMedico');
			datos = "rol_medico.php";
			var ajax=false;
			try	{   ajax = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {   ajax = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {    ajax = false;}
			}
			if (!ajax && typeof XMLHttpRequest!='undefined') {    ajax = new XMLHttpRequest();   }
			ajax.open("POST", datos,true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
						divResultado.innerHTML = ajax.responseText
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send(parametros);
		}
		</script>

	</head>
	<body>
		<div id = "resultado">
			<div class="demo">
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Usuario</a></li>
					</ul>
					<div id="tabs-1" align = "center">
						<p>Registrar Usuario</p>
						<form id = "formularioRegistroUsuario" onsubmit = "GuardarCambiosUsuario();return false;" action = "" method = "POST">
							<table>
								<tr>
									<td><font color = "#000000">ID:</font></td>
									<td><input type = "text" id = "id" name = "id"></td>
								</tr>
								<tr>
									<td><font color = "#000000">Nombre Completo:</font></td>
									<td><input type = "text" id = "nombre_completo" name = "nombre_completo"></td>
								</tr>
								<tr>
									<td><font color = "#000000">Sexo:</font></td>
									<td><select name="sexo" style="width:150px" id = "sexo"> 
										<option value="Femenino" SELECTED>Femenino</option> 
										<option value="Masculino">Masculino</option> 
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Telefono:</font></td>
									<td><input type = "text" id = "telefono" name = "telefono"></td>
								</tr>
								<tr>
									<td><font color = "#000000">Direccion:</font></td>
									<td><input type = "text" id = "direccion" name = "direccion"></td>
								</tr>
								<tr>
									<td><font color = "#000000">Servicio:</font></td>
									<td><select name="servicios" style="width:150px" id = "servicios">
									<?php
										$query_servicios=mysql_query("SELECT * FROM servicios ORDER BY nombre_servicio ASC",$db_link);
										$i=0;
										while ($row=mysql_fetch_array($query_servicios))
										{
											echo "<option value=".$row['codigo_servicio'].">".$row['nombre_servicio']."</option>\n";
										}
									?> 
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Clave:</font></td>
									<td><input type = "text" id = "clave" name = "clave"></td>
								</tr>
								<tr>
									<td><font color = "#000000">Rol:</font></td>
									<td><select name="rol" style="width:150px" id = "rol" onchange = "cambio_rol()"> 
										<option value="Taquillero" SELECTED>Taquillero</option> 
										<option value="Medico">M&eacute;dico</option>
										<option value="Secretaria">Secretaria</option>
										<option value="Administrador">Administrador</option>
									</select></td>
								</tr>
								<div id="rolMedico">
								</div>
							</table>
							
							<input type = "submit" value="Guardar Cambios">
							
						</form>
						<div id = "resultadoGuardarCambiosUsuarios"></div>
					</div>
					<div id="tabs-2" align = "center"></div> 
				</div>
			</div>
		</div>
	</body>
</html>
