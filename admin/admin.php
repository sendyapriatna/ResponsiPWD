<?php

require_once("../koneksi.php");
session_start();
$username = $_SESSION['user'];

$sql = "select * from produk order by id";
$tampil = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    // Menyimpan data produk pada variable berbentuk array

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin</title>
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
                        <li class="nav-item"><a href="../logout.php" class="btn btn-outline-primary" onclick="if (confirm('Are you sure??')){return true;}else{event.stopPropagation(); event.preventDefault();};">Log out</a></li>
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
                        <p class="head">ID</p>
                    </td>
                    <td>
                        <p class="head">Nama Produk</p>
                    </td>
                    <td>
                        <p class="head">Supplier</p>
                    </td>
                    <td>
                        <p class="head">Stok</p>
                    </td>
                    <td>
                        <p class="head">Harga</p>
                    </td>
                    <td>
                        <p class="head">Aksi</p>
                    </td>
                </tr>
                <?php
                while ($r = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <td>
                            <p><?= $r['id'] ?></p>
                        </td>
                        <td>
                            <p><?= $r['nama_produk'] ?></p>
                        </td>
                        <td>
                            <p><?= $r['supplier'] ?></p>
                        </td>
                        <td>
                            <p><?= $r['stok'] ?></p>
                        </td>
                        <td>
                            <p>Rp.<?= $r['harga'] ?></p>
                        </td>
                        <td>
                            <p>
                                <a href="edit.php?id=<?= $r['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="hapus.php?id=<?= $r['id']; ?>" onclick="return confirm('Hapus Data Ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </p>
                        </td>
                    </tr>
            <?php
                }
            } else {
                $response["message"] = "tidak ada data";
                echo json_encode($response);
            }
            ?>
            </table>
            <div class="d-flex justify-content-start">
                <a href="tambah.php" style="margin-right: 5px;" class="btn btn-warning">Tambah Data</a>
                <a href="penjualan.php" style="margin-right: 5px;" class="btn btn-warning">Penjualan</a>
                <a href="../reporting/reporting.php" style="margin-left: 5px;" class="btn btn-primary">Cetak Data</a>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>

    </html>