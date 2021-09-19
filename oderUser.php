<?php
require_once("header.php");
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    foreach (selectDb("SELECT * FROM users WHERE email = '$email'") as $row) {
        $id = $row['id'];
    }
    $tong = total("SELECT COUNT(*) FROM oder WHERE id_user ='$id'");
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
                        <h5 class="card-title text-center">TẤT CẢ ĐƠN HÀNG(<?=$tong?>)</h5>
                        <?php if (isset($error)) { ?>
                            <p class="alert alert-primary"><?= $error ?></p>
                        <?php
                        } else {
                        } ?>
                        <form class="form-signin" method="POST">
                            <?php
                            $stt=0;
                            foreach (selectDb("SELECT * FROM oder WHERE id_user=$id") as $tow) {
                            ?>
                                <small>Đơn Hàng <?=$stt+=1?></small>
                                <div class="form-label-group">
                                    <input type="text" value="DH<?= $tow['id'] ?>" id="inputName" class="form-control" placeholder="" name="name" disabled>
                                    <label for="inputName" style="color: red;">Mã Đơn Hàng(*)</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" value="<?= $tow['time_oder'] ?>" id="inputEmail" class="form-control" placeholder="" name="email" disabled>
                                    <label for="inputEmail" style="color: red;">Ngày Đặt(*)</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" value="<?= $tow['satatus'] == 0 ? 'Đang Giao' : 'Thành Công' ?>" id="inputPhone" class="form-control" placeholder="" name="phone" disabled>
                                    <label for="inputPhone" style="color: red;">Trạng Thái(*)</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" value="<?= number_format($tow['total']) ?>" id="inputAdd" class="form-control" placeholder="" name="add" disabled>
                                    <label for="inputAdd" style="color: red;">Tổng Tiền(*)</label>
                                </div>
                                <hr class="my-4">
                            <?php
                            }
                            ?>
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