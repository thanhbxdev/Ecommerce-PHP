<?php
include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM products WHERE id = '$id'");
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
                        <h1 class="m-0 text-dark">Product</h1>
                        <a name="" id="" class="btn btn-info" href="addPrd.php" role="button" style="margin-top: 20px;">Thêm Sản Phẩm</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Ghi Chú</th>
                            <th scope="col">Thông số</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Danh Mục</th>
                            <th scope="col">Quản Lí</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        foreach (selectDb("SELECT * FROM products") as $row) {
                            $id_cate = $row['category_id'];
                            foreach (selectDb("SELECT * FROM categories WHERE id='$id_cate'") as $tow) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $stt += 1 ?></th>
                                    <td><?= $row['name'] ?></td>
                                    <td><img src="../public/images/Product/<?= $row['image'] ?>" alt="" width="50"></td>
                                    <td><?= number_format($row['origin_price']) ?></td>
                                    <td><?= number_format($row['price']) ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['parameter'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $tow['name'] ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-primary" href="editPrd.php?id=<?= $row['id'] ?>" role="button">Update</a>
                                        <a name="" id="" class="btn btn-warning" href="product.php?id=<?= $row['id'] ?>" role="button" onclick="return confirm('Bạn muốn xóa mục này?')">Xóa</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</body>
<?php
include_once("footer_qt.php");
?>

</html>