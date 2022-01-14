<?php
// Digunakan untuk mengisi nama host SQL
$host = "localhost";

// Variable untuk menampung username pada SQL
$username = "root";

// Variable untuk menampung password SQL
$password = "";

// Variable untuk mengisi database yang akan dipakai
$databasename = "myproj";

// Kode dibawah digunakan untuk menguhubungkan ke SQL
$con = @mysqli_connect($host, $username, $password, $databasename);

if (!$con) {
    // Kondisi jika parameter di atas tidak terpenuhi
    echo "Error: " . mysqli_connect_error();
    exit();
}
header('Content-Type: text/xml');
$query = "SELECT * FROM produk";
$hasil = mysqli_query($con, $query);
$jumField = mysqli_num_fields($hasil);
echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "<produk>";
    echo "<id>", $data['id'], "</id>";
    echo "<nama_produk>", $data['nama_produk'], "</nama_produk>";
    echo "<supplier>", $data['supplier'], "</supplier>";
    echo "<stok>", $data['stok'], "</stok>";
    echo "<harga>", $data['harga'], "</harga>";
    echo "</produk>";
}
echo "</data>";
