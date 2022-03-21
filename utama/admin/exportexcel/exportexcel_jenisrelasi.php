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
	header("Content-Disposition: attachment; filename=Data JenisRelasi.xls");
	?>
 
	<center>
		<h1>Data <br/>Jenis Relasi</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("Localhost","root","","kasir");
 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from masterdata_jenisrelasi");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>