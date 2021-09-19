<?php
include_once("../function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgname = null;
    foreach (selectDb("SELECT * FROM categories WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $img = isset($row['image']) ? $row['image'] : '';
    }
    if (isset($_POST['updateCate'])) {
        $name_new = $_POST['name'];
        $icon_new =$_POST['icon'];
        if (isset($_FILES['image']) && $_FILES['image']['name']) {
            $img_new = $_FILES['image'];
            $maxSize = 800000;
            $upload = true;
            $dir = "../public/images/Categories/";
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
                action("UPDATE categories SET name='$name_new',image='$imgname',icon='$icon_new' WHERE id = '$id'");
                header("Location:categories.php");
            }
        } else {
            action("UPDATE categories SET name='$name_new',icon='$icon_new' WHERE id = '$id'");
            header("Location:categories.php");
        }
    }

    // foreach (selectDb("SELECT * FROM category WHERE id =" . $cate) as $item) {
    //     $cate_id = $item['name'];
    // }
} else {
    header("Location:categories.php");
}
?>
<!doctype html>
<html lang="en">
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
                        <h1 class="m-0 text-dark">Edit Category</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input type="text" class="form-control" name="icon" value="<?= $row['icon'] ?>" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" value="<?= $row['image'] ?>">
                                    <label class="custom-file-label" for="customFile">Chọn File</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" name="updateCate" id="" class="btn btn-success" btn-lg btn-block>Update</button>
                            <a name="" id="" class="btn btn-danger" href="categories.php" role="button">Quay Lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</body>

</html>
<?php
include_once("footer_qt.php");
?>