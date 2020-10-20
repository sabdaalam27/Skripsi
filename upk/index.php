<?php 
    require 'header.php';
    require 'koneksi.php';

    $query_surat_masuk = mysqli_query($koneksi, "SELECT * FROM surat_masuk");
    $jumlah_surat_masuk = mysqli_num_rows($query_surat_masuk);
    $query_surat_keluar = mysqli_query($koneksi, "SELECT * FROM surat_keluar");
    $jumlah_surat_keluar = mysqli_num_rows($query_surat_keluar);

    // $json = [
    //     'y' => $jumlah_surat_masuk,
    //     'a' => $jumlah_surat_keluar,
    // ];

    // $data = json_encode($json);
 ?>

    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h2>ARSIP SURAT</h2>
                <h3>UPK ARTHA RAHARJA</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <strong>Jumlah Surat Masuk</strong>
                                <p class="float-right"><?php echo $jumlah_surat_masuk; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <strong>Jumlah Surat Keluar</strong>
                                <p class="float-right"><?php echo $jumlah_surat_keluar; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bar-chart" class="mt-3"></div>
            </div>
        </section>
        <hr class="m-0" />
    </div>

<?php require 'footer.php'; ?>

<script>
    $(document).ready(function(){
        Morris.Bar({
          element: 'bar-chart',
          data: [
            { y: 'Surat Masuk', a: <?php echo $jumlah_surat_masuk; ?> },
            { y: 'Surat Keluar', a: <?php echo $jumlah_surat_keluar; ?>, },
          ],
          xkey: 'y',
          ykeys: ['a'],
          labels: ['Jumlah Surat'],
          hideHover: 'auto',
          parseTime: false
        });
    });
</script>