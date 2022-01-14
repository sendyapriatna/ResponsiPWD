<?php
require_once("../koneksi.php");

$id = $_GET['id'];
// $id_jual = $_GET['id_jual'];

$sql_delete = "DELETE FROM produk WHERE id = '$id'";
mysqli_query($koneksi, $sql_delete);

// $sql_delete2 = "DELETE FROM penjualan WHERE id_jual = '$id_jual'";
// mysqli_query($koneksi, $sql_delete2);

header("Location:admin.php");
