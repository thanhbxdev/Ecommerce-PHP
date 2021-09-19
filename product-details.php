<?php
require_once("header.php");
$view = 1;
if (isset($_GET['id']) && isset($_GET['cate'])) {
    $id = $_GET['id'];
    $cate = $_GET['cate'];
    foreach (selectDb("SELECT * FROM products WHERE id = '$id'") as $row) {
        $id_pro  = $row['id'];
        $view += $row['views'];
        action("UPDATE products SET views='$view' WHERE id = '$id'");
    }
}
// End Up View
if (isset($_GET['id']) && $_GET['cate']) {
    $id = $_GET['id'];
    $cate = $_GET['cate'];
    foreach (selectDb("SELECT * FROM categories WHERE id =$cate") as $row) {
    }
    foreach (selectDb("SELECT * FROM products WHERE id =$id") as $tow) {
    }
}
if (isset($_GET['id_conment'])) {
    $id_cmt = $_GET['id_conment'];
    action("DELETE FROM comments WHERE id = '$id_cmt'");
}
if (isset($_SESSION['user']) && isset($_POST['addConment'])) {
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = date("Y/m/d h:i:sa");
    $user = $_SESSION['user'];
    $content = $_POST['conmentProduct'];
    foreach (selectDb("SELECT * FROM users WHERE email = '$user'") as $row) {
        $id_user = $row['id'];
    }
    action("INSERT INTO comments (content,user_id,product_id,created_at) VALUES ('$content','$id_user','$id','$date')");
} elseif (isset($_SESSION['admin']) && isset($_POST['addConment'])) {
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = date("Y/m/d h:i:sa");
    $user = $_SESSION['admin'];
    $content = $_POST['conmentProduct'];
    foreach (selectDb("SELECT * FROM users WHERE email = '$user'") as $row) {
        $id_user = $row['id'];
    }
    action("INSERT INTO comments (content,user_id,product_id,created_at) VALUES ('$content','$id_user','$id','$date')");
} elseif (!isset($_SESSION['user']) && isset($_POST['addConment'])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
} elseif (!isset($_SESSION['user'])&&!isset($_SESSION['admin']) && isset($_POST['oder'])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi thêm giỏ hàng!')</script>";
} elseif (isset($_SESSION['admin']) && isset($_POST['oder'])) {
    echo "<script>alert('ADMIN không mua hàng được đâu :v!')</script>";
}
?>

<body>
    <div class="container-fluid" style="padding: 15px 5%; background-color: #eff1f5; margin: 0px;">
        <div class="row" id="nav-text">
            <div class="col-md-12">
                <a href="index.php" style="text-decoration: none;">Trang chủ</a> / <a href="productall.php?id=<?= $row['id'] ?>" style="color: black; text-decoration: none;">
                    <?= $row['name'] ?>
                </a>/ <a href="product-details.php?id=<?= $tow['id'] ?>&cate=<?= $row['id'] ?>" style="color: black; text-decoration: none;"><?= $tow['name'] ?></a>
            </div>
        </div>
        <!-- End Text  -->
        <div class="row" style="border-bottom: 2px double red; padding-bottom: 10px;">
            <!-- Col-md-4 IMG  -->
            <div class="col-md-4" style="text-align: center;">
                <img src="public/images/product/<?= $tow['image'] ?>" alt="">
            </div>
            <!-- End Col-md-4 IMG  -->
            <!-- col-md-4-Text  -->
            <div class="col-md-5">
                <div class="card-text">
                    <b style="font-size: 22px;font-family: roboto"><?= $tow['name'] ?></b>
                </div>
                <div class="card-text" style="font-family: roboto">
                    <b>Mô Tả :</b> <?= $tow['description'] ?>
                </div>
                <div class="card-text" style="font-family: roboto">
                    <b>Thông Số Kỹ Thuật :</b> <?= $tow['parameter'] ?>
                </div>
                <div class="card-text" style="font-family: roboto;color: red;">
                    <b>Giá Khuyến Mãi :</b> <?= number_format($tow['price']) ?>đ
                </div>
                <div class="card-text" style="font-family: roboto">
                    <b>Giá Gốc :</b> <strike><?= number_format($tow['origin_price']) ?>đ</strike>
                </div>
                <div class="card-text" style="font-family: roboto">
                    <b>Số Lượng :</b> <?= $tow['total'] ?>
                </div>
                <div class="card-text" style="font-family: roboto">
                    <b>Trạng Thái :</b> <?= $tow['total'] > 0 ? 'Còn Hàng' : 'Hết hàng' ?>
                </div>
                <!-- Form Cart -->
                <?php
                if (!isset($_SESSION['user'])&&!isset($_SESSION['admin'])) {
                ?>
                    <div class="col-md-4" style="padding: 0px;">
                        <form action="" method="post">
                            <input type="number" value="1" name="quantyli[<?= $tow['id'] ?>]" size="2" class="form-control" style="width: 50px;padding: 0px 5px;">
                            <button type="submit" name="oder" id="" class="btn btn-primary" btn-lg btn-block" style="margin-top: 10px;">Thêm Giỏ Hàng</button>
                        </form>
                    </div>
                <?php
                } elseif (isset($_SESSION['admin'])) {
                ?>
                    <form action="" method="post">
                        <input type="number" value="1" name="quantyli[<?= $tow['id'] ?>]" size="2" class="form-control" style="width: 50px;padding: 0px 5px;">
                        <button type="submit" name="oder" id="" class="btn btn-primary" btn-lg btn-block" style="margin-top: 10px;">Thêm Giỏ Hàng</button>
                    </form>
                <?php
                } else {
                ?>
                    <div class="col-md-4" style="padding: 0px;">
                        <form action="add-cart.php?action=add" method="post">
                            <input type="number" value="1" name="quantyli[<?= $tow['id'] ?>]" size="2" class="form-control" style="width: 40px;padding: 0px 5px;">
                            <button type="submit" name="oder" id="" class="btn btn-primary" btn-lg btn-block" style="margin-top: 10px;">Thêm Giỏ Hàng</button>
                        </form>
                    </div>
                <?php
                }
                ?>
                <!-- End Form Cart  -->
            </div>
            <!-- End col-md-4-Text  -->
            <div class="col col-md-3" style="padding: 0 5px 0 0;">
                <div class="col-12" style="padding-right: 0px;">
                    <div class="card-text">
                        <b style="font-size: 22px;font-family: roboto">Sản phẩm liên quan</b>
                    </div>
                    <?php
                    foreach (selectDb("SELECT * FROM products WHERE category_id=$cate ORDER BY RAND() LIMIT 3") as $item) {
                    ?>
                        <div class="img-tt-silde" style="padding: 5px 0px;">
                            <a href="product-details.php?id=<?= $item['id'] ?>&cate=<?= $item['category_id'] ?>"> <img src="public/images/Product/<?= $item['image'] ?>" alt="" height="50px" style="border-radius: 5px;"></a>
                            <b><a href="product-details.php?id=<?= $item['id'] ?>&cate=<?= $item['category_id'] ?>"><span><?= $item['name'] ?></span></a></b>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- End Silde Right  -->
        </div>
        <div class="row" style="margin-top: 20px;">
            <?php
            $tong = total("SELECT COUNT(*) FROM comments WHERE product_id = '$id'");
            //Tổng Sản phẩm với Id = ID lấy bảng Cate
            ?>
            <div class="col-md-12">
                <div class="col-md-12">
                    <h5>ĐÁNH GIÁ SẢN PHẨM (<?= $tong ?> đánh giá)</h5>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea class="form-control" name="conmentProduct" id="" rows="3"></textarea>
                            </div>
                            <button type="submit" name="addConment" id="" class="btn btn-primary" btn-lg btn-block>Bình Luận</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="clear: both;">
                            <?php
                            foreach (selectDb("SELECT * FROM comments WHERE product_id = '$id' ORDER BY id DESC") as $row) {
                                $id_user = $row['user_id'];
                                foreach (selectDb("SELECT * FROM users WHERE id= '$id_user'") as $tow) {
                            ?>
                                    <div>
                                        <b><span><?= $tow['name'] ?></span></b>
                                        <h5 style="color: #757575;"><?= $row['content'] ?></h5>
                                        <small>Date : <?= $row['created_at'] ?></small>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            if ($tow['email'] == $_SESSION['user']) { ?>
                                                <a href="product-details.php?id=<?= $id ?>&cate=<?= $cate ?>&id_conment=<?= $row['id'] ?>" style="font-size:10px">Xóa</a>
                                            <?php

                                            }
                                        } else if (isset($_SESSION['admin']))
                                            if ($tow['email'] == $_SESSION['admin']) { ?>
                                            <a href="product-details.php?id=<?= $id ?>&cate=<?= $cate ?>&id_conment=<?= $row['id'] ?>" style="font-size:10px">Xóa</a>
                                        <?php

                                            }
                                        ?>
                                        <hr>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once("footer.php");
?>