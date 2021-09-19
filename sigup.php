<?php
include_once("function.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");
if (isset($_POST['addUser'])) {
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $emailAddress = $_POST['emailAddress'];
    $Password = md5($_POST['Password']);
    $crated_at = date("Y/m/d h:i:sa");
    $permission = 0; //user
    $active = 1; //dang hoat dong
    $check_email = "SELECT * FROM users WHERE email = '$emailAddress'";
    $check_phone = "SELECT * FROM users WHERE phone = '$phone'";
    $cout_mail = $conn->prepare($check_email);
    $cout_mail->execute();
    $cout_phone = $conn->prepare($check_phone);
    $cout_phone->execute();
    if ($cout_mail->rowCount() > 0) {
        $error = "Email này đã có người sử dụng. Vui lòng chọn Email khác! ";
    } elseif ($cout_phone->rowCount() > 0) {
        $error = "Số điện thoại này đã có người sử dụng. Vui lòng chọn Số khác khác! ";
    } else {
        action("INSERT INTO users (name,email,password,phone,address,Permission,Active,created_at)
             VALUES
              ('$fullName','$emailAddress','$Password','$phone','$address','$permission','$active','$crated_at')");
        $error = "Đăng kí thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 02:07:23 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="public/images/lotv.jpg" rel="icon" />
    <title>TV Shop || Register</title>
    <meta name="description" content="Login and Register Form Html Template">
    <meta name="author" content="harnishdesign.net">

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

    <!-- Preloader -->

    <!-- Preloader End -->

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
                                    <h1 class="text-11 text-white mb-3">Bạn là thành viên mới <a href="index.php">TV Shop</a>!</h1>
                                    <p class="text-5 text-white line-height-4 mb-4">Đăng kí bằng email và thông tin cá nhân của bạn để bắt đầu!</p>
                                    <a class="btn btn-dark rounded-pill shadow-none video-btn py-1 px-3 d-inline-flex align-items-center mb-5" href="index.php"><span class="mr-2 text-7"></span>TV Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Text End -->

                <!-- Register Form
            ========================= -->
                <div class="col-lg-5 shadow-lg d-flex align-items-center rounded-lg rounded-left-0 bg-dark" style="background-color: white !important">
                    <div class="container my-auto py-5">
                        <div class="row">
                            <div class="col-11 col-lg-10 mx-auto">
                                <h3 class="text-black text-center mb-4">Đăng Ký</h3>
                                <?php
                                if (isset($error)) { ?>
                                    <p class="alert alert-primary"><?= $error ?></p>
                                <?php

                                }
                                ?>
                                <form id="registerForm" class="form-dark" method="post">
                                    <div class="form-group">
                                        <label class="text-black" for="fullName">Họ Và Tên</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" required placeholder="Nhập tên của bạn" style="color:black; background-color: white">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="phone">Số điện thoại</label>
                                        <input type="number" class="form-control" id="phone" name="phone" required placeholder="Nhập số điện thoại của bạn" style="color:black; background-color: white">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="address">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" name="address" required placeholder="Nhập Địa Chỉ" style="color:black; background-color: white">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="emailAddress">Địa chỉ Email</label>
                                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" required placeholder="Nhập Email" style="color:black; background-color: white">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="Password">Mật Khẩu</label>
                                        <input type="password" class="form-control" id="Password" name="Password" required placeholder="Nhập Mật Khẩu" style="color:black; background-color: white">
                                    </div>
                                    <button class="btn btn-primary btn-block my-4" type="submit" style="background-color: #fa2323 !important;" name="addUser">Đăng Ký</button>
                                </form>
                                <p class="text-2 text-center text-black">Bạn chưa có tài khoản? <a class="btn-link" href="sigin.php">Đăng nhập</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register Form End -->
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="http://demo.harnishdesign.net/html/oxyy/vendor/jquery/jquery.min.js"></script>
    <script src="http://demo.harnishdesign.net/html/oxyy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Style Switcher -->
    <script src="http://demo.harnishdesign.net/html/oxyy/js/switcher.min.js"></script>
    <script src="http://demo.harnishdesign.net/html/oxyy/js/theme.js"></script>
</body>

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 02:07:23 GMT -->

</html>