<!DOCTYPE html>
<html>
<?php
require_once("header_qt.php");
require_once("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Info</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Infor</li>
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
                        <th scope="col">Hóa Đơn</th>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ngày Đặt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach (selectDb("SELECT * FROM oder_details WHERE id_oder = $id") as $row) {
                        $id_prd = $row['id_prd'];
                        foreach (selectDb("SELECT * FROM products WHERE id = $id_prd") as $tow) {
                    ?>
                            <tr>
                                <th scope="row"><?= $stt += 1 ?></th>
                                <td><?= $row['id_oder'] ?></td>
                                <td><?= $tow['name'] ?></td>
                                <td><?=$row['quantily']?></td>
                                <td><?=number_format($row['price']) ?></td>
                                <td><?= $row['created_at'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a name="" id="" class="btn btn-primary" href="oder.php" role="button">Quay Lại</a>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>