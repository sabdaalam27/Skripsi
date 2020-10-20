<?php 
    session_start();
    require 'koneksi.php';
    $base_url="http://localhost/upk/";

    if(isset($_SESSION['user'])){
        header('Location: index.php');
    }

    $error = '';

      if(isset($_POST['submit'])){

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];


        if(!empty(trim($user_name)) && !empty(trim($password))){

          $sql = "SELECT * FROM akun WHERE user_name='$user_name'";
          $query = mysqli_query($koneksi, $sql);
        
          if(mysqli_num_rows($query) != 0){

            $row = mysqli_fetch_assoc($query);

            if(password_verify($password, $row['password'])){

              $_SESSION['user'] = $row;
              header('Location: index.php');

            }else{
              $error = 'username atau password salah';
            }
            

          }else{
            $error = 'username belum ada';
          }

        }else{
          $error = 'Data tidak boleh kosong';
        }
      
      }
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
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            .btn-orange{
                color: #fff;
                background-color: #bd5d38;
                border-color: #bd5d38;
            }

            .btn-orange:hover {
                  color: #fff;
                  background-color: #9f4e2f;
                  border-color: #964a2c;
            }
            .btn-orange:focus, .btn-orange.focus {
              color: #fff;
              background-color: #9f4e2f;
              border-color: #964a2c;
              box-shadow: 0 0 0 0.2rem rgba(199, 117, 86, 0.5);
            }
        </style>
    </head>

    <body>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2 align="center">Aplikasi Arsip Elektronik</h2><br>
                            <h6>Silahkan Login</h6><br>

                            <?php if($error != '') : ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>    
                            </div>
                            <?php endif; ?>

                            <form action="" method="post">   
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user_name" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                              </div> 

                              <button type="submit" name="submit" class="btn btn-info btn-sm">Login</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>