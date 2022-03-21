<?php 
session_start();
$koneksi = mysqli_connect("Localhost","root","","kasir");

//tambah iNSTANSI
if(isset($_POST['addinstansirelasi'])){

    $id_jenisrelasi =$_POST['instansinya'];
    $alamat= $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $no_fax = $_POST['no_fax'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $addtotableinstansi = mysqli_query($koneksi,"INSERT into masterdata_instansirelasi(id,id_jenisrelasi,alamat,no_telepon,no_fax,email,website) values('$id','$id_jenisrelasi','$alamat','$no_telepon','$no_fax','$email','$website')");
    if($addtotable){
        header('location:instansirelasi.php');
    }else{
        header('location:#');
    }
}

//update info instansi
if(isset($_POST['updateinstansi'])){
    $id_jenisrelasi = $_POST['instansinya'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $no_fax = $_POST['no_fax'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $ids = $_POST['id'];
    $update = mysqli_query($koneksi,"UPDATE masterdata_instansirelasi set id_jenisrelasi='$id_jenisrelasi',alamat='$alamat', no_telepon='$no_telepon',no_fax='$no_fax',email='$email',website='$website' where id='$ids'");
    
    if($update){
        header('location:instansirelasi.php');
    }else{
        header('location:index.php');
    }
}

//menghapus Instansi
if(isset($_POST['deleteinstansi'])){
    $ids = $_POST['id'];

    $hapus = mysqli_query($koneksi, " delete from masterdata_instansirelasi where id = '$ids'");
    if($hapus){
        header('location:instansirelasi.php');
    }else{
        header('location:index.php');
    }
}

?>