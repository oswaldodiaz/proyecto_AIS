<?php
	session_start(); 
	include ('conexion.php');
	
	$id = $_POST['id'];
	$taquillero = $_POST['taquillero'];
	
	$query_hitoria = mysql_query ("SELECT * FROM cita where paciente_id = '$id' ORDER BY 'fecha'", $db_link);										
	if (mysql_num_rows($query_hitoria)!= 0){

		echo "
		<table>";
			echo "<tr>
				<td align='center'><p><font color = '#000000'>Cita</font></p></td>
				<td align='center'><p><font color = '#000000'>Servicio</font></p></td>
				<td align='center'><p><font color = '#000000'>Medico</font></p></td>
				<td align='center'><p><font color = '#000000'>Tipo de paciente</font></p></td>
				<td align='center'><p><font color = '#000000'>Frec. Inst.</font></p></td>
				<td align='center'><p><font color = '#000000'>Frec. Serv.</font></p></td>
				<td align='center'><p><font color = '#000000'>Tipo de Atencion</font></p></td>
				<td align='center'><p><font color = '#000000'>Atencion por</font></p></td>
				<td align='center'><p><font color = '#000000'>Area de Referencia</font></p></td>
				<td align='center'><p><font color = '#000000'>Fecha</font></p></td>
				<td align='center'><p><font color = '#000000'>Turno</font></p></td>
				<td align='center'><p><font color = '#000000'>Modificar</font></p></td>
			</tr>";
			
			while ($fila = mysql_fetch_array ($query_hitoria)){
				$medico = $fila['medico_id'];
				$query_servicio = mysql_query ("SELECT nombre_servicio FROM servicios where codigo_servicio IN (SELECT servicio_id FROM usuarios WHERE id = '$medico')", $db_link);
				$servicio = mysql_fetch_array ($query_servicio);
				
				$query_medico = mysql_query ("SELECT * FROM usuarios WHERE id = '$medico'",$db_link);
				$medico_datos = mysql_fetch_array ($query_medico);
				
				if($fila['turno'] == "Mañana")
					$fila['turno'] = "Ma&ntilde;ana";
				
				echo"
				<tr>
					<td align='center'><p><font color = '#000000'>" .$fila['id']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$servicio['nombre_servicio']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$medico_datos['nombre_completo']. " </font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['tipo_paciente']."  </font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['frecuentacion_inst']. " </font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['frecuentacion_serv']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['tipo_atencion']. " </font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['atencion_por']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['area_referencia']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['fecha']. "</font></p></td>
					<td align='center'><p><font color = '#000000'>" .$fila['turno']. "</font></p></td>
					<td align='center'>
						<form  action = 'modificarCita.php' method = 'POST'>
						<input type = 'hidden' id = 'id' name = 'id' value = ".$fila['id'].">
						<input type = 'hidden' id = 'taquillero' name = 'taquillero' value = '$taquillero'>
						<INPUT TYPE='submit' value='Modificar'/></form>
					</td>
				</tr>";
			}
		echo "</table>";

	}else{
		echo "No hay registro de citas";
	}
		
?>
