<?php

session_start();
$_SESSION['user'];
$url = "http://localhost/responsiPWD/webservice/getdata.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../css/css4.css">
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

    <div class="text-center">
        <img style="width: 200px;" src="../img/bee2.png">
        <h1>Daftar Produk</h1>
        <table class="table table-bordered border-dark">
            <tr style="background-color: #01252a;">
                <td>
                    <p class="head">ID Jual</p>
                </td>
                <td>
                    <p class="head">Pembeli</p>
                </td>
                <td>
                    <p class="head">ID Produk</p>
                </td>
                <td>
                    <p class="head">Nama Produk</p>
                </td>
                <td>
                    <p class="head">Jumlah Beli</p>
                </td>
                <td>
                    <p class="head">Log</p>
                </td>
                <td>
                    <p class="head">Aksi</p>
                </td>
            </tr>

            <?php
            foreach ($result as $r) :
            ?>
                <tr>
                    <td>
                        <p><?php echo $r->id_jual ?></p>
                    </td>
                    <td>
                        <p><?php echo $r->nama ?></p>
                    </td>
                    <td>
                        <p><?php echo $r->id ?></p>
                    </td>
                    <td>
                        <p><?php echo $r->nama_produk ?></p>
                    </td>
                    <td>
                        <p><?php echo $r->jumlah ?></p>
                    </td>
                    <td>
                        <p><?php echo $r->log ?></p>
                    </td>
                    <td>
                        <p>
                            <a href="hapus.php?id=<?php echo $r->id; ?>" onclick="return confirm('Hapus Data Ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </p>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="d-flex justify-content-start">
            <a href="admin.php" style="margin-right: 5px;" class="btn btn-warning">Kembali</a>
            <a href="../reporting/reporting.php" style="margin-left: 5px;" class="btn btn-primary">Cetak Data</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>