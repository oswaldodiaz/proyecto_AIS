<?php
session_start();
header("Cache-control: private");
if ($_SESSION['estado']  == "Conectado"){
  echo "<font face='arial' size='3'>Bienvenido/a " .$_SESSION['usuario']."</font>";
}
include ('conexion.php');
$id = $_POST['id'];
$medico = $_POST['medico'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Seguro</title>

		<link rel="stylesheet" href="../css/jquery.ui.all.css">
		<link rel="stylesheet" href="../css/fondo.css">
		<link rel="stylesheet" href="../css/demos.css">
		<link type="text/css" href="../css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		
		<script src="../js/sesion.js" language="javascript" type="text/javascript"> </script>
		<script language="javascript" src="calendar/calendar.js"></script>


		<script src="../js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="../js/jquery-1.7.1.js"></script>
		<script src="../js/jquery.ui.core.js"></script>
		<script src="../js/jquery.ui.position.js"></script>
		<script src="../js/jquery.ui.widget.js"></script>
		<script src="../js/jquery.ui.tabs.js"></script>
		<script>
		$(function() {
			$( "#tabs" ).tabs();
		});
		</script>
	</head>
	
	<body>
		<div id = 'resultado'>
			<div class='demo'>

				<div id='tabs'>
					<ul>
						<li><a href='#tabs-1'>Informe</a></li>
					</ul>

					<div id='tabs-1' align = 'center'>
						<?php
							$query2 = mysql_query ("SELECT * FROM cita where id = '$id'", $db_link);
							$fila = mysql_fetch_array ($query2);
							echo "<table>
									<tr>
										<td><font color = '#000000'>Cedula del paciente:</font></td>
										<td><input type = 'text' value = ".$fila['paciente_id']." name = 'id' id = 'id' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Atencion por:</font></td>
										<td><input type = 'text' value = ".$fila['atencion_por']." name = 'atencion_por' id = 'atencion_por' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Tipo de Paciente:</font></td>
										<td><input type = 'text' value = ".$fila['tipo_paciente']." name = 'tipo_paciente' id = 'tipo_paciente' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Frecuentacion en la Institucion:</font></td>
										<td><input type = 'text' value = ".$fila['frecuentacion_inst']." name = 'frecuentacion_inst' id = 'frecuentacion_inst' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Frecuentacion en Servicio:</font></td>
										<td><input type = 'text' value = ".$fila['frecuentacion_serv']." name = 'frecuentacion_serv' id = 'frecuentacion_serv' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Tipo de Atencion:</font></td>
										<td><input type = 'text' value = ".$fila['tipo_atencion']." name = 'tipo_atencion' id = 'tipo_atencion' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Area de Referencia:</font></td>
										<td><input type = 'text' value = ".$fila['area_referencia']." name = 'area_referencia' id = 'area_referencia' style='width:150px' disabled /></td>
									</tr>
									<tr>
										<td><font color = '#000000'>Informe:</font></td>
										<td><input type = 'textarea' value = ".$fila['informe_medico']." name = 'informe_medico' id = 'informe_medico' style='width:150px' disabled/></td>
									</tr>
								</table>
								<form id = 'volverMedico' onsubmit = '' action = 'medico.php' method = 'POST'>
									<input type = 'hidden' id = 'id' name = 'id' value = '$medico'>
									<input type = 'submit' value='Volver'/>
								</form>";
							
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>