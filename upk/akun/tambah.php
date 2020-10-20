<?php 

	require '../koneksi.php';
	require '../header.php';

	if(isset($_POST['submit'])){
		$nama=$_POST['nama'];
		$user_name=$_POST['user_name'];
		$password = password_hash($user_name, PASSWORD_DEFAULT);
		$jabatan=$_POST['jabatan'];
		$akses=$_POST['akses'];

		$sql="INSERT INTO akun(nama, user_name, password, jabatan, akses) VALUES('$nama', '$user_name', '$password', '$jabatan', '$akses')";

		$query=mysqli_query($koneksi, $sql);
		$_SESSION['berhasil'] = "User berhasil ditambahkan";
		header('Location: index.php');
	}

 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">
	            <h2>Tambah User</h2>
	            <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>

					<div class="form-group">
						<label>Jabatan</label>
						<input type="text" name="jabatan" class="form-control">
						
					<div class="form-group">	
						<label>Username</label>
						<input type="text" name="user_name" class="form-control">
					</div>

					</div>

					<div class="form-group">
						<label>Akses</label>
						<select name="akses" class="form-control">
							<option value="0">Ketua</option>
							<option value="1">Petugas</option>
							<option value="2">Admin</option>
						</select>
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
				</form>
	        </div>
	    </section>
	</div>

 <?php require '../footer.php'; ?>