<?php 

	require '../koneksi.php';
	session_start();
	
	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM akun WHERE id='$id'");

	$_SESSION['berhasil'] = "User berhasil dihapus";
	header('location: index.php');

 ?>