<?php
session_start();

include "koneksi.php";

if (isset($_POST['submit'])) {
    $username       = $_POST['username'];                               //Menyimpan data input user
    $password       = md5($_POST['password']);                               //Menyimpan data input password

    //Query untuk melakukan pengecekan apakah input sesuai dengan data dalam database
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data = mysqli_num_rows($cek);

    //Pengecekan catpcha
    if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
        if (empty($username) && empty($password)) {
            echo "<script>
                alert('Username and Password Empty!')
                document.location = 'login.php'
            </script>";
        } elseif ($data > 0) {
            $_SESSION['user'] = $username;
            header("location: index.php");

            die();
        } elseif ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
            $_SESSION['user'] = $username;
            header("location: admin/admin.php");
        } else {
            echo "<script>
                alert('Username or Password Incorect!!!')
                document.location = 'login.php'
            </script>";
        }
    } else {
        echo "<script>
			alert('Captcha Incorect!!!')
			document.location = 'login.php'
		</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="icon" type="image/ico" href="img/bee2.png" />
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
                <h1>Hello!</h1>
                <h6>Sign into your account</h6>
                <form method="POST" action="">

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="username" placeholder="Username">
                            <svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                            <!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
                            <svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
                                <path d=" M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <img style="margin: 21px 0 0 0 ;" src='security/captcha.php' />
                        </div>
                        <div class="col-8">
                            <input style="padding-left: 10px" class="form-control" name='captcha_code' type='text' placeholder="Captcha">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="">LOGIN</button>
                </form>

                <p>forgot password? <a href="reset_password.php">Reset</a></p>
                <p>don't have an account? <a href="register.php">Sign up</a></p>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>