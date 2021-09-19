<?php
include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM comments WHERE id = '$id'");
}
?>
<!DOCTYPE html>
<html>
<?php include "header_qt.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Conment</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Conment</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Số Lượng Conment</th>
                        <th scope="col">Quản Lí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach (selectDb("SELECT DISTINCT product_id FROM comments") as $item) {
                        $product_id = $item['product_id'];
                        // Lấy id sản phẩm bảng conment
                        foreach (selectDb("SELECT * FROM products WHERE id= '$product_id'") as $value) {
                            // Truy vấn bảng sản phẩm có id sản phẩm trùng với id sản phẩm vừa lấy ở bảng conment
                            $tong = total("SELECT COUNT(*) FROM comments WHERE product_id = '$product_id'");
                            // Đếm số conment ở mỗi sản phẩm 
                            foreach (selectDb("SELECT * FROM comments WHERE product_id='$product_id' ORDER BY id DESC LIMIT 1 ") as $row) {
                    ?>
                                <tr>
                                    <th scope="row"><?= $stt += 1 ?></th>
                                    <td><?= $value['name'] ?></td>
                                    <td><img src="../public/images/Product/<?= $value['image'] ?>" alt="" width="100px" height="100px"></td>
                                    <td><?= $tong ?></td>
                                    <td>
                                        <a href="comment_details.php?product_id=<?= $product_id ?>" class="btn btn-danger">Xem chi tiết</a>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>