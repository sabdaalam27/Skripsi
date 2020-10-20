<?php 

	require '../koneksi.php';
	require '../header.php';

	$sql_read="SELECT * FROM surat_keluar";
	$query_read=mysqli_query($koneksi, $sql_read);

	if(isset($_GET['cari'])){
		while($row_surat = mysqli_fetch_assoc($query_read)){
			$surat[] = $row_surat;
		}

		$cari = $_GET['cari'];
		$hasil = '';
		$ditemukan = false;
		$i=0;
		while($i<=count($surat) && !$ditemukan)
		{
			if( (isset($surat[$i])) && (($surat[$i]['nomor_surat'] == $cari) || ($surat[$i]['penerima'] == $cari) || ($surat[$i]['tanggal_keluar'] == $cari) ||
			 ($surat[$i]['perihal'] == $cari) ) ){
				$hasil = $surat[$i];
				$ditemukan=true;
			}
			$i++;
		}
	}

 ?>

 	<!-- Page Content-->
	<div class="container-fluid p-0">
	    <!-- About-->
	    <section class="resume-section">
	        <div class="resume-section-content">

	            <h2 class="mb-5">Daftar Surat Keluar</h2>

	            <?php if(isset($_SESSION['berhasil'])) : ?>
		        	<div class="alert alert-success">
		        		<?php 
		        			echo $_SESSION['berhasil']; 
		        			unset($_SESSION['berhasil']);
		        		?>
		        	</div>
	        	<?php endif; ?>

	        	<div class="row">	
		        	<div class="col-md-4">
		        		<?php if($_SESSION['user']['akses'] != 0) : ?>
		            	<a href="tambah.php" class="btn btn-info btn-sm mb-3">Tambah Surat Keluar</a>
		            	<?php endif; ?>
		        	</div>

		        	<div class="col-md-4">		
			            <form action="" method="get">
				            <div class="input-group input-group-sm mb-3">
							  <input type="text" class="form-control" name="cari" placeholder="Cari surat keluar">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
							  </div>
							</div>
		        		</form>
		        	</div>

		        	<div class="col-md-4" align="right">
		        		<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetakSuratKeluar">Cetak</a>
		        	</div>
	        	</div>
	            <table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>No. Surat</th>
						<th>Tanggal Keluar</th>
						<th>Penerima</th>
						<th>Perihal</th>
						<?php if($_SESSION['user']['akses'] != 0) : ?>
						<th>Aksi</th>
						<?php endif; ?>
					</tr>

					<?php if(mysqli_num_rows($query_read) == 0) : ?>
						<td class="text-center" colspan="6">Tidak ada data</td>
					<?php endif; ?>
					
					<?php if(!isset($_GET['cari'])) : ?>
						<?php $no=1; while($row=mysqli_fetch_assoc($query_read)) : ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nomor_surat']; ?></td>
							<td><?php echo $row['tanggal_keluar']; ?></td>
							<td><?php echo $row['penerima']; ?></td>
							<td><?php echo $row['perihal']; ?></td>
							<?php if($_SESSION['user']['akses']) : ?>
							<td>
								<a href="lihat.php?id=<?php echo $row['id']; ?>" class="badge badge-secondary">Lihat File</a>
								<a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
								<a onclick="return confirm('Apakah anda yakin?')" href="hapus.php?id=<?php echo $row['id']; ?>&file=<?php echo $row['file_surat']; ?>" class="badge badge-danger">Hapus</a>
							</td>
							<?php endif; ?>
						</tr>
						<?php $no++; endwhile; ?>
						<?php elseif($hasil != '') : ?>
						<tr>
							<td><?php echo 1; ?></td>
							<td><?php echo $hasil['nomor_surat']; ?></td>
							<td><?php echo $hasil['tanggal_keluar']; ?></td>
							<td><?php echo $hasil['penerima']; ?></td>
							<td><?php echo $hasil['perihal']; ?></td>
							<?php if($_SESSION['user']['akses'] != 0) : ?>
							<td>
								<a href="lihat.php?id=<?php echo $row['id']; ?>" class="badge badge-secondary">Lihat File</a>
								<a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
								<a onclick="return confirm('Apakah anda yakin?')" href="hapus.php?id=<?php echo $row['id']; ?>&file=<?php echo $row['file_surat']; ?>" class="badge badge-danger">Hapus</a>
							</td>
							<?php endif; ?>
						</tr>
						<?php else : ?>
							<tr>
								<td class="text-center" colspan="6">Tidak ada data</td>
							</tr>
					<?php endif; ?>
				</table>
	        </div>
	    </section>
	</div>

	<!-- Modal -->
<div class="modal fade" id="cetakSuratKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cetak.php" method="post">
        	<div class="form-group">
        		<label>Dari Tanggal</label>
        		<input type="date" name="dari" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Sampai Tanggal</label>
        		<input type="date" name="sampai" class="form-control">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cetak</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <?php require '../footer.php'; ?>