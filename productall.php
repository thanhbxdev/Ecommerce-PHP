<?php
include_once "header.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

foreach (selectDb("SELECT * FROM categories WHERE id='$id'") as $row) {
}
//Lấy id Cate trùng với id trên GET
$tong = total("SELECT COUNT(*) FROM products WHERE category_id ='$id'");
//Tổng Sản phẩm với Id = ID lấy bảng Cate
?>

<body>
    <div class="container-fluid" style="padding: 15px 5%; background-color: #eff1f5; margin: 0px;">
        <div class="row" id="nav-text">
            <div class="col-md-12">
                <a href="index.php" style="text-decoration: none;">Trang chủ</a> / <a href="productall.php?id=<?= $row['id'] ?>" style="color: black; text-decoration: none;">
                    <?= $row['name'] ?>
                </a>
            </div>
        </div>
        <!-- End Row Nav text  -->
        <div class="row" id="slide-prd">
            <div class="col-md-12">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://img.fpt.shop/w_1200/h_300/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/10/31/637397784094124724_VivoT11-C1_1200x300.png" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.fpt.shop/w_1200/h_300/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/11/19/637414051538422211_C1.png" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.fpt.shop/w_1200/h_300/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/11/6/637402555821736243_C1.png" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
        <!-- End Row Slide  -->
        <div class="row" style="padding: 15px 0px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="col-md-12" style="padding: 0px;">
                            <span style="font-weight: bold; color: black;">Hãng Sản Xuất</span>
                            <div class="col-md-12" style="padding: 10px 15px;">
                                <form action="search.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6" style="padding: 0px;">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="all" id="">
                                                    Tất cả
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="samsung" id="">
                                                    Samsung
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vsmart" id="">
                                                    Vsmart
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="xiaomi" id="">
                                                    Xiaomi
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End Checkbox  -->
                                        <div class="col-md-6" style="padding: 0px;">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="apple" id="">
                                                    Apple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vivo" id="">
                                                    Vivo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="oppo" id="">
                                                    OPPO
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="huawei" id="">
                                                    Huawei
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End Checkbox  -->
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- End Hãng sản Xuất  -->
                        <div class="col-md-12" style="padding: 0px;">
                            <span style="font-weight: bold; color: black;">Mức giá</span>
                            <div class="col-md-12" style="padding: 10px 15px;">
                                <div class="row">
                                    <div class="col-md-6" style="padding: 0px;">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Tất cả
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Dưới 2 triệu
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Từ 2 - 4 triệu
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Từ 4 - 7 triệu
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Từ 7 - 13 triệu
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="" id="">
                                                Trên 13 triệu
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End Checkbox  -->
                                </div>
                            </div>

                        </div>
                        <!-- End Hãng sản Xuất  -->
                    </div>
                    <!-- End col-md 3  -->
                    <div class="col-md-9" style="padding: 0px 30px 0px 0px;">
                        <div class="col-md-12">
                            <div class="row" style="border: 1px solid #d5deef; border-radius: 5px; box-shadow: 5px; background-color: white;">
                                <div class="col-md-12" style="padding: 15px 15px 10px 15px;">
                                    <h3 style="font-weight: bold; color: black;float: left;"><?= $row['name'] ?></h3>
                                    <h5 style="float: left; margin-bottom: 0px; padding-top: 5px; padding-left: 10px;">
                                        (<?= $tong ?> sản phẩm)
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!-- End Title  -->
                        <div class="col-md-12" style="margin-top: 10px;">
                            <div class="row" style="border: 1px solid #d5deef; border-radius: 5px; box-shadow: 5px; background-color: white; padding-top: 10px 0px;">
                                <?php
                                foreach (selectDb("SELECT * FROM products WHERE category_id = '$id'") as $row) {
                                ?>
                                    <div class="col-md-4" id="prdSmall">
                                        <div class="col-md-12" style="padding: 0px;">
                                            <div class="col-md-12" style="padding: 0px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>"><img src="public/images/Product/<?= $row['image'] ?>" alt="" style="padding: 15px 0;"></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                                        <b>
                                                            <h4 style="font-weight: bold;"><?= $row['name'] ?></h4>
                                                        </b>
                                                        <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['price']) ?></span>
                                                        <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['origin_price']) ?></strike></span>
                                                        <div>
                                                            <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 20px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Prd Small -->
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Col-md-9  -->
                </div>
            </div>
        </div>
        <!-- End Article Cate  -->
    </div>
</body>
<?php
include_once "footer.php";
?>