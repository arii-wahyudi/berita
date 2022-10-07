<?php 
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM `supplier` WHERE id_supplier = '$id'");

if ($query) {
	echo "<script>alert('Berhasil Hapus supplier');
	document.location.href = 'supplier.php';
	</script>";
}	

?>