<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewmasterdatapegawai'])){
  // membuat variabel untuk menampung data dari form
$nama   = $_POST['nama'];
$alamat_ktp   = $_POST['alamat_ktp'];
$alamat_domisili   = $_POST['alamat_domisili'];
$status_karyawan   = $_POST['status_karyawan'];
$masa_kontrak   = $_POST['masa_kontrak'];
$foto = $_FILES['foto']['name'];

//cek dulu jika ada gambar karyawan jalankan coding ini
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../../gambar/pegawai/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                $query = "INSERT INTO masterdata_pegawai (nama, alamat_ktp,alamat_domisili, status_karyawan,masa_kontrak, foto) VALUES ('$nama', '$alamat_ktp','$alamat_domisili', '$status_karyawan','$masa_kontrak','$nama_gambar_baru')";
                $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                if(!$result){
                  die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
                } else {
                    //tampil alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
                  echo "<script>alert('Data berhasil ditambah.');window.location='pegawai.php';</script>";
                }

              } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pegawai.php';</script>";
              }
            } else {
             $query = "INSERT INTO masterdata_pegawai (nama, alamat_ktp,alamat_domisili, status_karyawan,masa_kontrak, foto) VALUES ('$nama', '$alamat_ktp','$alamat_domisili', '$status_karyawan','$masa_kontrak', '$foto')";
             $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
             if(!$result){
              die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
               " - ".mysqli_error($koneksi));
            } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil ditambah.');window.location='pegawai.php';</script>";
            }
          }
}

//update  instansi
if(isset($_POST['updatekategoripemesanan'])){
 $id   = $_POST['id_pegawai'];
$nama   = $_POST['nama'];
$alamat_ktp   = $_POST['alamat_ktp'];
$alamat_domisili   = $_POST['alamat_domisili'];
$status_karyawan   = $_POST['status_karyawan'];
$masa_kontrak   = $_POST['masa_kontrak'];
$foto = $_FILES['foto']['name'];
  //cek dulu jika merubah gambar pegawai jalankan coding ini
if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../gambar/pegawai/'.$nama_gambar_baru); //memindah file gambar ke folder gambar

                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                  $query  = "UPDATE masterdata_pegawai SET nama = '$nama', alamat_ktp = '$alamat_ktp',alamat_domisili = '$alamat_domisili', status_karyawan = '$status_karyawan',masa_kontrak = '$masa_kontrak',  foto = '$nama_gambar_baru'";
                  $query .= "WHERE id_pegawai = '$id'";
                  $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                  if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                  } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil diubah.');window.location='pegawai.php';</script>";
                  }
                } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pegawai.php';</script>";
                }
              } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                $query  = "UPDATE masterdata_pegawai SET judul = '$nama', alamat_ktp = '$alamat_ktp',alamat_domisili = '$alamat_domisili', status_karyawan = '$status_karyawan',masa_kontrak = '$masa_kontrak' ";
                $query .= "WHERE id_pegawai = '$id'";
                $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
                if(!$result){
                  die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                   " - ".mysqli_error($koneksi));
                } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
                  echo "<script>alert('Data berhasil diubah.');window.location='pegawai.php';</script>";
                }
              }
}


//menghapus Instansi
if(isset($_POST['deletepegawai'])){
    $id = $_POST['id_pegawai'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_pegawai where id_pegawai = '$id'");
    if($hapus){
        header('location:pegawai.php');
    }else{
        header('location:pegawai.php');
    }
}
?>