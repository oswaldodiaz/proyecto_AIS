<?php
session_start();
include ('conexion.php');
$codigo = $_POST['codigo'];
	
	echo "<select name='medico' style='width:150px' id = 'medico'>";
	$query_medico=mysql_query("SELECT * FROM usuarios WHERE servicio_id='$codigo' ORDER BY nombre_completo ASC");
	$i=0;
	while ($row=mysql_fetch_array($query_medico))
	{
		echo "<option value=".$row['id'].">".$row['nombre_completo']."</option>\n";
	}										
	echo "</select>";
?>