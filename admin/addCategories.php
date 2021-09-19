<?php
include("../function.php");
if (isset($_POST['addCate'])) {
    $name = $_POST['name'];
    $img = $_FILES['images'];
    $icon = $_POST['icon'];
    $maxSize = 800000;
    $upload = true;
    $dir = "../public/images/Categories/";
    $target_file = $dir . basename($img['name']);
    $type = pathinfo($target_file, PATHINFO_EXTENSION);
    $allowtypes    = array('jpg', 'png', 'jpeg');
    if ($img["size"] > $maxSize) {
        $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
        $upload = false;
    } elseif (!in_array($type, $allowtypes)) {
        $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
        $upload = false;
    } else {
        $imgname = $img['name'];
        if (move_uploaded_file($img['tmp_name'], $dir . $imgname)) {
        }
        $check = "SELECT * FROM categories WHERE name = '$name'";
        $cout = $conn->prepare($check);
        $cout->execute();
        if ($cout->rowCount() > 0) {
            $error = "Tên danh mục đã tồn tại";
        } else {
            try {
                action("INSERT INTO categories (name,image,icon) VALUES 
                ('$name','$imgname','$icon')");
                header("Location:categories.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
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
                            <h1 class="m-0 text-dark">Add Category</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Category</li>
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
                    <?php
                    if (isset($error)) { ?>
                        <p class="alert alert-primary"><?= $error ?></p>
                    <?php

                    }
                    ?>
                    <form action="" method="POST" id="addCate" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Tên Danh Mục</label>
                                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Tên danh mục" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="images" required>
                                        <label class="custom-file-label" for="customFile">Chọn File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Icon</label>
                                    <input type="text" class="form-control" name="icon" id="" aria-describedby="helpId" placeholder="Icon" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" name="addCate" id="" class="btn btn-primary" btn-lg btn-block>Thêm Mới Danh Mục</button>
                                <a name="" id="" class="btn btn-danger" href="categories.php" role="button">Quay Lại</a>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
<?php include "footer_qt.php"; ?>    