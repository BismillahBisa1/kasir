<!DOCTYPE html>
<html>
<head>
<?php

readfile('../tittle.php');
?>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataInstansiRelasi.xls");
	?>
 
	<center>
		<h1>Data <br/>Instansi Relasi</h1>
	</center>
 
	<table border="1">
		<tr>
		<th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>No Fax</th>
                        <th>Email</th>
                        <th>Website</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("Localhost","root","","kasir");
 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT *
		FROM masterdata_instansirelasi INNER JOIN masterdata_jenisrelasi 
		ON masterdata_instansirelasi.id_jenisrelasi=masterdata_jenisrelasi.id_jenisrelasi");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			
			$ids = $d['id'];
			$temp = $d['nama'];
			$alamat = $d['alamat'];
			$no_telepon = $d['no_telepon'];
			$no_fax = $d['no_fax'];
			$email = $d['email'];
			$website = $d['website']
	
	?>

				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $temp;?></td>
					<td><?php echo $alamat;?></td>
					<td><?php echo $no_telepon;?></td>
					<td><?php echo $no_fax;?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $website;?></td>
		<?php 
		}
		?>
	</table>
</body>
</html>