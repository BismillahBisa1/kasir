<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewbarang'])){
    $nama = $_POST['nama'];

    $addtotable = mysqli_query($koneksi,"INSERT into masterdata_barang(nama) values('$nama')");
    if($addtotable){
        header('location:barang.php');
    }else{
        header('location:#');
    }
}

//update info instansi
if(isset($_POST['updatebarang'])){
    $ids = $_POST['id_barang'];
    $nama = $_POST['nama'];

    $update = mysqli_query($koneksi,"UPDATE masterdata_barang set nama='$nama' where id_barang='$ids'");
    if($update){
        header('location:barang.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deletebarang'])){
    $ids = $_POST['id_barang'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_barang where id_barang = '$ids'");
    if($hapus){
        header('location:barang.php');
    }else{
        header('location:index.php');
    }
}
?>