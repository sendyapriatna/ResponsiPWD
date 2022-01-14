<?php
//Koneksi ke database
include "koneksi.php";

if (isset($_POST['submit'])) {
	$email       = $_POST['email'];                             //Menyimpan data input user
	$password    = md5($_POST['password']);                       //Menyimpan data input pass

	// Cek kondisi password jika kurang dari 6 karakter
	if (strlen($password) < 6) {

		echo	"<script>
			alert('Your password Must Contain At Least 6 Characters')
			document.location = 'register.php'
		</script>";
	} else {

		// password harus terdiri dari 1 angka dan 1 huruf kapital
		if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
			echo "<script>
				alert('Your Password Must Contain At Least 1 Number or capital letter!')
				document.location = 'reset_password.php'
			</script>";
		} else {

			// kondisi memenuhi
			$sql_insert = "UPDATE users SET password='$password' WHERE email='$email'";
			mysqli_query($koneksi, $sql_insert);
			echo "<script>
				alert('Reset Password Done!')
				document.location = 'login.php'
			</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="icon" type="image/ico" href="img/favicon.ico" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
	<div class="layout row">
		<div class="col-sm-6">
			<img style="width: 450px;" src="img/bee.png" alt="">
		</div>
		<div class="col-sm-6">
			<div class="text-center">
				<h1>Carefull!</h1>
				<h6>Reset your password</h6>
				<form method="POST" action="">

					<div class="row justify-content-center">
						<div class="col-11">
							<input type="email" class="form-control" id="exampleInputEmail1" required="required" name="email" placeholder="Email">
							<svg class="field-icon" viewBox="0 0 20 20" width="16" height="16"">
							<path d=" M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
							</svg>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-11">
							<input type="password" class="form-control" name="password" placeholder="New Password" id="password">
							<!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
							<svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
								<path d=" M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
							</svg>
						</div>
					</div>
					<button type="submit" name="submit" class="">RESET</button>
				</form>

				<p><a href="login.php">Cancel</a></p>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>