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
  <title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="css/css2.css">
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

  <!-- Header -->
  <section>
    <div class=" row">
      <div class="col-sm-4 align-self-center">
        <div class="content">
          <div class="textBox">
            <h2>Real Honey</h2>
            <p>Kami menjual berbagai produk madu terbaik dan 100% asli dari seluruh daerah di Indonesia. Dengan bebrapa produk unggulan kami berharap bisa memenuhi kebutuhan pelanggan</p>
          </div>
        </div>
        <button class="getstart">More</button>
        <ul class="icon">
          <li><a href="https://www.facebook.com/sendyapriatna10/"><img src="img/facebook.png"></a></li>
          <li><a href="#"><img src="img/twitter.png"></a></li>
          <li><a href="https://www.instagram.com/sndy.prtn/"><img src="img/instagram.png"></a></li>
        </ul>
      </div>
      <div class="col-sm-2 align-self-end">
      </div>
      <div class="col-sm-6 align-self-center">
        <img class="img-fluid" src="img/honey.png" width="80%">
      </div>
    </div>
  </section>

  <!-- End Header -->

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

  <!-- Service -->
  <section class="services">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h2>Services</h2>
        </div>
      </div>
      <div class="row text-center justify-content-center">
        <div class="col-sm-4 box">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
          </svg>
          <h6>Quick Order</h6>
          <p>Quick order can be used by costumers whoa re logged in to their accounts.</p>
        </div>
        <div class="col-sm-4 box">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
            <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
          </svg>
          <h6>24x7 Support</h6>
          <p>You can ask anything or if you want a consultation regarding the product you are going to make.</p>
        </div>
      </div>
      <div class="row text-center justify-content-center">
        <div class="col-sm-4 box">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
          </svg>
          <h6>Best Price</h6>
          <p>We serve Best Price with any benerfits.</p>
        </div>
        <div class="col-sm-4 box">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
          </svg>
          <h6>Easy to Use</h6>
          <p>Make your product easy to use by anyone and easy to maintain.</p>
        </div>
      </div>
      <div class="row text-center justify-content-center">
        <div class="col-sm-4 box">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
            <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
          </svg>
          <h6>Fast Delivery</h6>
          <p>Fast delivery lets seller offer buyers a much faster delivery.</p>
        </div>
      </div>
    </div>

  </section>
  <!-- End Service -->

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