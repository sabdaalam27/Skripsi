<?php 

	require_once '../koneksi.php';
	require_once '../pdf/pdf.php';

	$dari = $_POST['dari'];
	$sampai = $_POST['sampai'];

	$query = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE tanggal_masuk BETWEEN '$dari' AND '$sampai'");
	
	$pdf = 
	'<style>
	 	@page { 
	 		margin: 20px; 
	 	}
	 	table {
		  width: 100%;
		  border-collapse: collapse;
		  font-size: 14px;
		}
	 </style>

	 <h3 align="center">Laporan Surat Masuk</h3>
	 <p align="center">Dari '.date('d M Y', strtotime($dari)).' - '.date('d M Y', strtotime($sampai)).'</p><br><br>
	';

	$pdf .=  
	'<table border="1" cellpadding="5" cellspacing="0">
		<tr align="center">
			<th>
              NO
            </th>
			<th>
              NO SURAT
            </th>
            <th>
              TANGGAL MASUK
            </th>
            <th>
              PENGIRIM
            </th>
            <th>
              PERIHAL
            </th>
	';

	$pdf .= '</tr>'; 

	$no = 1;
	while($data = mysqli_fetch_assoc($query)){
		$pdf .= 
		'<tr align="center">
			<td>'.$no.'</td>
			<td>'.$data['nomor_surat'].'</td>
			<td>'.$data['tanggal_masuk'].'</td>
		    <td>'.$data['pengirim'].'</td>
		    <td>'.$data['perihal'].'</td>
		';

		$pdf .= '</tr>';

		$no++;
	}

	$pdf .= '</table>';

	$filename = 'Laporan-Surat-Masuk.pdf';
	$print = new Pdf();
	$print->loadHtml($pdf);
	$print->render();
	$print->stream($filename, array("Attachment" => false));
	exit(0); 
	
 ?>