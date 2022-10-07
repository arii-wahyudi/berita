<?php 
include 'koneksi.php';
session_start();
if (!$_SESSION['login']) {
	header("location: login.php");
}
$query = mysqli_query($koneksi,"SELECT * FROM barang JOIN supplier ON barang.id_supplier = supplier.id_supplier");
if (isset($_POST['submit'])) {
	$cari = $_POST['cari'];
	$query = mysqli_query($koneksi,"SELECT * FROM barang WHERE nama_barang = '$cari'");
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="icon" href="assets/img/warehouse.png">
	<title>DroidHouse</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark " style=" background-color:#36ebba; ">
		<a class="navbar-brand" href="#"><img src="assets/img/warehouse.png" style=" width: 3rem; ">Droid WireHouse</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="barang.php">Barang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="supplier.php">Supplier</a>
				</li>
			</ul>
			<span class="navbar-text">
				<a href="logout.php"><button type="button" id="cok" style=" width: 160px ; " class="btn btn-dark">LOGOUT</button></a>
			</span>
		</div>
	</nav>
	<main>
		<br>
		<h4>Data Barang</h4>
		<form method="POST" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Search</button>
		</form>
		<a href="tambah_barang.php"><button  class="btn btn-primary" style=" float:right; ">Tambah</button></a>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th>Gambar</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Stok</th>
					<th scope="col">harga</th>
					<th scope="col">nama</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				while($barang = mysqli_fetch_assoc($query)){ ?>
					<tr>
						<th scope="row"><?php echo $no ?></th>
						<td><?php echo $barang['nama_barang'] ?></td>
						<td><img  style=" width: 50px; height: 50px;" src="assets/img/<?php echo $barang['img'] ?>"></td>
						<td><?php echo $barang['tanggal_barang'] ?></td>
						<td><?php echo $barang['stok_barang'] ?></td>
						<td><?php echo rupiah($barang['harga_barang']) ?></td>
						<td><?php echo $barang['nama_supplier'] ?></td>
						<td><a href="hapus_barang.php?id=<?php echo $barang['id_barang'] ?>"><button class=" btn btn-danger ">Hapus</button></a> | <a href="ubah_barang.php?id=<?php echo $barang['id_barang'] ?>"><button class=" btn btn-warning ">Ubah</button></a> </td>
					</tr>
					<?php $no++ ?>
				<?php } ?>
			</tbody>
		</table>
	</main>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
