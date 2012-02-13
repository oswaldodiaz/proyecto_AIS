<?php

	session_start(); 
	include ('conexion.php');
		
	$query = mysql_query ("SELECT id FROM pacientes where id = '{$_GET['id']}'", $db_link);
	
	if (mysql_num_rows($query)!= 0){
		$row = mysql_fetch_array($query);

		echo "<form action = 'taquillero.php?id=".$row['id']."'method = 'POST'><INPUT TYPE='submit' value='Ir'/></form>";
		//header("Location:taquillero.php?id ="+ $row['id']);
        
	}else{
		echo "<font face='arial' size='3'> Paciente no se encuentra registrado </font>";
        echo "<form action = 'taquillero.php?id=".$_GET['id']."'method = 'POST'><INPUT TYPE='submit' value= 'Registrar'/></form>";

	}
	//header("Location: taquillero.php?id=$_GET[id]");                       
?>
