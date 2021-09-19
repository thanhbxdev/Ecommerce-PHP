<?php
include('header.php');
$name = null;
if (isset($_POST['search'])) {
    $name = $_POST['name'];
} else {
    header("Location:index.php");
}
$sql = "SELECT COUNT(*) FROM products WHERE name LIKE  '%$name%'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$number = $stmt->fetchColumn();
?>

<body style="background-color: #eff1f5;">
    <div class="col-md-12" style="padding: 20px 0px;">
        <div class="col-md-12">
            <div class="row" style="border: 1px solid #d5deef; border-radius: 5px; box-shadow: 5px; background-color: white;">
                <div class="col-md-12" style="padding: 15px 15px 10px 15px;">
                    <h5 style=" margin-bottom: 0px; padding-left: 10px;">
                        Tìm thấy <?= $number ?> kết quả
                    </h5>
                </div>
            </div>
        </div>
        <!-- End Title  -->
        <div class="col-md-12" style="margin-top: 10px;">
            <div class="row" style="border: 1px solid #d5deef; border-radius: 5px; box-shadow: 5px; background-color: white; padding-top: 10px 0px;">
                <?php
                foreach (selectDb("SELECT * FROM products WHERE name LIKE '%$name%' ORDER BY id ") as $row) {
                ?>
                    <div class="col-md-3" id="prdSmall" style="padding-top: 20px; margin-top: 20px;">
                        <div class="col-md-12" style="padding: 0px;">
                            <div class="col-md-12" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="product-details.php?id=<?=$row['id']?>&cate=<?=$row['category_id']?>"><img src="public/images/Product/<?= $row['image'] ?>" alt="" style="padding: 15px 0;"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <b>
                                            <h4 style="font-weight: bold;">
                                                <?= $row['name'] ?>
                                            </h4>
                                        </b>
                                        <span style="margin-right: 20px; background-color: #ce180d; border-radius: 25px; color: white; font-size: 16px; padding: 3px 15px;"><?= number_format($row['price']) ?>đ</span>
                                        <span style="font-size: 14px; color: #888888;"><strike><?= number_format($row['origin_price']) ?>đ</strike></span>
                                        <button style="margin-top: 20px; background-color: #ce180d; border: #ce180d; outline: none; " type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">THÊM GIỎ HÀNG</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- End Prd Small -->
            </div>
        </div>
    </div>
    <!-- End Col-md-9  -->
</body>