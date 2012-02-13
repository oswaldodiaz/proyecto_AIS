<?php



	session_start(); 
	include ('conexion.php');

		$query = mysql_query ("INSERT INTO historia_medicas (informe, paciente_id, cita_id) VALUES ('{$_GET['informe']}', '{$_GET['paciente']}','{$_GET['cita']}')", $db_link);
                $my_error = mysql_error($db_link);
		echo $my_error;
		echo "Insercion exitosa!";

        
?>