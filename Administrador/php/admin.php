<?php
session_start();
include ('conexion.php');
include ('conexion_usuario.php');
echo  "<style>span {display:none;}</style>
		<p><font face='arial' size='3'>Bienvenido <a style='margin-left: 2em' href='../index.php'>Cerrar Sesi&oacute;n</a></font></p>";

$id = $_POST['cedula'];
$nombre_completo = ""; $sexo = ""; $telefono = "";  $direccion = ""; $clave = ""; $rol = ""; $tipo_profesional = ""; $codigo_profesional = ""; $codigo = ""; $servicio_id = "";

$query = mysql_query ("SELECT * FROM usuarios where id = '$id'", $db_link);
$boton = "Guardar";
$opcion = 0;
if (mysql_num_rows($query)!= 0)
{
	$opcion = 1;
	$boton = "Modificar";
	$r = mysql_fetch_array ($query);
	
	$nombre_completo = $r['nombre_completo'];
	$sexo = $r['sexo'];
	$telefono = $r['telefono'];	
	$direccion = $r['direccion'];
	$clave = $r['clave'];
	$rol = $r['rol'];
	$tipo_profesional = $r['tipo_profesional'];
	$codigo_profesional = $r['codigo_profesional'];
	$codigo = $r['codigo'];
	$servicio_id = $r['servicio_id'];
}
		
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
			if(form.rol.options[form.rol.selectedIndex].value == "Medico")
			{
				alert("algo pasa");/*
				form.codigo.disabled = false;
				form.codigo_profesional.disabled = false;*/
				form.tipo_profesional.disabled = false;
			}
			else
			{
				alert("algo no pasa");/*
				form.codigo.disabled = true;
				form.codigo_profesional.disabled = true;*/
				form.tipo_profesional.disabled = true;
			}
		}
		</script>

	</head>
	<body>
		<form id="formulario_cedula_nueva" onsubmit = "modificar_campos();return false;" action = "" method = "POST">
			<strong>CEDULA DEL USUARIO: </strong>
			<input type="text" name = "cedula" id = "cedula"/>
			<input type="submit" value="Ingresar"/>
		</form>
		<div id = "principal">
			<div class="demo">
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Usuario</a></li>
					</ul>
					<div id="tabs-1" align = "center">
						<p>Registrar Usuario</p>
						<form id = "formularioRegistroUsuario" onsubmit = "GuardarCambiosUsuario();return false;" action = "" method = "POST">
							<table id="tablaUsuarios">
								<tr>
									<td><font color = "#000000">ID:</font></td>
									<td><input style="width:150px"  type = "text" id = "id" name = "id" value = "<? echo $id;?>" disabled ></td>
								</tr>
								<tr>
									<td><font color = "#000000">Nombre Completo:</font></td>
									<td><input style="width:150px"  type = "text" id = "nombre_completo" name = "nombre_completo" value = "<? echo $nombre_completo;?>" ></td>
								</tr>
								<tr>
									<td><font color = "#000000">Sexo:</font></td>
									<td><select name="sexo" style="width:150px" id = "sexo"> 
										<?php
										if($sexo == "Femenino")
											echo "<option value='Femenino' SELECTED>Femenino</option><option value='Masculino'>Masculino</option>";
										else
											echo "<option value='Femenino'>Femenino</option><option value='Masculino' SELECTED>Masculino</option>";
										?>
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Telefono:</font></td>
									<td><input style="width:150px"  type = "text" id = "telefono" name = "telefono" value = "<? echo $telefono;?>" ></td>
								</tr>
								<tr>
									<td><font color = "#000000">Direccion:</font></td>
									<td><input  style="width:150px" type = "text" id = "direccion" name = "direccion" value = "<? echo $direccion;?>" ></td>
								</tr>
								<tr>
									<td><font color = "#000000">Servicio:</font></td>
									<td><select style="width:150px"  name="servicio_id" style="width:150px" id = "servicio_id">
									<?php
										$query_servicios=mysql_query("SELECT * FROM servicios ORDER BY nombre_servicio ASC",$db_link);
										$i=0;
										while ($row=mysql_fetch_array($query_servicios))
										{
											if($row['codigo_servicio'] == $servicio_id)
												echo "<option value=".$row['codigo_servicio']." SELECTED>".$row['nombre_servicio']."</option>\n";
											else
												echo "<option value=".$row['codigo_servicio'].">".$row['nombre_servicio']."</option>\n";
										}
									?> 
									</select></td>
								</tr>
								<tr>
									<td><font color = "#000000">Clave:</font></td>
									<td><input style="width:150px"  type = "password" id = "clave" name = "clave" value = "<? echo $clave;?>" ></td>
								</tr>
								<tr>
									<td><font color = "#000000">Rol:</font></td>
									<td><select name="rol" style="width:150px" id = "rol" onchange = "cambio_rol()">
										<?php
										if($rol == "Administrador"){	echo "<option value='Taquillero'>Taquillero</option><option value='Medico'>M&eacute;dico</option><option value='Secretaria'>Secretaria</option><option value='Administrador' SELECTED>Administrador</option>";
										}else
										{
											if($rol == "Taquillero"){	echo "<option value='Taquillero' SELECTED>Taquillero</option><option value='Medico'>M&eacute;dico</option><option value='Secretaria'>Secretaria</option><option value='Administrador'>Administrador</option>";
											}else{
												if($rol == "Secretaria"){		echo "<option value='Taquillero'>Taquillero</option><option value='Medico'>M&eacute;dico</option><option value='Secretaria' SELECTED>Secretaria</option><option value='Administrador'>Administrador</option>";
												}else{
													echo "<option value='Taquillero'>Taquillero</option><option value='Medico' SELECTED>M&eacute;dico</option><option value='Secretaria'>Secretaria</option><option value='Administrador'>Administrador</option>";
												}
											}
										}
										?>
									</select></td>
								</tr>
								<tr>
									<td><font color = '#000000'>Tipo de Profesional:</font></td>
									<td><input style="width:150px"  type = 'text' id = 'tipo_profesional' name = 'tipo_profesional' value = "<? echo $tipo_profesional;?>" ></td>
								</tr>
								<tr>
									<td><font color = '#000000'>Codigo de Profesional:</font></td>
									<td><input  style="width:150px" type = 'text' id = 'codigo_profesional' name = 'codigo_profesional' value = "<? echo $codigo_profesional;?>" ></td>
								</tr>
								<tr>
									<td><font color = '#000000'>Codigo de Medico:</font></td>
									<td><input  style="width:150px" type = 'text' id = 'codigo' name = 'codigo' value = "<? echo $codigo;?>" ></td>
								</tr>
							</table>
							
							<input id = "opcion" type = "hidden" value="<? echo $opcion;?>">
							<input id = "button" type = "submit" value="Eliminar" onclick="eliminarUsuario()">
							<input id = "submit" type = "submit" value="<? echo $boton;?>">
							
						</form>
						<div id = "resultado">
						</div>
					</div>
					<div id="tabs-2" align = "center"></div> 
				</div>
			</div>
		</div>
	</body>
</html>
