<?php
require_once("../koneksi.php");
session_start();
$username = $_SESSION['user'];
$sumber = @$_FILES['foto']['tmp_name'];
$target = '../img/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['submit'])) {

    if (!empty($sumber)) {
        $sql_simpan = "INSERT INTO produk (id, nama_produk, supplier, stok, harga, foto) VALUES (
        '" . $_POST['id'] . "',
        '" . $_POST['produk'] . "',
        '" . $_POST['supplier'] . "',
        '" . $_POST['stok'] . "',
        '" . $_POST['harga'] . "',
        '" . $nama_file . "')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
    }
    header("Location:admin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Penjualan Tambah</title>
    <link rel="stylesheet" type="text/css" href="../css/css3.css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light scrolling-navbar fixed-top shadow-sm" style="background: rgba(0,0,0,0.1);
  backdrop-filter: blur(20px);padding-left: 100px;padding-right: 100px;">
        <div class="container-fluid">
            <a class="navbar-brand logo " style="color:  #fff" href="#">
                <img src="../img/bee3.png" alt="" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto nav nav-treeview">
                    <li class="nav-item"><a href=""><?php echo "Hi. " . $_SESSION['user']; ?></a></li>
                    <li class="nav-item"><a href="../logout.php" class="button" onclick="if (confirm('Are you sure??')){return true;}else{event.stopPropagation(); event.preventDefault();};">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <center>
        <div class="layout text-center">
            <img style="width: 200px;" src="../img/bee2.png">
            <h1>Tambah Produk</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="text" class="form-control" name="id" placeholder="ID Produk" id="id">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="text" class="form-control" id="produk" name="produk" placeholder="Nama Produk">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="text" class="form-control" name="supplier" placeholder="Supplier" id="supplier">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="number" class="form-control" name="stok" placeholder="Stok" id="stok">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="number" class="form-control" name="harga" placeholder="Harga" id="harga">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-11">
                        <input type="file" class="form-control" name="foto" placeholder="foto" id="foto">
                    </div>
                </div>
                <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </center>
</body>

</html>