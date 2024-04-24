<?php 
	$GLOBALS['connection'] = new mysqli('localhost', 'root','','dbtolentinof3');; 
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>