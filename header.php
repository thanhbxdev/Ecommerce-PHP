<?php
ob_start();
session_start();
require_once("function.php");
?>
<!doctype html>
<html lang="en">

<head>
  <title>TV Shop</title>
  <link rel="stylesheet" href="public/css/style.css">
  <script src="https://use.fontawesome.com/4c2e91dcf3.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid" style="padding: 0px;">
    <header>
      <div class="row" id="hdtop">
        <div class="col col-md-2" id="tlogo">
          <a href="index.php">
            <img src="public/images/logo.png" alt="Ảnh chưa hiển thị" width="150" height="40">
          </a>
        </div>
        <!-- End Logo  -->
        <div class="col col-md-6 " id="tsearch" style="padding: 0px;">
          <form action="search.php" method="POST">
            <input type="text" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên điện thoại,máy tính,phụ kiện.....cần tìm" style="outline: none;">
            <button type="submit" name="search"><i class="fa fa-search" aria-hidden="true" style="color: white;"></i></button>
          </form>
        </div>
        <!-- End Search  -->
        <div class="col col-md-4 " id="hdmn">
          <ul>
            <?php
            if (isset($_SESSION['admin'])) {
               $email=$_SESSION['admin'];
              foreach(selectDb("SELECT * FROM users WHERE email = '$email'")as $row){

              }
            ?>
              <li>
                <a href="admin/index.php">
                  <i class="fa fa-heart fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Quản Trị</span>
                </a>
              </li>
              <li>
                <a href="sigout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">
                  <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Đăng Xuất</span>
                </a>
              </li>
              <li>
                <a href="profile.php?email=<?=$_SESSION['admin']?>">
                  <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span><?=$row['name']?></span>
                </a>
              </li>
            <?php
            } elseif (isset($_SESSION['user'])) {
              $email=$_SESSION['user'];
              foreach(selectDb("SELECT * FROM users WHERE email = '$email'")as $row){

              }
            ?>
              <li>
                <a href="sigout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">
                  <i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Đăng Xuất</span>
                </a>
              </li>
              <li>
                <a href="add-cart.php">
                  <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Giỏ Hàng</span>
                </a>
              </li>
              <li>
                <a href="profile.php?email=<?=$email?>">
                  <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span><?=$row['name']?></span>
                </a>
              </li>
            <?php
            } else {
            ?>
              <li>
                <a href="sigin.php">
                  <i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Đăng Nhập</span>
                </a>
              </li>
              <li>
                <a href="sigup.php">
                  <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Đăng Kí</span>
                </a>
              </li>
              <li>
                <a href="sigin.php" onclick="return alert('Bạn phải đăng nhập mới xem được giỏ hàng !')">
                  <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Giỏ Hàng</span>
                </a>
              </li>
              <li>
                <a href="sigin.php" onclick="return alert('Bạn phải đăng nhập mới xem được thông tin !')">
                  <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                  <span><br></span>
                  <span>Thông Tin</span>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <!-- End Header Menu  -->
      </div>
      <!-- End Heder Top  -->
      <div class="row" id="hdmenu">
        <div class="col-sm-12">
          <ul>
            <?php
            foreach (selectDb("SELECT * FROM categories ORDER BY id ASC LIMIT 0,7") as $row) {
            ?>
              <li>
                <a href="productall.php?id=<?= $row['id'] ?>">
                  <i class="<?= $row['icon'] ?>" aria-hidden="true"></i>
                  <span><?= $row['name'] ?></span>
                </a>
              </li>
            <?php
            }
            ?>
            <li>
              <a href="khuyenmai.php">
                <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                <span>KHUYẾN MÃI</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- End Header Bottom -->
    </header>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>