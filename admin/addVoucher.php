<?php
include('../function.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['addVoucher'])) {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $discount_terms = $_POST['discount_terms'];
    $end_at = $_POST['end_at'];
    $active = $_POST['active'];
    $created_at = $_POST['created_at'];
    try{
        action("INSERT INTO vouchers (code,discount,discount_terms,end_at,active,created_at) VALUES 
        ('$code','$discount','$discount_terms','$end_at','$active','$created_at')");
        header("Location:voucher.php");
    }catch(PDOException $e){
        echo $e-> getMessage();
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
                            <h1 class="m-0 text-dark">Add Voucher</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Voucher</li>
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
                    <form action="" method="POST" id="addVoucher" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" class="form-control" name="code" id="" aria-describedby="helpId" placeholder="code" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input type="number" class="form-control" name="discount" id="" aria-describedby="helpId" placeholder="discount" required>
                                </div>  
                            </div>
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Discount-terms</label>
                                    <input type="number" class="form-control" name="discount_terms" id="" aria-describedby="helpId" placeholder="discount_terms" required>
                                </div>
                                <div class="form-group">
                                    <label for="">end_at</label>
                                    <input type="date" class="form-control" name="end_at" id="" aria-describedby="helpId" placeholder="discount_terms" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">     
                                </div>
                                <div class="form-group">
                                    <label for="">Active</label>        
                                    <select class="form-control"   name="active" id="">
                                            <option value="0">Còn hàng</option>
                                            <option value="1">Hết hàng</option>                                         
                                    </select>
                                </div>    
                            </div>
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button type="submit" name="addVoucher" id="" class="btn btn-primary" btn-lg btn-block">Thêm Mới Voucher</button>
                                    <a name="" id="" class="btn btn-danger" href="voucher.php" role="button">Quay Lại</a>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">
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