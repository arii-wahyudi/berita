<?php 
include 'koneksi.php';
session_start();
if (!$_SESSION['login']) {
	header("location: login.php");
}
$product = mysqli_query($koneksi,"SELECT * FROM barang");
$basa = mysqli_query($koneksi,"SELECT * FROM admin");
$barang = mysqli_num_rows($product);
$supp = mysqli_query($koneksi,"SELECT * FROM supplier");
$supplier = mysqli_num_rows($supp);
$min = mysqli_query($koneksi,"SELECT * FROM admin");
$admin = mysqli_num_rows($min);
$suppp = mysqli_query($koneksi,"SELECT * FROM wilayah");
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
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
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
		<div class="container">
			<h2>Dashboard</h2>
			<hr>
			<div class="row">
				<div class="col-sm-2 mr-4" style=" background-color: #7383ff; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Barang</h5> <h5><?php echo $barang ?></h5></div>
						<div class="col-sm-6"><img src="assets/img/boxes.png" style=" width: 4rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-4" style=" background-color: #45ff42; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Supplier</h5> <h5><?php echo $supplier ?></h5></div>
						<div class="col-sm-6"><img src="assets/img/supplier.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-4" style=" background-color: #fcff30; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Admin</h5> <h5><?php echo $admin ?></h5></div>
						<div class="col-sm-6"><img src="assets/img/admin.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="container">
				<div class="row">
					<div class="col-sm-6"><h5>Data Admin</h5></div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><h5>Data kota</h5></div>
							<div class="col-sm-6"><a href="tambah_kota.php"><button class="btn btn-danger">Tambah Kota</button></a></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 mr-4 shadow p-3 mb-5 bg-white rounded"><table class="table">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">nama</th>
								<th scope="col">username</th>
								<th scope="col">Password</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$tambah = 1;
							while ($data = mysqli_fetch_assoc($basa)){ ?>
								<tr>
									<th scope="row"><?php echo $tambah ?></th>
									<td><?php echo $data['nama_admin'] ?></td>
									<td><?php echo $data['username'] ?></td>
									<td><?php echo $data['password'] ?></td>
								</tr>
								<?php $tambah++; ?>
							<?php } ?>
						</tbody>
					</main>
				</table>
			</div>
			<div class="col-sm-5 shadow p-3 mb-5 bg-white rounded">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Kota</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while($kamp = mysqli_fetch_assoc($suppp)){ ?>
							<tr>
								<th scope="row"><?php echo $no ?></th>
								<td><?php echo $kamp['kota'] ?></td>
								<td><a href="hapus_kota.php?id=<?php echo $kamp['id_wilayah'] ?>"><button class="btn btn-primary">Hapus</button></a></td>

							</tr>
							<?php $no++ ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
	</html>