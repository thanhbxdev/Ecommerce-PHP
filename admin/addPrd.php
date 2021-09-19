<?php
include_once("../function.php");
if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $origin_price = $_POST['origin_price'];
    $total = $_POST['total'];
    $cate = $_POST['category_id'];
    $note = $_POST['note'];
    $description = $_POST['description'];
    $parameter = $_POST['parameter'];
    $img = $_FILES['images'];
    $view = 1;
    $maxSize = 800000;
    $upload = true;
    $dir = "../public/images/Product/";
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
        $check = "SELECT * FROM products WHERE name = '$name'";
        $cout = $conn->prepare($check);
        $cout->execute();
        if ($cout->rowCount() > 0) {
            $error = "Tên sản phẩm đã tồn tại";
        } else {
            try {
                action("INSERT INTO products (name,image,price,origin_price,note,category_id,description,total,parameter,views) VALUES 
                ('$name','$imgname','$price','$origin_price','$note','$cate','$description','$total','$parameter','$view')");
                header("Location:product.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<?php
include_once("header_qt.php");
?>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                <form action="" method="POST" id="addProduct" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Tên Sản Phẩm</label>
                                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Tên sản phẩm" required>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Giá Gốc</label>
                                        <input type="number" class="form-control" name="origin_price" id="" aria-describedby="helpId" placeholder="Theo %" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Giá Bán</label>
                                        <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="Giá" required>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="images" required>
                                            <label class="custom-file-label" for="customFile">Chọn File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea" placeholder="Place some text here" name="description" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                            <a href="https://github.com/summernote/summernote"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Số Lượng</label>
                                        <input type="number" class="form-control" name="total" id="" aria-describedby="helpId" placeholder="Số lượng" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Thông Số</label>
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea" placeholder="Place some text here" name="parameter" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                            <a href="https://github.com/summernote/summernote"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Danh Mục</label>
                                        <select class="form-control" name="category_id" id="" required>
                                            <?php
                                            foreach (selectDb("SELECT * FROM categories") as $row) { ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="col-sm-8" style="float: left;">
                                <div class="form-group">
                                    <label for="">Khuyến Mãi</label>
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            <textarea class="textarea" placeholder="Place some text here" name="note" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                        <a href="https://github.com/summernote/summernote"></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <button type="submit" name="addProduct" id="" class="btn btn-primary" btn-lg btn-block>Thêm Mới Sản Phẩm</button>
                                        <a name="" id="" class="btn btn-danger" href="product.php" role="button">Quay Lại</a>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</body>
<?php
include_once("footer_qt.php");
?>

</html>