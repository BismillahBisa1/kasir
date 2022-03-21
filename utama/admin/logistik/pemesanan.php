<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
    <meta name="description" content="">
    <meta name="author" content="">
    <?php

readfile('../tittle.php');
?>
   
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Pemesanan Barang</h1>
                        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-save fa-sm text-white-50"></i> SImpan</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                    
                <!-- /.container-fluid -->

              <!-- Begin Page Content -->
              <div class="container-fluid">

<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
    Kode Pemesanan : <input type="kode" size="20">
 <br><br>
 Nama Supplier : <input type="names" size="20">

 <br><br>
 Tanggal Pemesanan :  <input type="date" size="20">
    <hr>
    <button class="btn btn-success add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> + Barang
            </button>
            <br>
            <hr>
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <input type="text" name="nama[]"  value="Nama Barang"size="20">
            <input type="text" name="harga[]"  value="Harga"size="15">
            <input type="text" name="jumlah[]"   value="Jumlah"size="5">
            <input type="text" name="diksonpersen[]" value="Diskon %" size="5"> 
            <input type="text" name="diskonrp[]" value="Diskon Rp"  size="13">
            <input type="text" name="ppn[]" value="PPN" size="10">
         
        
          </div>
         
        </form>
<br>
        <!-- class hide membuat form disembunyikan  -->
        <div class="copy hide">
            <div class="control-group">
            <input type="text" name="nama[]"  value="Nama Barang"size="20">
            <input type="text" name="harga[]"  value="Harga"size="15">
            <input type="text" name="jumlah[]"   value="Jumlah"size="5">
            <input type="text" name="diksonpersen[]" value="Diskon %" size="5"> 
            <input type="text" name="diskonrp[]" value="Diskon Rp"  size="13">
            <input type="text" name="ppn[]" value="PPN" size="10">
         
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus Barang</button>
      <br>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        </div>
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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>