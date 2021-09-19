<?php
include_once("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM users WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $password = isset($row['password']) ? $row['password'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
        $permission = isset($row['Permission']) ? $row['Permission'] : '';
        $active = isset($row['Active']) ? $row['Active'] : '';
    }
    if (isset($_POST['updateUser'])) {
        $name_new = isset($_POST['name']) ? $_POST['name'] : $name;
        $phone_new = isset($_POST['phone']) ? $_POST['phone'] : $phone;
        $pass_new = empty($_POST['password']) ? $password : md5($_POST['password']);
        $email_new = isset($_POST['email']) ? $_POST['email'] : $email;
        $address_new = isset($_POST['address']) ? $_POST['address'] : $address;
        $active_new = isset($_POST['active']) ? $_POST['active'] : $active;
        $permission_new = isset($_POST['permission']) ? $_POST['permission'] : $permission;
        action("UPDATE users SET name='$name_new',password='$pass_new',email= '$email_new',phone='$phone_new',address='$address_new',Permission='$permission_new',Active='$active_new' WHERE id = '$id'");
        header("Location:user.php");
    }
} else {
    header("Location:user.php");
}
?>
<!doctype html>
<html lang="en">

<body>
    <?php
    include_once("header_qt.php");
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit User</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                <form action="" method="POST" id="UpdateUser">
                    <div class="col-sm-12">
                        <div class="col-sm-8" style="float: left;">
                            <div class="form-group">
                                <label for="">Họ Tên</label>
                                <input type="text" class="form-control" name="name" value="<?= $name ?>" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" value="<?= $phone ?>" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $email ?>" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>
                        <div class="col-sm-4" style="float: left;">
                            <div class="form-group">
                                <label for="">Trạng Thái</label>
                                <select class="form-control" name="active" id="">
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Khóa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quyền</label>
                                <select class="form-control" name="permission" id="">
                                    <option value="1">Admin</option>
                                    <option value="0">Khách Hàng</option>
                                </select>
                            </div>
                            <button type="submit" name="updateUser" id="" class="btn btn-success" btn-lg btn-block>Update</button>
                            <a name="" id="" class="btn btn-danger" href="User.php" role="button">Quay Lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once("footer_qt.php");
    ?>
</body>

</html>