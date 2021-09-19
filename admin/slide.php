<?php
include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM sliders WHERE id = '$id'");
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
                    <h1 class="m-0 text-dark">Slide</h1>
                    <a name="" id="" class="btn btn-info" href="addSlide.php" role="button" style="margin-top: 20px;">Thêm Slide</a>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Slide</li>
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
                        <th scope="col">Tiêu Đề</th>
                        <th scope="col">Link</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Quản Lí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach (selectDb("SELECT * FROM sliders") as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $stt += 1 ?></th>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['link'] ?></td>
                            <td><img src="../public/images/Banner/<?= $row['image'] ?>" alt="" width="50"></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editSlide.php?id=<?= $row['id'] ?>" role="button">Update</a>
                                <a name="" id="" class="btn btn-warning" href="deleteSliders.php?id=<?= $row['id'] ?>" role="button" onclick="return confirm('Bạn muốn xóa mục này?')">Xóa</a>
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