<?php
include('../function.php');
$details = null;
if (isset($_GET['product_id']) && !isset($_GET['cmt_id'])) {
    $product_id = $_GET['product_id'];
} else if (isset($_GET['cmt_id']) && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $cmt_id = $_GET['cmt_id'];
    action("DELETE FROM comments WHERE id = '$cmt_id'");
    header("Location:comment_details.php?product_id=$product_id");
}
$stt = 0;
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
                    <h1 class="m-0 text-dark">Comments Details</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
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
                        <th scope="col">Người Bình Luận</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Nội Dung</th>
                        <th scope="col">Ngày Bình Luận</th>
                        <th scope="col">Quản Lí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (selectDb("SELECT * FROM comments WHERE product_id = '$product_id'") as $row) {
                        $user_id = $row['user_id'];
                        foreach (selectDb("SELECT * FROM users WHERE id = '$user_id'") as $tow) {
                            foreach (selectDb("SELECT * FROM products WHERE id = '$product_id'") as $item) {
                    ?>
                                <tr>
                                    <td scope="row"><?= $stt += 1 ?></td>
                                    <td><?= $tow['name'] ?></td>
                                    <td><img src="images/<?= $tow['avatar'] ?>" alt="" width="100px" height="100px"></td>
                                    <td><?= $row['content'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><a href="comment_details.php?cmt_id=<?= $row['id'] ?>&product_id=<?= $product_id ?>" class="btn btn-warning" onclick="return confirm('Bạn muốn xóa bình luận này?')">Xóa</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a name="" id="" class="btn btn-primary" href="comment.php" role="button">Quay Lại</a>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>