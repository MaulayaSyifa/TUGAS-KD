<?php
	
	define ('HOST', 'localhost');
	define ('USER', 'root');
	define ('PASS', '');
	define ('DB', 'db_kd');
	
	$conn = mysqli_connect ( HOST, USER, PASS, DB );
	
	if (!$conn) {
    die("Unable to connect : " . mysqli_connect_error());
	}

?>