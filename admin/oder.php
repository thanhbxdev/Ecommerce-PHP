<!DOCTYPE html>
<html>
<?php 
require_once("header_qt.php");
require_once("../function.php");
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
                        <th scope="col">Khách Hàng</th>
                        <th scope="col">Ngày Đặt</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Quản Lí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach (selectDb("SELECT * FROM oder") as $row) {
                        $id_user = $row['id_user'];
                        foreach (selectDb("SELECT * FROM users WHERE id = $id_user") as $tow) {
                    ?>
                            <tr>
                                <th scope="row"><?= $stt += 1 ?></th>
                                <td><?= $tow['name'] ?></td>
                                <td><?=$row['time_oder']?></td>
                                <td><?=$row['satatus']==0 ? 'Đang Giao':'Thành Công' ?></td>
                                <td><?= $row['address']?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?=number_format($row['total']) ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-danger" href="oder_details.php?id=<?=$row['id']?>" role="button">Xem Chi Tiết</a>
                                </td>
                            </tr>
                    <?php
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