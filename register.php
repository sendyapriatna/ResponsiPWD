<?php
//Koneksi ke database
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = strtolower($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Validasi username
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
    $data = mysqli_num_rows($result);

    if ($data > 0) {
        echo "<script>
        alert('Username already registered!')
        document.location = 'register.php'
            </script>";
        return false;
    }

    $result2 = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
    $data2 = mysqli_num_rows($result2);

    if ($data2 > 0) {
        echo "<script>
        alert('Email already registered!')
        document.location = 'register.php'
            </script>";
        return false;
    }

    // Cek kondisi password jika kurang dari 6 karakter
    if (strlen($password) < 6) {
        echo "<script>
            alert('Your password Must Contain At Least 6 Characters')
            document.location = 'register.php'
        </script>";
        return false;
    } else {

        $password = md5($password);
        // password harus terdiri dari 1 angka dan 1 huruf kapital
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            echo "<script>
                alert('Your Password Must Contain At Least 1 Number or capital letter!')
                document.location = 'register.php'
            </script>";
        } else {
            // kondisi memenuhi
            $sql_insert = "INSERT INTO users VALUES('','$username','$email', '$password','$phone')";
            mysqli_query($koneksi, $sql_insert);
            echo "<script>
                alert('Account has been created!')
                document.location = 'login.php'
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="icon" type="image/ico" href="../img/bee2.png" />
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
                <h1 style="margin-top: 25px;">Join with us!</h1>
                <h6>Create your account</h6>
                <form method="post" action="register.php">

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="username">
                            <svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                            <svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
                                <path d=" M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
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
                        <div class="col-11">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone">
                            <svg class="field-icon" viewBox="0 0 20 20" width="16" height="16">
                                <path d=" M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
                            </svg>
                        </div>
                </form>

                <button type="submit" name="submit" class="" style="margin-bottom: 20px;">REGISTER</button>
                <p class="ex">Already have a account? <a href="login.php">Sign in</a></p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>