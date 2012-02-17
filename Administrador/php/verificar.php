<?php
	session_start(); 
	include ('conexion.php');
	
	
	$query = mysql_query ("SELECT * from admin where id = '{$_GET['id']}' and password = '{$_GET['key']}'", $db_link);
	
	
		if (mysql_num_rows($query)!= 0){
			$_SESSION['estado'] = "Conectado";
						
			$row = mysql_fetch_array ($query);
			

				echo  "<style>span {display:none;}</style>";
						
				//echo "<font face='arial' size='3'>Bienvenido " .$row['primer_nombre']." " .$row ['primer_apellido']."</font>";
						
						
		//if ($_SESSION['rol'] == "Taquillero"){
			$id = 0;
			//header("Location:taquillero.php?id=$id");
			echo "<a href = 'php/admin.php'> <INPUT TYPE='button' value='Administrar Usuarios'/></a>";
						
						
						
						
						
		
						}else{
		                echo "<font face='arial' size='3'> Usted no se encuentra registrado </font>";
	
						}

                               
			

	
	
?>
