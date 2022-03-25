<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewsatuan'])){
    $nama = $_POST['nama_satuan'];

    $addtotable = mysqli_query($koneksi,"INSERT into masterdata_satuan(nama_satuan) values('$nama')");
    if($addtotable){
        header('location:satuan.php');
    }else{
        header('location:#');
    }
}

//update info instansi
if(isset($_POST['updatesatuan'])){
    $ids = $_POST['id_satuan'];
    $nama = $_POST['nama_satuan'];

    $update = mysqli_query($koneksi,"UPDATE masterdata_satuan set nama_satuan='$nama' where id_satuan='$ids'");
    if($update){
        header('location:satuan.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deletesatuan'])){
    $ids = $_POST['id_satuan'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_satuan where id_satuan = '$ids'");
    if($hapus){
        header('location:satuan.php');
    }else{
        header('location:satuan.php');
    }
}
?>