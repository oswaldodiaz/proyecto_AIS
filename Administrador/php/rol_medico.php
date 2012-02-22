<?php
	$rol = $_POST['rol'];
	if($rol == "Medico")
		echo "
				
			";
	else
		echo "<input type = 'hidden' id = 'tipo_profesional' name = 'tipo_profesional' value = ''>
			<input type = 'hidden' id = 'codigo_profesional' name = 'codigo_profesional' value = ''>
			<input type = 'hidden' id = 'codigo_medico' name = 'codigo_medico' value = ''>";
?>