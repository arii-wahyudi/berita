<?php 
include 'koneksi.php';
session_start();
if (!$_SESSION['login']) {
	header("location: login.php");
}
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id'")->fetch_assoc();
if (isset($_POST['submit'])) {
	$error = $_FILES['file']['error'];
	if ($error == 4) {
		$namas = $_POST['nama'];
		$tanggal = $_POST['tanggal'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		$ganti = mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$namas', tanggal_barang = '$tanggal', stok_barang = '$stok', harga_barang = '$harga' WHERE id_barang = '$id'");
		if ($ganti) {
			echo "<script>
			alert('data berhasil di ubah');
			document.location.href = 'barang.php'
			</script>";
			die();
		}else{
			echo "gagal";
		}
	}else{
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$namas = $_POST['nama'];
		$tanggal = $_POST['tanggal'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];


		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, 'assets/img/'.$nama);
				$masuk = mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$namas', tanggal_barang = '$tanggal', stok_barang = '$stok', harga_barang = '$harga', img = '$nama' WHERE id_barang = '$id'");
				if($masuk){
					echo "<script>
					alert('data berhasil di upload');
					document.location.href = 'barang.php'
					</script>";
				}else{
					echo "<script>
					alert('gagal upload data');
					document.location.href = 'tambah_barang.php'
					</script>";
				}
			}else{
				echo "<script>
				alert('ukuran file terlalu besar');
				document.location.href = 'tambah_barang.php'
				</script>";
			}
		}else{
			echo "<script>
			alert('hanya menerima png dan jpg');
			document.location.href = 'tambah_barang.php'
			</script>";
		}
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
		<div class="jumbotron jumbotron-fluid" style=" background-color: white; ">
			<div class="container">
				<h1 class="display-4">Tambah Barang</h1>
				<hr>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama">Nama Barang</label>
						<input type="text" value="<?php echo $query['nama_barang'] ?>" name="nama" class="form-control" id="nama">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal Barang</label>
						<input type="date" value="<?php echo $query['tanggal_barang'] ?>" name="tanggal" class="form-control" id="tanggal">
					</div>
					<div class="form-group">
						<label for="stok">Stok Barang</label>
						<input type="number"value="<?php echo $query['stok_barang'] ?>" name="stok" class="form-control" id="stok">
					</div>
					<div class="form-group">
						<label for="harga">Harga Barang</label>
						<input type="number" name="harga" value="<?php echo $query['harga_barang'] ?>" class="form-control" id="harga">
					</div>
					<div class="form-group">
						<label for="img">Gambar Barang</label>
						<input type="file" name="file" class="form-control" id="img">
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