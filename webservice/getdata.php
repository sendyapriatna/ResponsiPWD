<?php
require_once "../koneksi.php";
$sql = "SELECT penjualan.id_jual, penjualan.nama, penjualan.id, produk.nama_produk, penjualan.jumlah, penjualan.log FROM produk JOIN penjualan ON produk.id = penjualan.id";
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
header('content-type: application/json');
echo json_encode($data);
mysqli_close($koneksi);
