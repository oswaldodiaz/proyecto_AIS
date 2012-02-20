<?php
	$rol = $_POST['rol'];
	if($rol == "Medico")
		echo "<tr>
				<td><font color = '#000000'>Tipo de Profesional:</font></td>
				<td><input type = 'text' id = 'tipo_profesional' name = 'tipo_profesional'></td>
			</tr>
			<tr>
				<td><font color = '#000000'>Codigo de Profesional:</font></td>
				<td><input type = 'text' id = 'codigo_profesional' name = 'codigo_profesional'></td>
			</tr>
			<tr>
				<td><font color = '#000000'>Codigo de Medico:</font></td>
				<td><input type = 'text' id = 'codigo_medico' name = 'codigo_medico'></td>
			</tr>";
	else
		echo "<input type = 'hidden' id = 'tipo_profesional' name = 'tipo_profesional' value = ''>
			<input type = 'hidden' id = 'codigo_profesional' name = 'codigo_profesional' value = ''>
			<input type = 'hidden' id = 'codigo_medico' name = 'codigo_medico' value = ''>";
?>