<?php 

	require '../koneksi.php';
	require '../header.php';

	if(isset($_POST['submit'])){
		$nomor_surat=$_POST['nomor_surat'];
		$tanggal_keluar=$_POST['tanggal_keluar'];
		$penerima=$_POST['penerima'];
		$perihal=$_POST['perihal'];
		$file_surat=time().''.$_FILES['file_surat']['name'];
		$lokasi='./img/'.$file_surat;
		move_uploaded_file($_FILES['file_surat']['tmp_name'], $lokasi);

		$sql="INSERT INTO surat_keluar(nomor_surat, tanggal_keluar, penerima, perihal, file_surat) VALUES('$nomor_surat', '$tanggal_keluar', '$penerima', '$perihal', '$file_surat')";

		$query=mysqli_query($koneksi, $sql);
		$_SESSION['berhasil'] = "Surat Keluar berhasil ditambahkan";
		header('Location: index.php');
	}

 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">
	            <h2>Tambah Surat Keluar</h2>
	            <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>No. Surat</label>
						<input type="text" name="nomor_surat" class="form-control">
					</div>

					<div class="form-group">	
						<label>Tanggal Keluar</label>
						<input type="date" name="tanggal_keluar" class="form-control">
					</div>

					<div class="form-group">
						<label>Penerima</label>
						<input type="text" name="penerima" class="form-control">
					</div>

					<div class="form-group">
						<label>Perihal</label>
						<input type="text" name="perihal" class="form-control">
					</div>

					<div class="form-group">
						<label>File Surat</label>
						<input type="file" name="file_surat" class="form-control">
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
				</form>
	        </div>
	    </section>
	</div>

 <?php require '../footer.php'; ?>