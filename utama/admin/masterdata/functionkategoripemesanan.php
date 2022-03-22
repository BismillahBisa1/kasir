<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewkategoripemesanan'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    

    $addtotable = mysqli_query($koneksi,"INSERT into masterdata_kategoripemesanan(kode, nama) values('$kode', '$nama')");
    if($addtotable){
        header('location:kategoripemesanan.php');
    }else{
        header('location:#');
    }
}


//update info instansi
if(isset($_POST['updatekategoripemesanan'])){
    $id = $_POST['id_kategoripemesanan'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    $update = mysqli_query($koneksi,"UPDATE masterdata_kategoripemesanan set nama='$nama' , kode='$kode' where id_kategoripemesanan='$id'");
    if($update){
        header('location:kategoripemesanan.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deletekategoripemesanan'])){
    $id = $_POST['id_kategoripemesanan'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_kategoripemesanan where id_kategoripemesanan = '$id'");
    if($hapus){
        header('location:kategoripemesanan.php');
    }else{
        header('location:index.php');
    }
}
?>