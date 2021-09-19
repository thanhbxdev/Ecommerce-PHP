<?php
require_once("header.php");
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    foreach (selectDb("SELECT * FROM users WHERE email='$email'") as $row) {
        $name = isset($row["name"]) ? $row['name'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
        $created = isset($row['created_at']) ? $row['created_at'] : '';
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
                                <input type="text" value="<?= $name ?>" id="inputName" class="form-control" placeholder="" name="name" disabled>
                                <label for="inputName" style="color: red;">Tên(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" value="<?= $email ?>" id="inputEmail" class="form-control" placeholder="" name="email" disabled>
                                <label for="inputEmail" style="color: red;">Email(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="number" value="<?= $phone ?>" id="inputPhone" class="form-control" placeholder="" name="phone" disabled>
                                <label for="inputPhone" style="color: red;">Phone(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" value="<?= $address ?>" id="inputAdd" class="form-control" placeholder="" name="add" disabled>
                                <label for="inputAdd" style="color: red;">Địa chỉ(*)</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" value="<?= $created ?>" id="inputPhone" class="form-control" placeholder="" name="cre" disabled>
                                <label for="inputCre" style="color: red;">Ngày tạo tài khoản*</label>
                            </div>
                            <a name="" id="" class="btn btn-lg btn-primary btn-block text-uppercase" href="editPass.php?email=<?= $email ?>" role="button">Đổi Mật Khẩu</a>
                            <?php
                            if (isset($_SESSION['user'])) {
                            ?>
                                <a name="" id="" class="btn btn-danger btn-block text-uppercase" href="oderUser.php?email=<?= $email ?>" role="button">Đơn Hàng Của Bạn</a>
                            <?php
                            }
                            ?>
                            <a name="" id="" class="btn btn-primary btn-block text-uppercase" href="index.php" role="button">Quay Lại</a>
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