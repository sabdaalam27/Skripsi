<?php 

	require '../koneksi.php';
	require '../header.php';

	if($_SESSION['user']['akses'] != 2){
		header('Location: ../error.php');
		exit();
	}

	$sql_read="SELECT *FROM akun";
	$query_read=mysqli_query($koneksi, $sql_read);

 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">

	            <h2 class="mb-5">Daftar User</h2>

	            <?php if(isset($_SESSION['berhasil'])) : ?>
		        	<div class="alert alert-success">
		        		<?php 
		        			echo $_SESSION['berhasil']; 
		        			unset($_SESSION['berhasil']);
		        		?>
		        	</div>
	        	<?php endif; ?>

	            <a href="tambah.php" class="btn btn-info btn-sm mb-3">Tambah Akun</a>
	            <table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Username</th>
						<th>Akses</th>
						<th>Aksi</th>
					</tr>

					<?php if(mysqli_num_rows($query_read) == 0) : ?>
						<td class="text-center" colspan="6">Tidak ada data</td>
					<?php endif; ?>
					
					<?php $no=1; while($row=mysqli_fetch_assoc($query_read)) : ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['jabatan']; ?></td>
						<td><?php echo $row['user_name']; ?></td>
						<td><?php echo $row['akses']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
							<a onclick="return confirm('Apakah anda yakin?')" href="hapus.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++; endwhile; ?>
				</table>
	        </div>
	    </section>
	</div>

 <?php require '../footer.php'; ?>