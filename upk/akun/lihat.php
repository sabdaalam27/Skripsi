<?php 

	require '../koneksi.php';
	require '../header.php';

	$id = $_GET['id'];
	$sql_read="SELECT * FROM surat_masuk WHERE id = $id";
	$query_read=mysqli_query($koneksi, $sql_read);
	$row = mysqli_fetch_assoc($query_read);
 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">
	            <h2>File Surat</h2>
	            <p>Nomor Surat : <?php echo $row['nomor_surat'];?></p>
	            <p>Tanggal Masuk : <?php echo $row['tanggal_masuk'];?></p>
	            <p>Pengirim : <?php echo $row['pengirim'];?></p>

	            <img src="img/<?php echo $row['file_surat']; ?>" class="img-thumbnail">
	        </div>
	    </section>
	</div>

 <?php require '../footer.php'; ?>