<?php
include_once("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgname = null;
    foreach (selectDb("SELECT * FROM info WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $logo = isset($row['logo']) ? $row['logo'] : '';
        $coppyright = isset($row['coppyright']) ? $row['coppyright'] : '';
    }
    if (isset($_POST['updateInfo'])) {
        $name_new = $_POST['name'];
        $phone_new = $_POST['phone'];
        $address_new = $_POST['address'];
        $gmail_new = $_POST['gmail'];
        $logo_new = $_POST['logo'];
        $coppyright_new = $_POST['coppyright'];
        if (isset($_FILES['logo']) && $_FILES['logo']['name']) {
            $img_new = $_FILES['logo'];
            $maxSize = 800000;
            $upload = true;
            $dir = "../images/";
            $target_file = $dir . basename($img_new['name']);
            $type = pathinfo($target_file, PATHINFO_EXTENSION);
            $allowtypes    = array('jpg', 'png', 'jpeg');

            if ($img_new["size"] > $maxSize) {
                $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
                $upload = false;
            } elseif (!in_array($type, $allowtypes)) {
                $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                $upload = false;
            } else {
                $imgname = uniqid() . "-" . $img_new['name'];
                move_uploaded_file($img_new['tmp_name'], $dir . $imgname);
                action("UPDATE info SET name='$name_new', phone= '$phone_new',address='$address_new',email = '$gmail_new',
                    logo='$imgname',coppyright='$coppyright_new' WHERE id = '$id'");
                header("Location:info.php");
            }
        } else {
            action("UPDATE info SET name='$name_new', phone= '$phone_new',address='$address_new',email = '$gmail_new',
                coppyright='$coppyright_new' WHERE id = '$id'");
            header("Location:infor.php");
        }
    }

    // foreach (selectDb("SELECT * FROM info WHERE id =" . $cate) as $item) {
    //     $cate_id = $item['name'];
    // }
} else {
    header("Location:infor.php");
}
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
                            <h1 class="m-0 text-dark">Edit Info</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active"> Edit Info</li>
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
                    <form action="" method="POST" id="editInfo" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="col-sm-6" style="float: left;">
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" class="form-control" name="name" value="<?=$name?>" id="" aria-describedby="helpId" placeholder="" >
                                </div>
                                <div class="form-group">
                                    <label for="">SĐT</label>
                                    <input type="text" class="form-control" name="phone" value="<?=$phone?>" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="<?=$address?>" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="gmail" value="<?=$email?>" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6" style="float: left;">
                                <div class="form-group">
                                    <label for="">Coppyright</label>
                                    <input type="text" class="form-control" name="coppyright" value="<?=$coppyright?>" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                                        <label class="custom-file-label" for="customFile">Chọn File</label>
                                    </div>
                                </div>
                                <button type="submit" name="updateInfo" id="" class="btn btn-success" btn-lg btn-block>Update</button>
                                <a name="" id="" class="btn btn-danger" href="info.php" role="button">Quay Lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>
<html>