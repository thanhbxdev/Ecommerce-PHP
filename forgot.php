<?php
require_once './commons/db.php';
require_once './commons/helpers.php';
require_once './commons/send-mail.php';

function forgotPassword($email) {
    $sql = "SELECT * from `users` where `email` = '$email'";
    $check_user_exist = executeQuery($sql);
    if ($check_user_exist) {
        $token = md5('reset-password').uniqid();
        $content = 'Vui lòng truy cập link sau để lấy lại mật khẩu: <a href="'.BASE_URL.'reset-password.php?token='.$token.'">reset password</a>';
        sendMail($email, 'Quên mật khẩu TV Shop', $content, $check_user_exist['name']);

        // Lưu 1 record vào DB
        $now = date("Y-m-d H:i:s");
        $sqlInsert = "INSERT INTO `password_resets`(`email`, `token`, `created_at`) VALUES ('$email','$token','$now')";
        executeQuery($sqlInsert);
        $result = ['status' => true, 'message' => 'Đã gửi mail'];
    } else {
        $result = ['status' => false, 'message' => 'Không tìm thấy tài khoản'];
    }
    return $result;
}

if (isset($_POST['send_mail'])) {
    $result = forgotPassword($_POST['email']);
    echo "<script>alert('".$result['message']. "')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/forgot-password-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 02:08:02 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="public/images/lotv.jpg" rel="icon" />
    <title>TV Shop || Forgot Password</title>
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
<div class="preloader preloader-dark">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register bg-dark">
    <div class="container">
        <div class="row no-gutters min-vh-100 py-5">
            <!-- Welcome Text
            ========================= -->
            <div class="col-lg-7 shadow-lg">
                <div class="hero-wrap d-flex align-items-center rounded-lg rounded-right-0 h-100" >
                    <div class="hero-mask opacity-9 bg-primary"></div>
                    <div class="hero-bg hero-bg-scroll" style="background-image:url('http://demo.harnishdesign.net/html/oxyy/images/login-bg.jpg');"></div>
                    <div class="hero-content mx-auto w-100 h-100 d-flex flex-column" style="background-color: #f95454 !important;">
                        <div class="row no-gutters">
                            <div class="col-10 col-lg-10 mx-auto">
                            </div>
                        </div>
                        <div class="row no-gutters my-auto">
                            <div class="col-10 col-lg-10 mx-auto">
                                <h1 class="text-11 text-white mb-3">Chào mừng trở lại <a href="index.php">TV Shop</a>!</h1>
                                <p class="text-5 text-white line-height-4 mb-4">Nhận quyền truy cập vào Đơn đặt hàng, Danh sách yêu thích và Đề xuất của bạn.</p>
                                <a class="btn btn-dark rounded-pill shadow-none video-btn py-1 px-3 d-inline-flex align-items-center mb-5" href="index.php" ><span class="mr-2 text-7"></span>TV Shop</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Welcome Text End -->

            <!-- Forgot password Form
            ========================= -->
            <div class="col-lg-5 shadow-lg d-flex align-items-center rounded-lg rounded-left-0 bg-dark" style="background-color: white !important;">
                <div class="container my-auto py-5">
                    <div class="row">
                        <div class="col-11 col-lg-10 mx-auto">
                            <h3 class="text-black text-center mb-4">Quên mật khẩu?</h3>
                            <p class="text-muted text-center mb-4">Nhập địa chỉ email hoặc số điện thoại di động bạn đã sử dụng khi tham gia và chúng tôi sẽ gửi cho bạn mật khẩu tạm thời..</p>
                            <form id="forgotForm" class="form-dark" action="forgot.php" method="post">
                                <div class="form-group">
                                    <label class="text-black" for="emailAddress">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailAddress" required placeholder="Nhập Email" style="color:black; background-color: white">
                                </div>
                                <button class="btn btn-primary btn-block my-4" name="send_mail" value="submit" type="submit" style="background-color: #fa2323 !important;">Tiếp tục</button>
                            </form>

                            <p class="text-2 text-center text-black mb-0">Quay về <a class="btn-link" href="sigin.php">Đăng nhập</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Forgot password Form End -->
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

<!-- Mirrored from demo.harnishdesign.net/html/oxyy/forgot-password-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Nov 2020 02:08:02 GMT -->
</html>