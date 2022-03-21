<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah isntansi
if(isset($_POST['addnewuser'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $addtotable = mysqli_query($koneksi,"INSERT into user(nama,username,password,role) values('$nama','$username','$password','$role')");
    if($addtotable){
        header('location:user.php');
    }else{
        header('location:#');
    }
}

//update info instansi
if(isset($_POST['updatedatauser'])){
    $ids = $_POST['iduser'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $update = mysqli_query($koneksi,"UPDATE user set nama='$nama',username='$username',password='$password',role='$role' where iduser='$ids'");
    if($update){
        header('location:user.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deleteuser'])){
    $ids = $_POST['iduser'];

    $hapus = mysqli_query($koneksi, " delete from user where iduser = '$ids'");
    if($hapus){
        header('location:user.php');
    }else{
        header('location:index.php');
    }
}
?>