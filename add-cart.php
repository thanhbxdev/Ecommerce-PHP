<?php
require_once("header.php");
require_once("function.php");
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['action'])) {
    function update($add = false)
    {
        foreach ($_POST['quantyli'] as $id => $quantyli) {
            if ($quantyli == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if (true) { //add bằng true
                    $_SESSION['cart'][$id] = $quantyli;
                } else { //add bằng true
                    $_SESSION['cart'][$id] += $quantyli;
                }
            }
        }
    }
    //Function Cập nhật sản phẩm
    switch ($_GET['action']) {
        case "add":
            update(true);
            break;
        case "delete":
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            break;
        case "submit":
            if (isset($_POST['update'])) {            //Cập nhật Số Lượng Sản Phẩm
                update();
            } elseif (isset($_POST['order'])) {         //Đặt Hàng
                if (empty($_POST['name'])) {
                    $err = "Bạn Chưa Nhập Tên Người Nhận";
                } elseif (empty($_POST['add'])) {
                    $err = "Bạn Chưa Nhập Địa Chỉ";
                } elseif (empty($_POST['phone'])) {
                    $err = "Bạn Chưa Số Điện Thoại";
                } elseif (empty($_POST['quantyli'])) {
                    $err = "Giỏ Hàng Của Bạn Rỗng";
                }
                if (!isset($err) && isset($_POST['quantyli'])) {
                    //Không có lỗi bắt đầu lưu DB
                    //Insert oder
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                    $date = date("Y/m/d h:i:sa");
                    $status = 0;
                    if (isset($_POST['order'])) {
                        $id_user = $_POST['id']; //Lấy id user
                        $add = $_POST['add']; //Lấy địa chỉ
                        $phone = $_POST['phone']; //Lấy số điện thoại
                    }
                    if (!empty($_SESSION['cart'])) {
                        $list_id = array_keys($_SESSION['cart']);
                        $list_id = implode(',', $list_id); // chuyển thành chuỗi để lấy ds sp
                        $total = 0;
                        if (!empty($list_id)) {
                            foreach (selectDb("SELECT * FROM products WHERE id IN ($list_id)") as $row) {
                                $id = $row['id'];
                                $total += $row['price'] * $_SESSION['cart'][$row['id']]; // Tổng Tiền
                                $quantyli = $_SESSION['cart'][$row['id']];
                                $price = $row['price'];
                            }
                        }
                    }
                    try {
                        action("INSERT INTO oder (id_user,time_oder,satatus,address,phone,total) VALUES 
                        ('$id_user','$date','$status','$add','$phone',$total)");
                        $last_id = $conn->lastInsertId(); //Lấy id vừa insert
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    //End Insert Oder
                    //Insert oder details
                    try {
                        $conn->beginTransaction();
                        action("INSERT INTO oder_details (id_oder,id_prd,quantily,price,created_at) VALUES 
                        ('$last_id','$id','$quantyli','$price','$date')");
                        $conn->commit();
                        $err = "Đặt Hàng Thành Công";
                        unset($_SESSION['cart']);
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
            break;
    }
}
if (!empty($_SESSION['cart'])) {
    $list_id = array_keys($_SESSION['cart']);

    $list_id = implode(',', $list_id); // chuyển thành chuỗi để lấy ds sp

}
?>

<body>
    <div class="container-fluid" style="padding: 10px; background-color: #eff1f5;">
        <div style="padding:0px;border-radius: 5px;box-shadow: 5px;border: 1px solid #d5deef;background-color: #FFFFFF;">
            <form action="add-cart.php?action=submit" method="POST">
                <table class="table table-striped">
                    <thead class="">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($list_id)&& isset($_SESSION['cart'])) {
                            $stt = 0;
                            $total = 0;
                            foreach (selectDb("SELECT * FROM products WHERE id IN ($list_id)") as $row) {
                        ?>
                                <tr>
                                    <td scope="row">
                                        <?= $stt += 1 ?>
                                    </td>
                                    <td><?= $row['name'] ?></td>
                                    <td><img src="public/images/Product/<?= $row['image'] ?>" alt=""></td>
                                    <td><?= number_format($row['price']) ?></td>
                                    <td><input type="number" name="quantyli[<?= $row['id'] ?>]" value="<?= $_SESSION['cart'][$row['id']] ?>"></td>
                                    <td><?= number_format($row['price'] * $_SESSION['cart'][$row['id']]) ?></td>
                                    <td><a href="add-cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                                $total += $row['price'] * $_SESSION['cart'][$row['id']];
                            }
                            ?>
                            <tr>
                                <td scope="row"></td>
                                <td>Tổng Tiền</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><?= number_format($total) ?></td>
                                <td>&nbsp;</td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <!-- End Table  -->
                <button type="submit" name="update" id="" class="btn btn-primary" btn-lg btn-block" style="margin: 10px;">Cập Nhật</button>
                <!-- End Update -->
                <div style="background-color: #efdddc;">
                    <?php
                    if (isset($err)) {
                    ?>
                        <p class="alert alert-primary"><?= $err ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $email = $_SESSION['user'];
                        foreach (selectDb("SELECT * FROM users WHERE email = '$email'") as $tow) {
                        }
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="form-group" style="padding: 10px;">
                            <input type="hidden" name="id" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $tow['id'] ?>">
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="" style="color: red;">Người Nhận(*)</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $tow['name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="padding: 10px;">
                            <label for="" style="color: red;">Địa Chỉ(*)</label>
                            <input type="text" name="add" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $tow['address'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="padding: 10px;">
                            <label for="" style="color: red;">Số Điện Thoại(*)</label>
                            <input type="number" name="phone" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $tow['phone'] ?>">
                        </div>
                    </div>
                    <button type="submit" name="order" id="" class="btn btn-danger" btn-lg btn-block" style="margin: 10px;">Đặt Hàng</button>
                </div>
            </form>
            <!-- End Form  -->
        </div>

    </div>

</body>
<?php
require_once("footer.php");
?>