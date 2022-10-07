<?php 
include 'koneksi.php';
session_start();
if (isset($_SESSION['login'])) {
	header("Location: index.php");
}
if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$password = $_POST['password'];
	$quary = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$user'")->fetch_assoc();
	if ($password === $quary['password']) {
		$_SESSION['login'] = 1;
		echo "<script>
		alert('Berhasil masuk');
		document.location.href = 'index.php'
		</script>";
	}else{
		echo "<script>
		alert('Username dan password salah');
		document.location.href = 'login.php'
		</script>";
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
		background-image: url('assets/img/back.jpg');
		background-size: cover;
		background-repeat: no-repeat;
	}
	.satu{
		margin-top: 20vh;
		margin-left: 50vh;
		width: 500px;
		height: 350px;
	}
</style>

</head>
<body>
	<div class="container">
		<div class="satu shadow-lg p-3 mb-5 bg-white rounded">
			<form method="POST" enctype="multipart/form-data">
				<center>
					<h3>Login Admin</h3>
					<hr>
				</center>
				<div class="form-group">
					<label for="exampleInputEmail1">username</label>
					<input type="text" name="username" placeholder="masukan username anda" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">password</label>
					<input type="password" name="password" placeholder="masukan password anda" class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>

			</form><small>tidak punya akun?<a href="add_admin.php">Tambah admin</a></small>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>