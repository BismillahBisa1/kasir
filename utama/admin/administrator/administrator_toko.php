<?php 
include '../koneksi.php';

?>
<?php

  // mengecek apakah di url ada nilai GET id
if (isset($_GET['1'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = ($_GET["1"]);

    // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT * FROM administrator_staf WHERE id='1'";
  $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
  if(!$result){
    die ("Query Error: ".mysqli_errno($koneksi).
      " - ".mysqli_error($koneksi));
  }
    // mengambil data dari database
  $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='administrator_toko.php';</script>";
  }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
}         
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <?php

readfile('../tittle.php');
?>
  <!-- Custom fonts for this template-->
 <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<!-- Custom styles for this page -->
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

     
<?php

readfile('../menu.php');
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
<?php

readfile('../header.php');
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Toko</h1>
                        
                    </div>

                
  <!-- Begin Page Content -->
  <div class="container-fluid">



<!-- Content Row -->
<div class="row">
 <?php
                             $ambilsemuadatarelasi = mysqli_query($koneksi,"SELECT * FROM administrasi_toko WHERE id=1"); //mengambil atau mengambil semua data yang ada di stock//
                             while($data= mysqli_fetch_array(($ambilsemuadatarelasi))){ 
                                     
 ?>
    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Toko</h6>
            </div>
            <div class="card-body">
            <form method="POST" action="function_administrator_toko.php" enctype="multipart/form-data" >
                <div class="chart-area">
                <input name="id" value="<?php echo $data['1']; ?>"  hidden />
                    <label><b>Nama Toko : </b></label>
                    <input type="text"  name="nama_toko" value="<?php echo $data['nama_toko']; ?>" class="form-control" required><br>
                    <label><b>Alamat Toko : </b></label>
                    <input type="text" rows="3" cols="30"  name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" required><br>
                   
                    <label><b>Telepon : </b></label>
                    <input type="number"  name="no_telepon" value="<?php echo $data['no_telepon']; ?>" class="form-control " required><br>
                    <label><b>Website : </b></label>
                    <input type="text"  name="website" value="<?php echo $data['website']; ?>"class="form-control" required><br>
                </div>
                
                <hr>
                <!-- <button type="submit" name="update_toko" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Simpan </button>
              
                                -->
            </div>
           
        </div>

       
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gambar Toko</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
     
                <img src="../../gambar/<?php echo $data['gambar']; ?>" style="width: 200px;float: left;margin-bottom: 5px" >
                <input type="file" name="gambar" />
                <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar toko</i>
              <?php 
                           }
              ?>
              <br>
              
                   
                <center> 
           
                </div>
                <hr>
                <button type="submit"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Simpan Perubahan</button>
            
            </div>
        </div>
      
    </div>
</div>

</div>
<!-- /.container-fluid -->


        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <?php

readfile('../footer.php');
?>
</body>

    </div>
  </div>
</div>


</html>
