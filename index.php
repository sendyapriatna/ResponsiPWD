<?php
require_once("koneksi.php");
session_start();
if ($_SESSION['user']) {
  $username = $_SESSION['user'];
} else {
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Index</title>
  <link rel="stylesheet" type="text/css" href="css/css2.css">
  <link rel="icon" type="image/ico" href="../img/bee2.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="icon" type="image/ico" href="img/favicon.ico" />
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
          <li class="nav-item"><a href=""><?php echo "Hi. " . $_SESSION['user']; ?></a></li>
          <li>
            <form class="d-flex" action="" method="POST">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
              <button class="btn btn-outline-primary" type="submit" name="submit">Search</button>
            </form>
          </li>
          <li class="nav-item"><a href="logout.php" class="btn btn-outline-primary" onclick="if (confirm('Are you sure??')){return true;}else{event.stopPropagation(); event.preventDefault();};">Log out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Content -->
  <section class="more">
    <div class="container">
      <div class="row justify-content-around text-center">
        <h2>Product</h2>
        <tBody>
          <?php
          if (isset($_POST['submit'])) {
            $cari     = $_POST['cari'];
            $sql = $koneksi->query("select * from produk where nama_produk like'%" . $cari . "%'");
            while ($data = $sql->fetch_assoc()) {
          ?>
              <div class="col-md-3 card">
                <div class="">
                  <div class="card-body text-center">
                    <img class="card-img-top" src="img/<?php echo $data['foto']; ?>" height="235px" />
                    <h3 class="text-center">
                      <?php echo $data['nama_produk']; ?>
                    </h3>
                    <h3 class="text-center">
                      Rp. <?php echo $data['harga']; ?>
                    </h3>
                    <center>
                      <a href="beli.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-m">
                        <i class="fa fa-file"></i>Beli
                      </a>

                    </center>
                  </div>
                </div>
              </div>
            <?php
            }
          } else {
            $sql = $koneksi->query("select * from produk");
            while ($data = $sql->fetch_assoc()) {
            ?>
              <!-- Profile Image -->

              <div class="col-md-3 card">
                <div class="">
                  <div class="card-body text-center">
                    <img class="card-img-top" src="img/<?php echo $data['foto']; ?>" height="235px" />
                    <h3 class="text-center">
                      <?php echo $data['nama_produk']; ?>
                    </h3>
                    <h3 class="text-center">
                      Rp. <?php echo $data['harga']; ?>
                    </h3>
                    <center>
                      <a href="beli.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-m">
                        <i class="fa fa-file"></i>Beli
                      </a>

                    </center>
                  </div>
                </div>
              </div>

              <!-- /.card -->
          <?php
            }
          }

          ?>
        </tBody>

      </div>
    </div>
  </section>
  <!-- End Content -->

  <footer class="footer">
    <div class="row text-white">
      <div class="col-sm-12 text-center">
        <p>- &copy; Copyright 2021. Web by Sendy Apriatna -</p>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>