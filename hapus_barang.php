<?php 
include 'koneksi.php';
$id = $_GET['id'];
$bas = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id'")->fetch_assoc();
$query = mysqli_query($koneksi,"DELETE FROM `barang` WHERE id_barang = '$id'");

$lah = "assets/img/".$bas['img'];
unlink($lah);
if ($query) {
	echo "<script>alert('Berhasil Hapus Barang');
	document.location.href = 'barang.php';
	</script>";
}	

?>