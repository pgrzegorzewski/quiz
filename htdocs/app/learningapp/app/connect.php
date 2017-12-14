<?php

	$servername = "127.0.0.1";
	$username = "pawel";
	$password = "";
	//$username = "pawelg";
	//$password = "aaa";
	$dbname = "postgres";
	
	$conn;
	
	$conn_string = "host=localhost port=5432 dbname=postgres user=pawel password=aaa";
	
	$conn= pg_connect($conn_string);
	if(!$conn){
		$error = error_get_last();
		echo "Connection failed. Error was: ". $error['message']. "\n";
	}
	
?>