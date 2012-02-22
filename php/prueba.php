<?php
require_once('calendar/classes/tc_calendar.php');
include ('conexion.php');

$query = mysql_query("SELECT MAX(id) FROM pacientes", $db_link);
if(mysql_num_rows($query) != 0)
	$r = mysql_fetch_array($query);
	$max = $r['MAX(id)'];
	
	$max++;
	if($max < 90000001)	$max = 90000001;
?>
