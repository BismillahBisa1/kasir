<?php
  require 'function.php';

  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
      $data = mysqli_fetch_assoc($cekdatabase);
      if($data['role']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";

        header('location:utama/admin/index.php');
      }else if($data['role']=="gudang"){
        $_SESSION['username'] = $username;
        $_SESSION['role']= "gudang";

        header('location:http://localhost/kasir/utama/admin/logistik/pemesanan.php');
      }else if($data['role']=="kasir"){
        $_SESSION['username'] = $username;
        $_SESSION['role']= "kasir";

        header('location:kasir.html');
      }else if($data['role']=="keuangan"){
        $_SESSION['username'] = $username;
        $_SESSION['role']= "keuangan";

        header('location:keuangan.html');
      }

    }else{
      header('location:login.php');
    };
  };

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Kasir</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/kasir.png" rel="icon">
  <link href="assets/img/kasir.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Bootslander - v4.7.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">
      <form method="post">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>SELAMAT DATANG DI SISTEM KASIR</h1>
            <input type="text" class="form-control" name="username" id="subject" placeholder="Username" required>
            <br>
            <input type="password" class="form-control" name="password" id="subject" placeholder="Password" required>
            <br>
            <div class="text-center text-lg-start">
                <center>
              <button  class="btn-get-started scrollto" name="login">LOGIN</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets/img/kasir.png" class="img-fluid animated" alt="">
        </div>
        </form>
      </div>
    </div>
    <center>
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
    
    </svg>
  </section><!-- End Hero -->
  <footer id="footer">
  <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KASIR 2022</span></strong>. All Rights Reserved
      </div>
  
    </div> 
  </footer><!-- End Footer -->
  </main><!-- End #main -->
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>