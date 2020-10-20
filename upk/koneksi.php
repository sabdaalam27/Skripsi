<?php 
	//local
	$host='localhost';
	$user='root';
	$pass='';
	$db='upk';
	
	// //hosting
	// $host='localhost:3306';
	// $user='sabda';
	// $pass='sabda12345';
	// $db='sistemar_upk';

	$koneksi=mysqli_connect($host, $user, $pass, $db) OR mysqli_error();

 ?>