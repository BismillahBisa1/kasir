<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewinstansi'])){
    $nama = $_POST['nama'];

    $addtotable = mysqli_query($koneksi,"INSERT into masterdata_jenisrelasi(nama) values('$nama')");
    if($addtotable){
        header('location:jenisrelasi.php');
    }else{
        header('location:#');
    }
}

//update info instansi
if(isset($_POST['updateinstansi'])){
    $ids = $_POST['id_jenisrelasi'];
    $nama = $_POST['nama'];

    $update = mysqli_query($koneksi,"UPDATE masterdata_jenisrelasi set nama='$nama' where id_jenisrelasi='$ids'");
    if($update){
        header('location:jenisrelasi.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deleteinstansi'])){
    $ids = $_POST['id_jenisrelasi'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_jenisrelasi where id_jenisrelasi = '$ids'");
    if($hapus){
        header('location:jenisrelasi.php');
    }else{
        header('location:index.php');
    }
}
?>