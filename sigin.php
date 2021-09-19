<?php
session_start();
include('function.php');
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    header("Location:index.php");
}

if (isset($_POST['sigin'])) {
    $emailAddress = $_POST['emailAddress'];
    $loginPassword = md5($_POST['loginPassword']);
    $check = "SELECT * FROM users WHERE email = '$emailAddress' AND password = '$loginPassword' AND active = :active AND permission=:permission";
    $count = $conn->prepare($check);
    $count->execute(array(
        'permission' => 0,
        'active' => 1
    ));
    $check_admin = "SELECT * FROM users WHERE email = '$emailAddress' AND password = '$loginPassword' AND permission= :permission AND active = :active ";
    $cout_admin = $conn->prepare($check_admin);
    $cout_admin->execute(array(
        ':permission' => 1,
        ':active' => 1
    ));
    if ($cout_admin->rowCount() > 0) {
        $_SESSION['admin'] = $emailAddress;
        header("Location:admin/index.php");
    } elseif ($count->rowCount() > 0) {
        $_SESSION['user'] = $emailAddress;
        header("Location:index.php");
    } else {
        $error = "Email hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 01:30:49 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="public/images/lotv.jpg" rel="icon" />
    <title> Login || TV Shop</title>


    <!-- Web Fonts
    ========================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ========================= -->
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/oxyy/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/oxyy/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/oxyy/css/stylesheet.css" />
    <!-- Colors Css -->
    <link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>

<body>
    <div id="main-wrapper" class="oxyy-login-register bg-dark">
        <div class="container">
            <div class="row no-gutters min-vh-100 py-5">
                <!-- Welcome Text
            ========================= -->
                <div class="col-lg-7 shadow-lg">
                    <div class="hero-wrap d-flex align-items-center rounded-lg rounded-right-0 h-100">
                        <div class="hero-mask opacity-9 bg-primary"></div>
                        <div class="hero-bg hero-bg-scroll" style="background-image:url('http://demo.harnishdesign.net/html/oxyy/images/login-bg.jpg');"></div>
                        <div class="hero-content mx-auto w-100 h-100 d-flex flex-column" style="background-color: #f95454 !important;">
                            <div class="row no-gutters">
                                <div class="col-10 col-lg-10 mx-auto">

                                </div>
                            </div>
                            <div class="row no-gutters my-auto">
                                <div class="col-10 col-lg-10 mx-auto">
                                    <h1 class="text-11 text-white mb-3">Chào mừng bạn đến với <a href="index.php">TV Shop</a>!</h1>
                                    <p class="text-5 text-white line-height-4 mb-4">Đăng nhập để mua hàng</p>
                                    <a class="btn btn-dark rounded-pill shadow-none video-btn py-1 px-3 d-inline-flex align-items-center mb-5" href="index.php"><span class="mr-2 text-7"></span>TV Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Text End -->

                <!-- Login Form
            ========================= -->
                <div class="col-lg-5 shadow-lg d-flex align-items-center rounded-lg rounded-left-0 bg-dark" style="background-color: white !important">
                    <div class="container my-auto py-5">
                        <div class="row">
                            <div class="col-11 col-lg-10 mx-auto">
                                <h3 class="text-black text-center mb-4">Đăng Nhập</h3>
                                <?php
                                if (isset($error)) { ?>
                                    <p class="alert alert-primary"><?= $error ?></p>
                                <?php

                                }
                                ?>
                                <form id="loginForm" class="form-dark" method="post">
                                    <div class="form-group">
                                        <label class="text-black" for="emailAddress">Địa chỉ Email</label>
                                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" required placeholder="Nhập Email" style="color:black; background-color: white !important;">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="loginPassword">Mật Khẩu</label>
                                        <input type="password" class="form-control" id="loginPassword" name="loginPassword"" required placeholder=" Nhập Password" style="color:black; background-color: white !important;">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm text-2 text-right"><a class="btn-link" href="forgot.php">Quên mật khẩu ?</a></div>
                                    </div>
                                    <button class="btn btn-primary btn-block my-4" type="submit" name="sigin" style="background-color: #fa2323 !important;">Đăng Nhập</button>
                                </form>

                                <p class="text-2 text-center text-black mb-0">Bạn chưa có tài khoản? <a class="btn-link" href="sigup.php">Đăng Ký</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Login Form End -->
            </div>
        </div>
    </div>

    <!-- Video Modal
========================= -->
    <!-- Video Modal end -->

    <!-- Styles Switcher -->
    <!-- Styles Switcher End -->

    <!-- Script -->
    <script src="http://demo.harnishdesign.net/html/oxyy/vendor/jquery/jquery.min.js"></script>
    <script src="http://demo.harnishdesign.net/html/oxyy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Style Switcher -->
    <script src="http://demo.harnishdesign.net/html/oxyy/js/switcher.min.js"></script>
    <script src="http://demo.harnishdesign.net/html/oxyy/js/theme.js"></script>
</body>

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 01:30:49 GMT -->

</html>