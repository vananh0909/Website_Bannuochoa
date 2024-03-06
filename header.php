<header>
  <div id="wrapper">
    <div id="header">
      <div id="toggle">
        <i class="fas fa-bars"></i>
      </div>

      <nav>
        <?php
        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
          unset($_SESSION['dangky']);
        }
        ?>

        <ul id="main-menu">
          <li class="imglogo">
            <img class="img1" src="img/img1.jpg">
          </li>
          <li>
            <a href="trangchu.php">Trang chủ</a>
          </li>
          <li>
            <a href="gioithieu.php">Giới thiệu</a>
          </li>
          <li>
            <a href="sanpham.php">Sản phẩm</a>
          </li>
          <?php
          if (isset($_SESSION['dangky'])) {
          ?>
            <li>
              <a href="dangki.php?dangxuat=1"> Đăng xuất
                <!-- <i class="fas fa-sign-out-alt"></i> -->
              </a>
            </li>


          <?php
          } else {
          ?>
            <li>
              <a href="dangki.php">Đăng Ký</a>
            </li>
          <?php
          }
          ?>
          <li>
            <a href="dangnhap.php">Đăng Nhập</a>
          </li>
          <!-- <li>
							<a href="giohang.php">Giỏ Hàng</a>
						</li> -->
          <li>
            <a href="lienhe.php">Liên Hệ</a>
          </li>

          <li class="search">

            <div class="container-fluid" style="margin-right: 50px;">
              <form class="d-flex" role="search" action="timkiem.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Tìm sản phẩm" aria-label="Search" name="tukhoa">
                <button class="btn btn-outline-success" name="timkiem" type="submit"><i class="fas fa-search"></i></button>
              </form>
            </div>
            <div class="cart">
              <div>
          <li>
            <a style="padding-left:0px;padding-right:0" href="giohang.php"> <i class="fas fa-cart-plus"></i></a>
          </li>

          <li>
            <a style="padding-left:0px;" href="user.php"><i style="font-size: 25px;padding-left:15px" class="fas fa-user"></i></a>
          </li>
    </div>
  </div>
  </li>
  </ul>

  </nav>
  </div>
  </div>

</header>