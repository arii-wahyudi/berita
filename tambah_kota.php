<?php 
include 'koneksi.php';
session_start();
if (!$_SESSION['login']) {
	header("location: login.php");
}
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$query = mysqli_query($koneksi,"INSERT INTO wilayah VALUES ('','$nama')");
	if ($query) {
		echo "<script>alert('Berhasil tambah kota');
		document.location.href = 'index.php';
		</script>";
	}
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
					<a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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
		<div class="jumbotron jumbotron-fluid" style=" background-color: white; ">
			<div class="container">
				<h1 class="display-4">Tambah Kota</h1>
				<hr>
				<form method="POST">
					<div class="form-group">
						<label for="nama">Nama Kota</label>
						<input type="text" name="nama" class="form-control" id="nama">
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</main>



	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>