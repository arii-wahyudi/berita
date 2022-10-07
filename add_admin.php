<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$kuari = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username'");
	if ($kuari->num_rows > 0) {
		echo "<script>alert('username telah dipakai');
		document.location.href = 'add_admin.php';
		</script>";
	}else{
		$query = mysqli_query($koneksi,"INSERT INTO admin VALUES('','$nama','$username','$password')");
		if ($query) {
			echo "<script>alert('data berhasil ditambahkan');
			document.location.href = 'login.php';
			</script>";
		}else{
			echo "<script>alert('Data gagal ditambahkan');
			document.location.href = 'add_admin.php';
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
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
	body{
		font-family: 'Poppins', sans-serif;
	}
</style>
</head>
<body>
	<main>
		<br>
		<div class="container shadow-lg p-3 mb-5 bg-white rounded">
			<h4>Formulir Admin</h4>
			<hr>
			<form method="post">
				<label for="nama"><b>Nama admin</b></label>
				<br>
				<input type="text" style=" width:100%;" id="nama" name="nama" placeholder="masukan nama admin">
				<br><br>
				<label for="username"><b>Username</b></label>
				<br>
				<input type="text" name="username" id="username" placeholder="masukan username admin" style=" width:100%;" >
				<br><br>
				<label for="password"><b>password</b></label>
				<br>
				<input type="password" style=" width:100%;" id="password" name="password" placeholder="masukan password admin">
				<br><br>
				<label for="no"><b>No Telpon</b></label>
				<br>
				<input type="number" style=" width:100%;" name="no" id="no" placeholder="masukan nomor telpon pegawai">
				<br><br>
				<button type="submit" name="submit" class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>