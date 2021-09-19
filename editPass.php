<?php
require_once("header.php");
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    if (isset($_POST['updatePass'])) {
        $pass = md5($_POST['pass']);
        $passnew = md5($_POST['passnew']);
        $passconfirm = md5($_POST['passconfirm']);
        if ($passnew != $passconfirm) {
            $error = "Nhập lại mật khẩu chưa chính xác!";
        } else {
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
            $check = $conn->prepare($sql);
            $check->execute();
            if ($check->rowCount() > 0) {
                action("UPDATE users SET password = '$passnew'");
                $error = "Đổi mật khẩu thành công!";
            } else {
                $error = "Mật khẩu sai vui lòng thử lại!";
            }
        }
    }
} else {
    header("Location:index.php");
}
?>

<link rel="stylesheet" href="public/css/signin.css">

<body>
    <div class="container-fluid" style="background-color: #eff1f5;">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Thông tin tài khoản</h5>
                        <?php if (isset($error)) { ?>
                            <p class="alert alert-primary"><?= $error ?></p>
                        <?php
                        } else {
                        } ?>
                        <form class="form-signin" method="POST">
                            <div class="form-label-group">
                                <input type="password" value="" id="inputName" class="form-control" placeholder="" name="pass" required>
                                <label for="inputName" style="color: red;">Mật Khẩu Cũ(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" value="" id="inputEmail" class="form-control" placeholder="" name="passnew" required>
                                <label for="inputEmail" style="color: red;">Mật Khẩu Mới(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" value="" id="inputPhone" class="form-control" placeholder="" name="passconfirm" required>
                                <label for="inputPhone" style="color: red;">Nhập Lại Mật Khẩu(*)</label>
                            </div>
                            <button type="submit" name="updatePass" id="" class="btn btn-primary btn-block text-uppercase" btn-lg btn-block">Cập Nhật</button>
                            <a name="" id="" class="btn btn-primary btn-block text-uppercase" href="profile.php?email=<?= $email ?>" role="button">Quay Lại</a>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once("footer.php");
?>