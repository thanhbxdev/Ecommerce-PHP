<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" style="padding: 0px; background-color: white;">
        <footer>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12" style="float: left;" id="nav">
                            <div class="col-md-3" style="float: left;">
                                <ul>
                                    <li>
                                        <a href="#">Giới thiệu về công ty</a>
                                    </li>
                                    <li>
                                        <a href="#">Câu hỏi khi mua hàng</a>
                                    </li>
                                    <li>
                                        <a href="#">Chính sách bảo mật</a>
                                    </li>
                                    <li>
                                        <a href="#">Quy chế hoạt động</a>
                                    </li>
                                    <li>
                                        <a href="#">Kiểm tra hóa đơn điện tử</a>
                                    </li>
                                    <li>
                                        <a href="#">Tra cứu thông tin bảo hành</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Md 3  -->
                            <div class="col-md-3" style="float: left;">
                                <ul>
                                    <li>
                                        <a href="#">Tin tuyển dụng</a>
                                    </li>
                                    <li>
                                        <a href="#">Tin khuyến mãi</a>
                                    </li>
                                    <li>
                                        <a href="#">Hướng dẫn mua online</a>
                                    </li>
                                    <li>
                                        <a href="#">Hướng dẫn mua trả góp</a>
                                    </li>
                                    <li>
                                        <a href="#">Chính sách trả góp</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Md 3  -->
                            <div class="col-md-3" style="float: left;">
                                <ul>
                                    <li>
                                        <a href="#">Hệ thống cửa hàng</a>
                                    </li>
                                    <li>
                                        <a href="#">Hệ thống bảo hành</a>
                                    </li>
                                    <li>
                                        <a href="#">Kiểm tra Apple chính hãng</a>
                                    </li>
                                    <li>
                                        <a href="#">Giới thiệu máy đổi trả</a>
                                    </li>
                                    <li>
                                        <a href="#">Chính sách đổi trả</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Md 3  -->
                            <div class="col-md-3" style="float: left;">
                                <ul>
                                    <li>
                                        <span>Tư vấn mua hàng (Miễn phí)</span>
                                    </li>
                                    <li>
                                        <a href="#" style="color:#cd1817;">
                                            <h4><b>0868 666 888</b></h4>
                                        </a>
                                        <!-- <a href="#" style="color:#cd1817;">0868 666 888</a> -->
                                    </li>
                                    <li>
                                        <span>Góp ý khiếu nại dịch vụ</span>
                                    </li>
                                    <li>
                                        <a href="#" style="color: #cd1817;">
                                            <h4><b>0888 686 868</b></h4>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav Md 3  -->
                        </div>
                    </div>
                    <!-- End Row Nav  -->
                    <div class="row" id="coppyright" style="text-align: center; background-color: #f2f2f2;">
                        <div class="col-md-12">
                            <span style="text-align: center; font-size: 10px;">
                            <?php
                            include_once("function.php");
                            foreach(selectDb("SELECT * FROM info")as $row){
                            ?> 
                            <?=$row['name']?>/ Địa chỉ: <?=$row['address']?> / Điện thoại: <?=$row['phone']?>. Email:<?=$row['email']?>.Chịu trách nhiệm nội dung: <?=$row['coppyright']?>.
                            <?php
                            }
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>