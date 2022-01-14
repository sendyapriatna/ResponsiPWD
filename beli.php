<?php
require_once("koneksi.php");
session_start();
$username = $_SESSION['user'];

$id = $_GET['id'];
$sql_cari = "SELECT * FROM produk WHERE id = '$id'";
$query = mysqli_query($koneksi, $sql_cari);
$result = mysqli_fetch_assoc($query);
$harga = $result['harga'];

$total = 1;

if (isset($_POST['submit'])) {
    if (empty($_POST['jumlah'])) {
        $total = 1;
    } else {
        $total = $_POST['jumlah'];
        $jumlah = $_POST['jumlah'];
        $totalharga = $total * $harga;
        $sql_insert = "INSERT INTO penjualan VALUES('','$username','$id', '$jumlah','$totalharga',NOW())";
        mysqli_query($koneksi, $sql_insert);
    }
    echo "<script>
                alert('Success')
                document.location = 'index.php'
            </script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Beli</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="icon" type="image/ico" href="img/bee2.png" />
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
                <img src="img/bee3.png" alt="" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="logout.php" class="btn btn-outline-primary" onclick="if (confirm('Are you sure??')){return true;}else{event.stopPropagation(); event.preventDefault();};">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="layout row">
        <div class="col-sm-6 justifi-content-center">
            <img class="img" src="img/<?php echo $result['foto']; ?>" width="400px" />
            <!-- <img style="width: 450px;" src="img/bee.png" alt=""> -->
        </div>
        <div class="col-sm-6">
            <div class="">
                <h1 class="text-center">Checkout</h1>
                <form method="POST" action="">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <h4 class="tx"> <?php echo $result['nama_produk']; ?></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <h4 class="tx">Stok : <?php echo $result['stok']; ?></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <h4>Harga : Rp.<?php echo $result['harga']; ?></h4>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-4">
                            <h4 class="tx2">Jumlah :</h4>
                        </div>
                        <div class="col-7">
                            <input type="number" class="form-control" name="jumlah" placeholder="1" id="jumlah">
                            <!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <h4 class="tx2">Total : <?php echo $result['harga'] * $total ?></h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>