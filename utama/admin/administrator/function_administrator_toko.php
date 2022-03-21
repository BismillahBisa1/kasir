<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

  // membuat variabel untuk menampung data dari form
// $id = $_POST['1'];
$nama_toko   = $_POST['nama_toko'];
$alamat     = $_POST['alamat'];
$no_telepon   = $_POST['no_telepon'];
$website     = $_POST['website'];
$gambar = $_FILES['gambar']['name'];
  //cek dulu jika merubah gambar Guru jalankan coding ini
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../../gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar

                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                  $query  = "UPDATE administrasi_toko SET nama_toko = '$nama_toko', alamat = '$alamat',no_telepon = '$no_telepon', website = '$website', gambar = '$nama_gambar_baru'";
                //   $query .= "WHERE id = '$id'";
                  $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                  if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                  } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil diubah.');window.location='administrator_toko.php';</script>";
                  }
                } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='administrator_toko.php';</script>";
                }
              } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                $query  = "UPDATE administrasi_toko SET nama_toko = '$nama_toko', alamat = '$alamat',no_telepon = '$no_telepon', website = '$website'";
                // $query .= "WHERE id = '$id'";
                $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
                if(!$result){
                  die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                   " - ".mysqli_error($koneksi));
                } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
                  echo "<script>alert('Data berhasil diubah.');window.location='administrator_toko.php';</script>";
                }
              }



