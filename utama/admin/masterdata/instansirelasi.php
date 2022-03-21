<?php 
 require 'functioninstansirelasi.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Master Data Instansi Relasi</h1>
                        
                        <a href="../exportexcel/exportexcel_instansirelasi.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
        <div class="table-responsive">
        
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color:  #d3d3d3;" >
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>No Fax</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                <tbody>
                    <!-- php mengambil data yang ada di database stock lalu menampilkannya pada web -->
                      <?php
                      $batas = 10;
                      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
       
                      $previous = $halaman - 1;
                      $next = $halaman + 1;
                      
                      $data = mysqli_query($koneksi,"SELECT *
                      FROM masterdata_instansirelasi INNER JOIN masterdata_jenisrelasi 
                      ON masterdata_instansirelasi.id_jenisrelasi=masterdata_jenisrelasi.id_jenisrelasi");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);
                            $ambilsemuadatarelasi = mysqli_query($koneksi,"
                            
                            SELECT *
                            FROM masterdata_instansirelasi INNER JOIN masterdata_jenisrelasi 
                            ON masterdata_instansirelasi.id_jenisrelasi=masterdata_jenisrelasi.id_jenisrelasi limit $halaman_awal, $batas"); //mengambil atau mengambil semua data yang ada di stock//
                            $nomor = $halaman_awal+1;
                            while($data= mysqli_fetch_array(($ambilsemuadatarelasi))){ 
                                    $ids = $data['id'];
                                    $temp = $data['nama'];
                                    $alamat = $data['alamat'];
                                    $no_telepon = $data['no_telepon'];
                                    $no_fax = $data['no_fax'];
                                    $email = $data['email'];
                                    $website = $data['website']
                            
                            ?>
                  
                                        <tr>
                                            <td><?php echo $nomor++;?></td>
                                            <td><?php echo $temp;?></td>
                                            <td><?php echo $alamat;?></td>
                                            <td><?php echo $no_telepon;?></td>
                                            <td><?php echo $no_fax;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $website;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$ids;?>">
                                                    Edit
                                                </button>  
                                                <input type="hidden" name="idbarangygmaudihapus" value="<?=$ids?>">                    
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$ids;?>">
                                                    Delete
                                                </button>
                                            </td>
                                            
                                        </tr>
                                      
                                        <!-- Modal Edit  -->
                                            <!-- the modal -->
                                            <div class="modal fade" id="edit<?=$ids;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title"> Edit Data Instansi</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <select name="instansinya" class="from-control" required> 
            <?php 
                $ambilsemuadatanya = mysqli_query($koneksi,"select *from masterdata_jenisrelasi");
                while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namainstansinya = $fetcharray['nama'];
                    $idinstansinya = $fetcharray['id_jenisrelasi'];
                
            ?>
            <option value="<?=$idinstansinya;?>"><?= $namainstansinya;?></option>;

            <?php 
                }
            ?>
                        </select><br>
            <br>
                                                    <input type="text"  name="alamat" value="<?=$alamat;?>" class="from-control" required><br>
                                                    <label>Alamat Instansi </label><br>
                                                    <input type="text"  name="alamat" value="<?=$alamat;?>" class="from-control" required><br>
                                                <br>
                                                    <label>No Telepon </label><br>
                                                <input type="number" name="no_telepon" value="<?=$no_telepon;?>" class="from-control" required><br>
                                                <br>
                                                    <label>No Fax </label><br>
                                                <input type="number" name="no_fax" value="<?=$no_fax;?>" class="from-control" ><br>
                                                <br>
                                                    <label>Email </label><br>
                                                <input type="email" name="email" value="<?=$email;?>" class="from-control" ><br>
                                                <br>
                                                    <label>Website</label><br>
                                                <input type="text" name="website" value="<?=$website;?>" class="from-control" ><br>
                                                <br>
                                                <input type="hidden" name="id" value="<?=$ids?>">
                                                <button type="submit" class="btn btn-primary" name="updateinstansi">Save</button>
                                                </div>
                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit -->

                                        <!-- Modal Delete -->
                                             <!-- The Modal -->
                                             <div class="modal fade" id="delete<?=$ids;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data Instansi?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus Data Instansi <?=$namainstansinya;?>
                                                <input type="hidden" name="id" value="<?=$ids?>">
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-primary" name="deleteinstansi">Hapus</button>
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
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
                
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item">
                        <a class="page-link active" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>


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
        <h4 class="modal-title">Tambah Instansi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    
      <!-- Modal body -->
      <form method="POST">
        <div class="modal-body">
            <select name="instansinya" class="from-control" required> 
            <?php 
                $ambilsemuadatanya = mysqli_query($koneksi,"select *from masterdata_jenisrelasi");
                while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namainstansinya = $fetcharray['nama'];
                    $idinstansinya = $fetcharray['id_jenisrelasi'];
                
            ?>
            
            <option value="<?=$idinstansinya;?>"><?= $namainstansinya;?></option>;

            <?php 
                }
            ?>
                        </select><br>
            <br>
            <textarea name="alamat" rows="3" cols="30"  class="from-control" placeholder="Masukan Alamat anda" required></textarea><br>
            <!-- <input type="Textarea" rows="7" cols="70" name="alamat" class="from-control" placeholder="Masukan Alamat anda" required><br> -->
            <br>
            <input type="number" name="no_telepon"  class="from-control" placeholder="Masukan No telepon " required><br>
            <br>
            <input type="number" name="no_fax"  class="from-control" placeholder="Masukan No Fax " ><br>
            <br>
            <input type="Text" name="email" class="from-control" placeholder="Masukan Email Anda" ><br>
            <br>
            <input type="Text" name="website" class="from-control" placeholder="Masukan Website Anda" ><br>
            <br>

            <button type="submit" class="btn btn-primary" name="addinstansirelasi">Save</button>
            </div>
        
        </form>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


</html>