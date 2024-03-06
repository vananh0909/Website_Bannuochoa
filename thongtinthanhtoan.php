<?php
include("admin/config/config.php");

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="img/img8.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <title>Giỏ Hàng</title>
  <link rel="stylesheet" href="main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
</head>

<body style="background-color:f2f2f2!important;">
  <?php
  include('header.php')
  ?>


  <h2 style="color:#171414;margin-left:40px;"><span style="color:green"><?php if (isset($_SESSION['dangky'])) {
                                                                          echo $_SESSION['dangky'];
                                                                        } ?></span> <i class="fas fa-shopping-basket"></i> :</h2>
  <?php
  if (isset($_SESSION['cart']) && isset($_SESSION['dangky'])) {



  ?>
    <div class="arrow-steps clearfix">
      <div class="step done"> <span> <a href="giohang.php">Giỏ hàng</a></span> </div>
      <div class="step done"> <span><a href="vanchuyen.php">Xác nhận địa chỉ</a></span> </div>
      <div class="step current"> <span><a href="thongtinthanhtoan.php">Hình thức thanh toán</a><span> </div>
    </div>


    <form action="xlthanhtoan.php" method="POST">
      <div class="row">
        <?php
        $id_dangky =   $_SESSION['id_khachhang'];
        $sql_ship = mysqli_query($mysqli, "SELECT * FROM vanchuyen WHERE id_dangky = '$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_ship);
        if ($count > 0) {
          $sql_vanchuyen = mysqli_fetch_array($sql_ship);
          $ten_nguoinhan =  $sql_vanchuyen['ten_nguoinhan'];
          $sdt =  $sql_vanchuyen['sdt'];
          $diachi_nhan =  $sql_vanchuyen['diachi_nhan'];
          $ghichu = $sql_vanchuyen['ghichu'];
        } else {
          $ten_nguoinhan =  '';
          $sdt = '';
          $diachi_nhan = '';
          $ghichu =  '';
        }
        ?>

        <div class="col-md-8" style="margin-left: 23px;">
          <p style="margin-left:14px;  text-transform:uppercase;">Thông tin vận chuyển</p>
          <ul style="margin-right:20px;">
            <li style="text-transform:uppercase;padding-bottom:5px">Tên người nhận: <?php echo $ten_nguoinhan ?></li>
            <li style="text-transform:uppercase;padding-bottom:5px">Số điện thoại : <?php echo $sdt ?></li>
            <li style="text-transform:uppercase;padding-bottom:5px">Địa chỉ : <?php echo $diachi_nhan ?></li>
            <li style="text-transform:uppercase;padding-bottom:5px">Ghi chú : <?php echo $ghichu ?></li>
          </ul>
          <table class="table table-striped" id="giohang" style="width:100%;margin:0 auto;text-align:center;border-collapse:collapse!important">
            <tr>
              <th>Số thứ tự</th>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Giá sản phẩm</th>
              <th>Thành tiền</th>
            </tr>
            <?php
            if (isset($_SESSION['cart'])) {
              $i = 0;
              $tongtien = 0;
              foreach ($_SESSION['cart'] as $cart_item) {
                $thanhtien = ((int)$cart_item['soluong'] * (int)$cart_item['giasp']);
                $tongtien += $thanhtien;
                $i++;

            ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $cart_item['masp'] ?></td>
                  <td><?php echo $cart_item['tensanpham'] ?></td>
                  <td><img src="admin/modul/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="70px"></td>
                  <td>

                    <a style="text-decoration: none; font-size:20px" href="themgiohang.php?cong=<?php echo $cart_item['id'] ?>"> </a>
                    <?php echo $cart_item['soluong'] ?>
                    <a style="text-decoration: none;font-size:20px" href="themgiohang.php?tru=<?php echo $cart_item['id'] ?>"></a>

                  </td>
                  <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . "vnđ" ?></td>
                  <td><?php echo number_format($thanhtien, 0, ',', '.') . "vnđ" ?></td>

                </tr>
              <?php
              }

              ?>
              <tr>
                <td colspan="8">
                  <p style="float:right; font-size: 20px;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . " vnđ" ?></p>
                  <div style="clear:both"> </div>

                </td>

              </tr>

            <?php

            }
            ?>
          </table>
        </div>
        <div style="margin-left: 40px;" class="col-md-3">
          <p style="text-transform:uppercase;">Hình thức thanh toán</p>
          <div class="form-check" style="padding-bottom:5px">
            <input class="form-check-input" type="radio" name="thanhtoan" id="flexRadioDefault1" value="thanhtoankhinhanhang">
            <img src="img/img15.png" width="32px" height="32px">
            <label class="form-check-label" for="flexRadioDefault1">
              Thanh toán khi nhận hàng
            </label>
          </div>
          <div class="form-check" style="padding-bottom:5px">
            <input class="form-check-input" type="radio" name="thanhtoan" id="flexRadioDefault2" value="thanhtoanbangthe">
            <img src="img/img16.png" width="32px" height="32px">
            <label class="form-check-label" for="flexRadioDefault2">
              Thanh toán bằng thẻ
            </label>
          </div>
    </form>

    <!-- </form> -->
    <div style="padding-bottom: 5px;">
      <form method="POST" target="_blank" action="thanhtoanmomo.php" enctype="application/x-www-form-urlencoded">
        <input type="submit" name="momo" value="Quét mã thanh toán MOMO " class="btn btn-light">
      </form>
    </div>


    <div style="padding-bottom:20px;"><button id="dathang" class="btn btn-light" name="dathang">Đặt hàng</button></div>
    </div>
    </div>

  <?php
  }
  ?>
  </div>
  </div>

  <div>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger chat-title="Q&A" agent-id="546c6eb8-5f15-47f9-9932-a46a47f38d43" language-code="en" chat-icon="img/qa.png"></df-messenger>

  </div>

  <!-- Footer -->
  <?php
  include('footer.php')
  ?>

  <script src="main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>