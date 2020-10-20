<?php 

	require '../koneksi.php';
	session_start();
	$id=$_GET['id'];
	$file_lama = $_GET['file'];
	
	$query=mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE id='$id'");
	$row = mysqli_fetch_assoc($query);
	$lokasi='./img/'.$file_lama;
	unlink($lokasi);

	$_SESSION['berhasil'] = "Surat masuk berhasil dihapus";
	header('location: index.php');

 ?>