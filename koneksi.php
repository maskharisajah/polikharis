<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "poliklinik_db";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die (mysqli_error($connect));
	//mysql_select_db($database) or die (mysql_error());
?>