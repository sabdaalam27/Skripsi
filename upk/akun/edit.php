<?php 

	require '../koneksi.php';
	require '../header.php';

	$id=$_GET['id'];

	if(isset($_POST['submit'])){
		$nama=$_POST['nama'];
		$user_name=$_POST['user_name'];
		$jabatan=$_POST['jabatan'];
		$akses=$_POST['akses'];

		$sql="UPDATE akun SET nama='$nama', user_name='$user_name', jabatan='$jabatan', akses='$akses' WHERE id='$id'";

		$query=mysqli_query($koneksi, $sql);
		$_SESSION['berhasil'] = "Surat masuk berhasil diubah";
		header('location: index.php');
	}

	$sql_read="SELECT * FROM akun WHERE id='$id'";
	$query_read=mysqli_query($koneksi, $sql_read);
	$row=mysqli_fetch_assoc($query_read);

 ?>


 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section mt-3">
	        <div class="resume-section-content">
	        	<h2>Edit User</h2>
			 	<form action="" method="post" enctype="multipart/form-data">
			 		<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">
			 		</div>
			 		
			 		<div class="form-group">
						<label>Jabatan</label>
						<input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan'] ?>">
					</div>

			 		<div class="form-group">
						<label>Username</label>
						<input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name'] ?>">
			 		</div>

					<div class="form-group">
						<label>Akses</label>
						<select name="akses" class="form-control">
							<?php if($row['akses'] == 0) : ?>
								<option value="0" selected>Ketua</option>
								<option value="1">Petugas</option>
								<option value="2">Admin</option>
							<?php elseif($row['akses'] == 1) : ?>
								<option value="0">Ketua</option>
								<option value="1" selected>Petugas</option>
								<option value="2">Admin</option>
							<?php else : ?>
								<option value="0">Ketua</option>
								<option value="1">Petugas</option>
								<option value="2" selected>Admin</option>
							<?php endif; ?>
						</select>
					</div>
			 		
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
				</form>
		     </div>
	    </section>
	</div>
 
<?php require '../footer.php'; ?>