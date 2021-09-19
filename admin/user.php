<!DOCTYPE html>
<html>
<?php
require_once("header_qt.php");
require_once("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM users WHERE id = '$id'");
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Quản Lí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach (selectDb("SELECT * FROM users") as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $stt += 1 ?></th>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['permission'] == 1 ? 'Admin' : 'Khách Hàng' ?></td>
                            <td><?= $row['active'] == 1 ? 'Hoạt Động' : 'Bị Khóa' ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editUser.php?id=<?= $row['id'] ?>" role="button">Update</a>
                                <?php
                                if ($row['permission'] == 0) {
                                ?>
                                    <a name="" id="" class="btn btn-danger" href="user.php?id=<?=$row['id']?>" role="button" onclick="return confirm('Bạn muốn xóa mục này?')">Xóa</a>
                                <?php
                                }
                                ?>
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
<?php
include_once("footer_qt.php");
?>

</html>