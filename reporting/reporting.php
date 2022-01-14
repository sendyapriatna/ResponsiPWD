<?php
// memanggil library FPDF
require('FPDF/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'LAPORAN DATA PRODUK', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'ID', 1, 0);
$pdf->Cell(30, 6, 'NAMA PRODUK', 1, 0);
$pdf->Cell(35, 6, 'SUPPLIER', 1, 0);
$pdf->Cell(20, 6, 'STOK', 1, 0);
$pdf->Cell(20, 6, 'HARGA', 1, 1);
$pdf->SetFont('Arial', '', 10);
// Koneksi ke database 
include '../koneksi.php';
// Query untuk menampilkan seluruh data pada tabel mahasiswa
$barang = mysqli_query($koneksi, "select * from produk");
while ($row = mysqli_fetch_array($barang)) {
    $pdf->Cell(20, 6, $row['id'], 1, 0);
    $pdf->Cell(30, 6, $row['nama_produk'], 1, 0);
    $pdf->Cell(35, 6, $row['supplier'], 1, 0);
    $pdf->Cell(20, 6, $row['stok'], 1, 0);
    $pdf->Cell(20, 6, $row['harga'], 1, 1);
}

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, '', 0, 1, 'C');
$pdf->Cell(190, 7, '', 0, 1, 'C');
$pdf->Cell(190, 7, 'LAPORAN DATA PENJUALAN', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'ID JUAL', 1, 0);
$pdf->Cell(30, 6, 'PEMBELI', 1, 0);
$pdf->Cell(25, 6, 'ID PRODUK', 1, 0);
$pdf->Cell(35, 6, 'NAMA PRODUK', 1, 0);
$pdf->Cell(20, 6, 'JUMLAH', 1, 0);
$pdf->Cell(45, 6, 'LOG', 1, 1);
$pdf->SetFont('Arial', '', 10);
// Koneksi ke database 
include '../koneksi.php';
// Query untuk menampilkan seluruh data pada tabel mahasiswa
$penjualan = mysqli_query($koneksi, "SELECT penjualan.id_jual, penjualan.nama, penjualan.id, produk.nama_produk, penjualan.jumlah, penjualan.log FROM produk JOIN penjualan ON produk.id = penjualan.id");
while ($row = mysqli_fetch_array($penjualan)) {
    $pdf->Cell(20, 6, $row['id_jual'], 1, 0);
    $pdf->Cell(30, 6, $row['nama'], 1, 0);
    $pdf->Cell(25, 6, $row['id'], 1, 0);
    $pdf->Cell(35, 6, $row['nama_produk'], 1, 0);
    $pdf->Cell(20, 6, $row['jumlah'], 1, 0);
    $pdf->Cell(45, 6, $row['log'], 1, 1);
}
$pdf->Output();
$pdf->Output();
