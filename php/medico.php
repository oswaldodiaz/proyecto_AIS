<?php
session_start();
header("Cache-control: private");
if ($_SESSION['estado']  == "Conectado"){
  echo "<font face='arial' size='3'>Bienvenido/a " .$_SESSION['usuario']."</font>";
}
include ('conexion.php');
$id = $_GET['id'];
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
		
			<div class='demo'>

				<div id='tabs'>
						<ul>
							<li><a href='#tabs-1'>Citas del dia</a></li>
						</ul>

					<div id='tabs-1' align = 'center'>
						<?php
							$query2 = mysql_query ("SELECT * FROM cita where medico_id = '$id'", $db_link);
							
							if (mysql_num_rows($query2)!= 0){

								echo "
								<table>";
					                echo "<tr>
										<td><p><font color = '#000000'>Id_cita</font></p></td>
										<td><p><font color = '#000000'> Id de paciente</font></p></td>
										<td><p><font color = '#000000'> Id de medico</font></p></td>
										<td><p><font color = '#000000'>Tipo de paciente</font></p></td>
										<td><p><font color = '#000000'> Frecuentacion en la institucion</font></p></td>
										<td><p><font color = '#000000'> Frecuentacion de servicio</font></p></td>
										<td><p><font color = '#000000'> Tipo de Atencion</font></p></td>
										<td><p><font color = '#000000'>Atencion por</font></p></td>
										<td><p><font color = '#000000'>Area de Referencia </font></p></td>
									</tr>";
									while ($fila = mysql_fetch_array ($query2)){
										
									echo"
									<tr>";
										echo "<td><p><font color = '#000000'>" .$fila['id']. "</font></p></td>";
										echo "<td><p><font color = '#000000'> " .$fila['paciente_id']. "</font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['medico_id']. " </font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['tipo_paciente']."  </font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['frecuentacion_inst']. " </font></p></td>";
										echo "<td><p><font color = '#000000'> " .$fila['frecuentacion_serv']. "</font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['tipo_atencion']. " </font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['atencion_por']. "</font></p></td>";
										echo "<td><p><font color = '#000000'> " .$fila['area_referencia']. "</font></p></td>";
										echo "<td><p><font color = '#000000'>  " .$fila['fecha']. "</font></p></td>";
										echo "<td><p><font color = '#000000'> " .$fila['turno']. "</font></p></td>";
										echo "<td><form  action = 'ver_informe.php?cita=" .$fila['id']."' method = 'POST'><INPUT TYPE='submit' value='Ver Informe'/></form></td>";
										echo "<td><form  action = 'anexar_informe.php?cita=" .$fila['id']."' method = 'POST'><INPUT TYPE='submit' value='Anexar Informe'/></form></td>";
									echo "</tr>"; 
									}
								echo "</table>";
									
							}else{
								echo "No hay registro de citas";
							}
						?>
					</div>
				</div>
			<div id = 'resultado'>	
			</div>
	</body>
	</html>