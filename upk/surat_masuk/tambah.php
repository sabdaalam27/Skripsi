<?php 

	require '../koneksi.php';
	require '../header.php';

	if(isset($_POST['submit'])){
		$nomor_surat=$_POST['nomor_surat'];
		$tanggal_masuk=$_POST['tanggal_masuk'];
		$pengirim=$_POST['pengirim'];
		$perihal=$_POST['perihal'];
		$file_surat=time().''.$_FILES['file_surat']['name'];
		$lokasi='./img/'.$file_surat;
		move_uploaded_file($_FILES['file_surat']['tmp_name'], $lokasi);

		$cek=mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE nomor_surat='$nomor_surat'");
		if (mysqli_num_rows($cek)==0) {

			$sql="INSERT INTO surat_masuk(nomor_surat, tanggal_masuk, pengirim, perihal, file_surat) VALUES('$nomor_surat', '$tanggal_masuk', '$pengirim', '$perihal', '$file_surat')";

			$query=mysqli_query($koneksi, $sql);
			$_SESSION['berhasil'] = "Surat masuk berhasil ditambahkan";
			header('Location: index.php');
		}else{
			$_SESSION['gagal'] = "Surat sudah ada";
			header('Location: index.php');
		}
	}

 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">
	            <h2>Tambah Surat Masuk</h2>
	            <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>No. Surat</label>
						<input type="text" name="nomor_surat" class="form-control">
					</div>

					<div class="form-group">	
						<label>Tanggal Masuk</label>
						<input type="date" name="tanggal_masuk" class="form-control">
					</div>

					<div class="form-group">
						<label>Pengirim</label>
						<input type="text" name="pengirim" class="form-control">
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