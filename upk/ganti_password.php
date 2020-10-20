<?php 

	require 'koneksi.php';
	require 'header.php';

	$id=$_SESSION['user']['id'];


	if(isset($_POST['submit'])){
		$password_lama=$_POST['password_lama'];
		$password_baru=$_POST['password_baru'];
		$konfirmasi_password=$_POST['konfirmasi_password'];
		

		$query=mysqli_query($koneksi, "SELECT * FROM akun WHERE id='$id'");
		$row=mysqli_fetch_assoc($query);

		if(!empty($password_lama) && !empty($password_baru) && !empty($konfirmasi_password)){
			if(password_verify($password_lama, $row['password'])){
				if($password_baru==$konfirmasi_password){
					$password=password_hash($password_baru, PASSWORD_DEFAULT);
					$query_update=mysqli_query($koneksi, "UPDATE akun SET password='$password' WHERE id='$id'");
					mysqli_query($koneksi, $query_update);
					$_SESSION['berhasil']="Password Berhasil Diubah";
				}else{
					$_SESSION['gagal']="Password Baru Tidak Sama";
				}
			}else{
				$_SESSION['gagal']="Password Lama Salah";
			}
		}else{
			$_SESSION['gagal']="Data Harus Diisi Semua";
		}	
		
	}

 ?>



<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	    	<div class="resume-section-content">
	    		<h2>Ganti Password</h2>

	    		<?php if(isset($_SESSION['berhasil'])) : ?>
	    		<div class="alert alert-success">
	    			<?php 
	    				echo $_SESSION['berhasil'];
	    				unset($_SESSION['berhasil']);
	    			 ?>
	    		</div>
	    		<?php endif ?>

	    		<?php if(isset($_SESSION['gagal'])) : ?>
	    		<div class="alert alert-danger">
	    			<?php 
	    				echo $_SESSION['gagal'];
	    				unset($_SESSION['gagal']);
	    			 ?>
	    		</div>
	    		<?php endif ?>

	    		<form action="" method="post" enctype="multipart/form-data">
	    			<div class="form-group">
	    				<label>Password Lama</label>
	    				<input type="password" name="password_lama" class="form-control">	    				
	    			</div>
	    			
	    			<div class="form-group">
	    				<label>Password Baru</label>
	    				<input type="password" name="password_baru" class="form-control">	    				
	    			</div>

	    			<div class="form-group">
	    				<label>Konfirmasi Password Baru</label>
	    				<input type="password" name="konfirmasi_password" class="form-control">	    				
	    			</div>

	    			<button type="submit" name="submit" class="btn btn-primary btn-sm">Ubah</button>

	    		</form>


	    	</div>

	    </section>
</div>
	 <?php require 'footer.php'; ?>