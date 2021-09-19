<?php
include_once("header.php");
?>

<body>
    <div class="container-fluid" style="padding: 15px 5%; background-color: #eff1f5; margin: 0px;">
        <div class="row" id="slide">
            <div class="col col-md-8" style="padding-left: 5px;">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        foreach (selectDb("SELECT * FROM sliders ORDER BY id ASC LIMIT 1") as $tow) {
                        ?>
                            <div class="carousel-item active">
                                <a href="./<?=$tow['link']?>"><img class="d-block w-100" src="public/images/Banner/<?= $tow['image'] ?>" alt="Ảnh không hiển thị"></a>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        foreach (selectDb("SELECT * FROM sliders ORDER BY id ASC LIMIT 1,2") as $row) {
                        ?>
                            <div class="carousel-item">
                                <a href=""><img class="d-block w-100" src="public/images/Banner/<?= $row['image'] ?>" alt="Ảnh không hiển thị"></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- End Silde Left  -->
            <div class="col col-md-4" style="padding: 0 5px 0 0;">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row" style="padding: 0px; margin: 0px;">
                        <div class="col-12" id="right-slide-one" style="margin-top: 0px;">
                            <?php
                            $id = 4;
                            foreach (selectDb("SELECT * FROM sliders WHERE id = '$id'") as $row) {
                            ?>
                                <a href="<?= $row['link'] ?>"> <img src="public/images/Banner/<?= $row['image'] ?>" alt="Ảnh không hiển thị" style="border-radius: 5px;"></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row" style="padding: 0px; margin: 0px;">
                        <div class="col-12" id="right-slide-t">
                            <?php
                            $id = 5;
                            foreach (selectDb("SELECT * FROM sliders WHERE id = '$id'") as $row) {
                            ?>
                                <a href="<?= $row['link'] ?>"> <img src="public/images/Banner/<?= $row['image'] ?>" alt="Ảnh không hiển thị" style="border-radius: 5px;"></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row" style="padding: 0px; margin: 0px; padding-top: 10px;" id="right-slide">
                        <div class="col-12" style="padding-right: 0px;">
                            <div class="tt-slide">
                                <span>Thông tin nổi bật</span>
                                <a href=""><span>Xem tất cả</span></a>
                            </div>
                            <div class="img-tt-silde">
                                <?php
                                $id = 6;
                                foreach (selectDb("SELECT * FROM sliders WHERE id = '$id'") as $row) {
                                ?>
                                    <a href="<?= $row['link'] ?>"> <img src="public/images/Banner/<?= $row['image'] ?>" alt="" height="50px" width="100px" style="border-radius: 5px;"></a>
                                    <b><a href="<?= $row['link'] ?>"><span>Vsmart giảm ngay 1.5 triệu</span></a></b>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Silde Right  -->
        </div>
        <!-- End Slide  -->
        <div class="row" id="category">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    foreach (selectDb("SELECT * FROM categories") as $row) {
                    ?>
                        <div class="col-md-2" id="cate">
                            <a href="productall.php?id=<?= $row['id'] ?>" style="color: black;">
                                <div>
                                    <img src="public/images/Categories/<?= $row['image'] ?>" alt="" style="margin: 20px 0px;">
                                </div>
                                <span style="color: black;"><?= $row['name'] ?></span>
                            </a>
                        </div>
                        <!-- End cate small  -->
                    <?php
                    }
                    ?>
                </div>
                <!-- End Row  -->
            </div>
        </div>
        <!-- End Cate  -->
        <div class="row" id="sale-hot">
            <div class="col-md-12" style="padding: 15px;">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-12" id="title-cate">
                            <div class="col-md-12">
                                <h3 style="color: #ce180d; float: left;"><i class="fa fa-firefox" aria-hidden="true"></i><b>KHUYẾN MÃI HOT</b></h3>
                                <!-- <a href="">
                                    <h5 style="float: right;">Xem tất cả</h5>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Title  -->
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row" style="padding: 0 15px;">
                                <?php
                                foreach (selectDb("SELECT * FROM products ORDER BY views DESC LIMIT 0,4") as $row) {
                                ?>
                                    <div class="col-md-3" id="prdSmall">
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
                                                        <div>
                                                            <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['origin_price']) ?>đ</span>
                                                            <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['price']) ?>đ</strike></span>
                                                        </div>
                                                        <div style="text-align: center;">
                                                            <small>Lượt xem : <?= $row['views'] ?></small>
                                                        </div>
                                                        <div>
                                                            <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 10px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>

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
                        <div class="carousel-item">
                            <div class="row" style="padding: 0 15px;">
                                <?php
                                foreach (selectDb("SELECT * FROM products ORDER BY views DESC LIMIT 4,7") as $row) {
                                ?>
                                    <div class="col-md-3" id="prdSmall">
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
                                                        <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['origin_price']) ?>đ</span>
                                                        <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['price']) ?>đ</strike></span>
                                                        <div style="text-align: center;">
                                                            <small>Lượt xem : <?= $row['views'] ?></small>
                                                        </div>
                                                        <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 10px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>
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
                        <div class="carousel-item">
                            <div class="row" style="padding: 0 15px;">
                                <?php
                                foreach (selectDb("SELECT * FROM products ORDER BY views DESC LIMIT 7,11") as $row) {
                                ?>
                                    <div class="col-md-3" id="prdSmall">
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
                                                        <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['origin_price']) ?>đ</span>
                                                        <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['price']) ?>đ</strike></span>
                                                        <div style="text-align: center;">
                                                            <small>Lượt xem : <?= $row['views'] ?></small>
                                                        </div>
                                                        <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 10px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>
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
                </div>
            </div>
        </div>
        <!-- End Sale Hot  -->
        <div class="row" id="sale-hot">
            <div class="col-md-12" style="padding: 15px;">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-12" id="title-cate">
                            <div class="col-md-12">
                                <h3 style="color: black; float: left;"><b>ĐIỆN THOẠI NỔI BẬT</b></h3>
                                <a href="productall.php?id=21">
                                    <h5 style="float: right;">Xem tất cả</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Title  -->
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="padding: 0 15px;">
                                <?php
                                $name = "Điện Thoại";
                                foreach (selectDb("SELECT * FROM categories WHERE name LIKE '%$name%'") as $item) {
                                    $id_prd = $item['id'];
                                    foreach (selectDb("SELECT * FROM products WHERE category_id='$id_prd'") as $row) {
                                ?>
                                        <div class="col-md-3" id="prdSmall">
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
                                                            <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['price']) ?>đ</span>
                                                            <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['origin_price']) ?>đ</strike></span>
                                                            <div style="text-align: center;">
                                                                <small>Lượt xem : <?= $row['views'] ?></small>
                                                            </div>
                                                            <div>
                                                                <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 10px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Prd Small -->
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
        <!-- End Sale Hot  -->
        <div class="row" id="sale-hot">
            <div class="col-md-12" style="padding: 15px;">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-12" id="title-cate">
                            <div class="col-md-12">
                                <h3 style="color: black; float: left;"><b>LAP TOP BÁN CHẠY</b></h3>
                                <a href="productall.php?id=22">
                                    <h5 style="float: right;">Xem tất cả</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Title  -->
                <div class="col-md-12" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="padding: 0 15px;">
                                <?php
                                $name = "Laptop";
                                foreach (selectDb("SELECT * FROM categories WHERE name LIKE '%$name%'") as $item) {
                                    $id_prd = $item['id'];
                                    foreach (selectDb("SELECT * FROM products WHERE category_id='$id_prd'") as $row) {
                                ?>
                                        <div class="col-md-3" id="prdSmall">
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
                                                            <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['price']) ?>đ</span>
                                                            <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['origin_price']) ?>đ</strike></span>
                                                            <div style="text-align: center;">
                                                                <small>Lượt xem : <?= $row['views'] ?></small>
                                                            </div>
                                                            <div>
                                                                <a name="" id="" class="btn btn-primary" href="product-details.php?id=<?= $row['id'] ?>&cate=<?= $row['category_id'] ?>" role="button" style="margin-top: 10px; background-color: #ce180d; border: #ce180d; outline: none;">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Prd Small -->
                                <?php
                                    }
                                }
                                ?>
                                <!-- End Prd Small -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sale Hot  -->
    </div>
</body>
<?php
include_once("footer.php");
?>