<?php
include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgname = null;
    foreach (selectDb("SELECT * FROM products WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $img = isset($row['image']) ? $row['image'] : '';
        $price = isset($row['price']) ? $row['price'] : '';
        $origin_price = isset($row['origin_price']) ? $row['origin_price'] : '';
        $note = isset($row['note']) ? $row['note'] : '';
        $cate_id = isset($row['category_id']) ? $row['category_id'] : '';
        $description = isset($row['description']) ? $row['description'] : '';
        $total = isset($row['total']) ? $row['total'] : '';
        $parameter = isset($row['parameter']) ? $row['parameter'] : '';
    }
    if (isset($_POST['UpdateProduct'])) {
        $name_new = $_POST['name'];
        $price_new = $_POST['price'];
        $origin_price_new = $_POST['origin_price'];
        $total_new = $_POST['total'];
        $note_new = $_POST['note'];
        $description_new = $_POST['description'];
        $parameter_new = $_POST['parameter'];
        $category = $_POST['categories'];
        if (isset($_FILES['images']) && $_FILES['images']['name']) {
            $img_new = $_FILES['images'];
            $maxSize = 800000;
            $upload = true;
            $dir = "../public/images/Product/";
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
                $imgname = $img_new['name'];
                move_uploaded_file($img_new['tmp_name'], $dir . $imgname);
                $sqlUpdate = "UPDATE products SET name='$name_new', price= '$price_new',origin_price='$origin_price_new',total = '$total_new',
                    note='$note_new',description='$description_new',parameter='$parameter_new',image='$imgname',category_id='$category' WHERE id = '$id'";
                action($sqlUpdate);
                header("Location:product.php");
            }
        } else {
            $sqlUpdate = "UPDATE products SET name='$name_new', price= '$price_new',origin_price='$origin_price_new',total = '$total_new',
            note='$note_new',description='$description_new',parameter='$parameter_new',category_id='$category' WHERE id = '$id'";
            action($sqlUpdate);
            //    echo $sqlUpdate;die;
            header("Location:product.php");
        }
    }
} else {
    header("Location:product.php");
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
                        <h1 class="m-0 text-dark">Edit Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                <form action="" method="POST" id="UpdateProduct" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12" style="float: left;">
                                <div class="col-sm-8" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Tên Sản Phẩm</label>
                                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="<?= $row['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Giá Gốc</label>
                                        <input type="number" class="form-control" name="origin_price" id="" aria-describedby="helpId" value="<?= $row['origin_price'] ?>">
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
                                        <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" value="<?= $row['price'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="images" value="<?= $img ?>">
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
                                        <label for="">Ghi Chú</label>
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $row['description'] ?></textarea>
                                            </div>
                                            <a href="https://github.com/summernote/summernote"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Số Lượng</label>
                                        <input type="number" class="form-control" name="total" id="" aria-describedby="helpId" value="<?= $row['total'] ?>">
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
                                                <textarea class="textarea" placeholder="Place some text here" name="parameter" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $row['parameter'] ?></textarea>
                                            </div>
                                            <a href="https://github.com/summernote/summernote"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <div class="form-group">
                                        <label for="">Danh Mục</label>
                                        <select class="form-control" name="categories" id="">
                                            <?php foreach (selectDb("SELECT * FROM categories") as $tow) : ?>
                                                <?php if ($tow['id'] == $cate_id) : ?>
                                                    <option selected value="<?= $row['id'] ?>"><?= $tow['name'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $tow['id'] ?>"><?= $tow['name'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach; ?>
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
                                                <textarea class="textarea" name="note" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $row['note'] ?></textarea>
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
                                        <button type="submit" name="UpdateProduct" id="" class="btn btn-primary" btn-lg btn-block>Update Sản Phẩm</button>
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