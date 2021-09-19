<?php
include('../function.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgname = null;
    foreach (selectDb("SELECT * FROM vouchers WHERE id = '$id'") as $row) {
        $code = isset($row['code']) ? $row['code'] : '';
        $discount = isset($row['discount']) ? $row['discount'] : '';
        $discount_terms = isset($row['discount_terms']) ? $row['discount_terms'] : '';
        $end_at = isset($row['end_at']) ? $row['end_at'] : '';
        $updated_at = isset($row['updated_at']) ? $row['updated_at'] : '';
    }
    if (isset($_POST['editVoucher'])) {
        $code_new = $_POST['code'];
        $discount_new = $_POST['discount'];
        $discount_terms = $_POST['discount_terms'];
        $end_at = $_POST['end_at'];
        $updated_at = $_POST['updated_at'];
       
                action("UPDATE vouchers SET code='$code_new',discount='$discount_new',discount_terms='$discount_terms',end_at='$end_at',updated_at='$updated_at' WHERE id = '$id'");
                header("Location:voucher.php");
          
      
        }
    
    } else {
    header("Location:category.php");
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
                            <h1 class="m-0 text-dark">Edit Voucher</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Edit Voucher</li>
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
                <form action="" method="POST" id="editVoucher" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" class="form-control" value="<?= $row['code'] ?>" name="code" id="" aria-describedby="helpId" placeholder="code" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input type="number" class="form-control" value="<?= $row['discount'] ?>" name="discount" id="" aria-describedby="helpId" placeholder="discount" required>
                                </div>  
                            </div>
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Discount-terms</label>
                                    <input type="number" class="form-control" value="<?= $row['discount_terms'] ?>" name="discount_terms" id="" aria-describedby="helpId" placeholder="discount_terms" required>
                                </div>
                                <div class="form-group">
                                    <label for="">end_at</label>
                                    <input type="datetime-local" class="form-control" value="<?= $row['end_at'] ?>" name="end_at" id="" aria-describedby="helpId" placeholder="discount_terms" required>
                                </div>
                                 
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Active</label>        
                                    
                                    <?php 
                                    if(isset($row['active'])){
                                        if($row['active'] == 0){
                                                echo"<select class='form-control' name='active' id=''>
                                                <option value='0'selected='selected'>Hết hàng</option>
                                                <option value='1'>Còn hàng</option>  
                                            </select>";
                                        }else if($row['active'] == 1){
                                            echo"<select class='form-control' name='active' id=''>
                                                <option value='0'>Hết hàng</option>
                                                <option value='1'selected='selected'>Còn hàng</option>  
                                            </select>";
                                        }
                                    }
                                    ?>
                                </div>  
                                <div class="form-group">
                                    <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s') ?>">
                                </div>
                            </div>
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button type="submit" name="editVoucher" id="" class="btn btn-primary" btn-lg btn-block">Cập nhật voucher</button>
                                    <a name="" id="" class="btn btn-danger" href="voucher.php" role="button">Quay Lại</a>
                                </div>
                               
                            </div>
                           
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2001-2020<a href="http://adminlte.io"> Admin T Luxury</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>