<?php
include_once("../function.php");
?>
<!DOCTYPE html>
<html>
<?php include "header_qt.php"; ?>

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
                                <li class="breadcrumb-item active">Info</li>
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
                                <th scope="col">Tên</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Coppyright</th>
                                <th scope="col">Quản Lí</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach(selectDb("SELECT * FROM info")as $row){
                            ?>
                            <tr>
                                <th scope="row"><?=$row['name']?></th>
                                <td><?=$row['phone']?></td>
                                <td><?=$row['address']?></td>
                                <td><?=$row['email']?></td>
                                <td><img src="../public/images/<?=$row['logo']?>" alt="" width="50"></td>
                                <td><?=$row['coppyright']?></td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="editInfor.php?id=<?=$row['id']?>" role="button">Update</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>
<html>