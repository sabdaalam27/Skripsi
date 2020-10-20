<?php 

    require 'koneksi.php';

    session_start();
    
    $base_url="http://localhost/upk/";

    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }

    $id=$_SESSION['user']['id'];
    $query=mysqli_query($koneksi, "SELECT * FROM akun WHERE id = $id");
    $row=mysqli_fetch_assoc($query);

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Arsip Surat</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo $base_url; ?>assets/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="<?php  echo $base_url; ?>index.php">
                <span class="d-block d-lg-none">Arsip Surat</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile mx-auto mb-2" src="<?php echo $base_url; ?>assets/img/profile.jpg" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>index.php">Halaman Utama</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>surat_masuk">Surat Masuk</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>surat_keluar">Surat Keluar</a></li>
                    <?php if($_SESSION['user']['akses'] == 2) : ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>akun">Akun</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>ganti_password.php">Ganti Password</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo $base_url; ?>logout.php">Logout</a></li>

                </ul>
            </div>
        </nav>

    <div align="right" class="mt-2 mr-5">
        <p>Selamat Datang, <?php echo $row['nama']; ?></p>
    </div>