<?php
require_once("../koneksi.php");
session_start();
$username = $_SESSION['user'];
$id = $_GET['id'];

$sql_cari = "SELECT * FROM produk WHERE id = '$id'";
$query = mysqli_query($koneksi, $sql_cari);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $produk = $_POST['produk'];
    $supplier = $_POST['supplier'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $sql_edit = "UPDATE produk SET id = '$id', nama_produk = '$produk', supplier = '$supplier', stok = '$stok',harga = '$harga' WHERE id = '$id'";
    mysqli_query($koneksi, $sql_edit);

    header("Location:admin.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="../css/css3.css">
    <link rel="icon" type="image/ico" href="../img/bee2.png" />
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
            <h1>Update Produk</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <label for="">ID</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id" value="<?= $result['id']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-3">
                        <label for="">Produk</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="produk" name="produk" value="<?= $result['nama_produk']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-3">
                        <label for="">Supplier</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="supplier" value="<?= $result['supplier']; ?>">
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-3">
                        <label for="">Stok</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="stok" value="<?= $result['stok']; ?>">
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-sm-3">
                        <label for="">Harga</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="harga" value="<?= $result['harga']; ?>">
                    </div>
                </div>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </center>
</body>

</html>