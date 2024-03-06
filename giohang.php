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
  if (isset($_SESSION['cart'])) {
  }


  ?>




  <div id="container">
    <?php
    if (isset($_SESSION['id_khachhang'])) {

    ?>
      <div class="arrow-steps clearfix">

        <div class="step current"> <span> <a href="giohang.php">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="vanchuyen.php">Xác nhận địa chỉ</a></span> </div>
        <div class="step"> <span><a href="thongtinthanhtoan.php">Hình thức thanh toán</a><span> </div>
      </div>

  </div>
<?php
    }
?>
<table class="table table-striped" id="giohang" style="width:95%;margin:0 auto;text-align:center;border-collapse:collapse!important" border=1>
  <tr>
    <th>Số thứ tự</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Xóa</th>
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

          <a style="text-decoration: none; font-size:20px" href="themgiohang.php?cong=<?php echo $cart_item['id'] ?>"> <i style="color:black" class="fas fa-plus fa-style"></i></a>
          <?php echo $cart_item['soluong'] ?>
          <a style="text-decoration: none;font-size:20px" href="themgiohang.php?tru=<?php echo $cart_item['id'] ?>"> <i style="color:black" class="fas fa-minus fa-style"></i></a>

        </td>
        <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . "vnđ" ?></td>
        <td><?php echo number_format($thanhtien, 0, ',', '.') . "vnđ" ?></td>
        <td><a class="xoa" href="themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fas fa-trash"></a></td>
      </tr>
    <?php
    }

    ?>
    <tr>
      <td colspan="8">
        <p style="float:right; font-size: 20px;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . " vnđ" ?></p>
        <p style="float:left"><a class="xoa" href="themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
        <div style="clear:both"> </div>
        <?php
        if (isset($_SESSION['dangky'])) {

        ?>
          <!-- <p><a class="xoa" href="thanhtoan.php">Đặt hàng</a></p> -->
          <p><a class="xoa" href="vanchuyen.php">Xác nhận địa chỉ</a></p>
        <?php
        } else {
        ?>
          <p><a class="xoa" href="dangki.php">Đăng ký để đặt hàng</a></p>
        <?php
        }
        ?>
      </td>

    </tr>
  <?php
  } else {
  ?>
    <tr>
      <td colspan="8">
        <!-- <p style="color:red; font-size:20px; margin-top:10px">Hiện tại giỏ hàng trống</p> -->
        <img src="img/img12.webp">
      </td>

    </tr>

  <?php

  }
  ?>
</table>



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