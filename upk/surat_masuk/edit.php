<?php 

	require '../koneksi.php';
	require '../header.php';

	$id=$_GET['id'];

	if(isset($_POST['submit'])){
		$nomor_surat=$_POST['nomor_surat'];
		$tanggal_masuk=$_POST['tanggal_masuk'];
		$pengirim=$_POST['pengirim'];
		$perihal=$_POST['perihal'];
		$file_surat=$_POST['file_lama'];
		$lokasi_lama = './img/'.$_POST['file_lama'];
		if ($_FILES['file_surat']['name']) {
			$file_surat=time().''.$_FILES['file_surat']['name'];
			$lokasi='./img/'.$file_surat;
			unlink($lokasi_lama);
			move_uploaded_file($_FILES['file_surat']['tmp_name'], $lokasi);
		}

		$sql="UPDATE surat_masuk SET nomor_surat='$nomor_surat', tanggal_masuk='$tanggal_masuk', pengirim='$pengirim', perihal='$perihal', file_surat='$file_surat' WHERE id='$id'";

		$query=mysqli_query($koneksi, $sql);
		$_SESSION['berhasil'] = "Surat masuk berhasil diubah";
		header('location: index.php');
	}

	$sql_read="SELECT * FROM surat_masuk WHERE id='$id'";
	$query_read=mysqli_query($koneksi, $sql_read);
	$row=mysqli_fetch_assoc($query_read);

 ?>


 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section mt-3">
	        <div class="resume-section-content">
	        	<h2>Edit Surat Masuk</h2>
			 	<form action="" method="post" enctype="multipart/form-data">
			 		<div class="form-group">
						<label>No. Surat</label>
						<input type="text" name="nomor_surat" class="form-control" value="<?php echo $row['nomor_surat'] ?>">
			 		</div>

			 		<div class="form-group">
						<label>Tanggal Masuk</label>
						<input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $row['tanggal_masuk'] ?>">
			 		</div>

			 		<div class="form-group">
						<label>Pengirim</label>
						<input type="text" name="pengirim" class="form-control" value="<?php echo $row['pengirim'] ?>">
			 		</div>

			 		<div class="form-group">
						<label>Perihal</label>
						<input type="text" name="perihal" class="form-control" value="<?php echo $row['perihal'] ?>">
			 		</div>

			 		<div class="row mb-3">
			 			<div class="col-md-4">
							<a href="#"><img src="img/<?php echo $row['file_surat']; ?>" class="img-thumbnail" data-toggle="modal" data-target="#exampleModal"></a>
			 			</div>
			 			<div class="col-md-8">
					 		<div class="form-group">
								<label>File Surat</label>
								<input type="hidden" name="file_lama" value="<?php echo $row['file_surat']; ?>">
								<input type="file" name="file_surat" class="form-control">
					 		</div>
			 			</div>
			 		</div>
			 		
					<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
				</form>
		     </div>
	    </section>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <img src="img/<?php echo $row['file_surat']; ?>" class="img-thumbnail">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

 
<?php require '../footer.php'; ?>