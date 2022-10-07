<?php 
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM `wilayah` WHERE id_wilayah = '$id'");
if ($query) {
	echo "<script>alert('Berhasil Hapus kota');
	document.location.href = 'index.php';
	</script>";
}
?>