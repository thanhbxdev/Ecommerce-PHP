<?php
include("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM categories WHERE id = '$id'");
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
                            <h1 class="m-0 text-dark">Category</h1>
                            <a name="" id="" class="btn btn-info" href="addCategories.php" role="button" style="margin-top: 20px;">Thêm Danh Mục</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
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
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Ảnh</th>
                            <th>Quản Lí</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        foreach (selectDb("SELECT * FROM categories") as $row) {

                        ?>
                            <tr>
                                <td scope="row"><?= $stt += 1 ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><img src="../public/images/Categories/<?=$row['image']?>" alt=""></td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="editCategories.php?id=<?= $row['id'] ?>" role="button">Update</a>
                                    <a name="" id="" class="btn btn-warning" href="categories.php?id=<?= $row['id'] ?>" role="button" onclick="return confirm('Bạn muốn xóa mục này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
        <!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>