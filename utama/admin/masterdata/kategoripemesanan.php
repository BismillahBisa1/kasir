<?php 
require 'functionkategoripemesanan.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Master Data Kategori Pemesanan</h1>
                        <a href="../exportexcel/exportexcel_kategoripemesanan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Download Excel</a>
                        </div>

                        
                        <!-- Begin Page Content -->
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <!-- Button trigger modal -->
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        +
                                    </button>
                                </h6>
                            </div>
                            
                            <div class="container-fluid">
                                
                                <div class="card-body">
                                    <div class="table table-hover">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color:  #d3d3d3;" >
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tbody>
                                                  <!-- php mengambil data yang ada di database stock lalu menampilkannya pada web -->
                                                  
                                                  <?php
                                                  $batas = 10;
                                                  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                                  $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                                  
                                                  $previous = $halaman - 1;
                                                  $next = $halaman + 1;
                                                  
                                                  $data = mysqli_query($koneksi,"select * from masterdata_kategoripemesanan");
                                                  $jumlah_data = mysqli_fetch_row($data);
                                                  $total_halaman = ceil($jumlah_data || $batas);
                            $ambilsemuadatakategoripemesanan = mysqli_query($koneksi,"select * from masterdata_kategoripemesanan  limit $halaman_awal, $batas"); //mengambil atau mengambil semua data yang ada di stock//
                            $nomor = $halaman_awal+1;
                            while($data= mysqli_fetch_array(($ambilsemuadatakategoripemesanan))){ 
                                $kode = $data['kode'];
                                $id = $data['id'];
                                $nama = $data['nama'];
                                
                                ?>
                                
                                <tr>
                                    <td><?php echo $nomor++;?></td>
                                    <td><?php echo $kode;?></td>
                                    <td><?php echo $nama;?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id;?>">
                                            Edit
                                        </button>  
                                        <input type="hidden" name="idbarangygmaudihapus" value="<?=$id?>">                    
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id;?>">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Edit  -->
                                <!-- the modal -->
                                <div class="modal fade" id="edit<?=$id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Edit Kategori Pemesanan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    <label>Kode Kategori Pemesanan </label><br>
                                                    <input type="text" name="kode" value="<?=$kode;?>" class="from-control" required><br>
                                                    <br>
                                                    <label>Nama Kategori Pemesanan </label><br>
                                                    <input type="text" name="nama" value="<?=$nama;?>" class="from-control" required><br>
                                                    <br>
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <button type="submit" class="btn btn-primary" name="updatekategoripemesanan">Save</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Edit -->

                                <!-- Modal Delete -->
                                <!-- The Modal -->
                                <div class="modal fade" id="delete<?=$id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Kategori Pemesanan?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <?=$id;?>
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="deletekategoripemesanan">Hapus</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal delete -->
                                <?php
                            };

                            ?>
                            <!-- /.container-fluid -->        
                        </tr>
                    </thead>
                </tbody>


            </table>
        </div>
        
    </div>
</div>



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
</body>

<!-- Modal tambah -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori Pemesanan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <form method="POST">
        <div class="modal-body">
            <label>Kode Kategori Pemesanan</label><br>
            <input type="text" name="kode"  class="from-control"><br>
            
            <br>
            <label>Nama</label><br>
            <input type="text" name="nama"  class="from-control"><br>
            
            <br>
            <button type="submit" class="btn btn-primary" name="addnewkategoripemesanan">Save</button>
        </div>
        
    </form>

    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>

</html>
