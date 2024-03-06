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
  <link href="img/user.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <title>Trang cá nhân</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="gioithieu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">



</head>

<body style="  background-color: #fff!important;">
  <?php
  include('header.php')
  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
        <h2 style="text-align:center">Trang cá nhân</h2>
        <div class="card " style="margin-top: 20px;">
          <div class="card-header">
            <?php
            if (isset($_SESSION['dangky'])) {
              $dki = $_SESSION['id_khachhang'];
              $sql_lietke = "SELECT * FROM  dangky WHERE id_dangky = '" . $dki . "' LIMIT 1";
              $lietke = mysqli_query($mysqli, $sql_lietke);
              while ($row = mysqli_fetch_array($lietke)) {
            ?>
                <table class="table table-striped" style="width:95%;margin-bottom: 20px;margin-left:20px; border-collapse:collapse;">
                  <thead>
                    <tr>

                      <th scope="col">Thông tin</th>
                      <th scope="col"> </th>
                      <th scope="col">Chi tiết</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ID </td>
                      <td>:</td>
                      <td><?php echo $row['id_dangky'] ?></td>
                    </tr>
                    <tr>
                      <td>Tên đăng nhập </td>
                      <td>:</td>
                      <td><?php echo $row['tenkhachhang'] ?> </td>
                    </tr>
                    <tr>
                      <td>Số điện thoại </td>
                      <td>:</td>
                      <td><?php echo $row['dienthoai'] ?> </td>
                    </tr>
                    <tr>
                      <td>Email </td>
                      <td>:</td>
                      <td><?php echo $row['email'] ?> </td>
                    </tr>
                    <tr>
                      <td>Địa chỉ </td>
                      <td>:</td>
                      <td><?php echo $row['diachi'] ?> </td>
                    </tr>
                  </tbody>
                </table>
                <a href="suauser.php" style="margin-left:350px" type="button" class="btn btn-outline-success" name="suathongtin">Sửa thông tin</a>
              <?php
              }
            } else {
              ?>
              <p style="text-align: center;padding-top:140px;font-size:20px">Không có thông tin người dùng! </p>
              <p style="text-align: center;padding-bottom:140px;"> <img width="200px" src="img/user-xmark-svgrepo-com.svg"></p>

            <?php
            }
            ?>
          </div>
          <div class="card-header">
            <p style="font-weight: bold;"> <i class="fas fa-history"></i> Lịch sử mua hàng</p>
            <?php
            if (isset($_SESSION['dangky'])) {
              $dki = $_SESSION['id_khachhang'];
              $sql_lietke_dh = "SELECT * FROM  donhang, giohang ,qlsanpham WHERE giohang.madonhang=donhang.ma_cart
              AND  giohang.id_khachhang ='" . $dki . "' AND donhang.id_sanpham=qlsanpham.id_sanpham  ORDER BY  donhang.id_cart DESC";
              $lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
            ?>
              <table class="table table-striped" style="width:100%;margin-bottom: 20px;  border-collapse:collapse;">
                <tr>
                  <th>STT</th>
                  <th>Ngày đặt</th>
                  <th>Mã đơn</th>
                  <th>Sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Số lượng</th>
                  <th>Giá</th>
                  <th>Thanh toán</th>
                  <th>Thành tiền</th>
                </tr>
                <?php
                $i = 0;
                $tongtien = 0;
                $madonhang_truoc = null;

                while ($row = mysqli_fetch_array($lietke_dh)) {
                  $i++;
                  $thanhtien = $row['giasp'] * $row['soluongmua'];

                  // Kiểm tra xem mã đơn hàng của sản phẩm hiện tại có giống với sản phẩm trước đó hay không
                  if ($row['madonhang'] != $madonhang_truoc) {
                    // Nếu khác, hiển thị thông tin đầy đủ của đơn hàng và sản phẩm, và tính toán tổng tiền của các sản phẩm trước đó
                    if ($madonhang_truoc != null) {
                ?>
                      <tr>
                        <td colspan="8" style="text-align:right;font-weight: bold;">Tổng tiền:</td>
                        <td style="font-weight: bold;"><?php echo number_format($tongtien, 0, ',', '.') . "vnđ" ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row['ngay_dathang'] ?></td>
                      <td><?php echo $row['madonhang'] ?></td>
                      <td><?php echo $row['tensanpham'] ?></td>
                      <td><img src="admin/modul/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="70px"></td>
                      <td><?php echo $row['soluongmua'] ?></td>
                      <td><?php echo number_format($row['giasp'], 0, ',', '.') . "vnđ" ?></td>
                      <td><?php echo $row['hthuc_ttoan'] ?></td>
                      <td><?php echo number_format($thanhtien, 0, ',', '.') . "vnđ" ?> </td>
                    </tr>
                  <?php
                    $tongtien = $thanhtien;
                    $madonhang_truoc = $row['madonhang'];
                  } else {
                    // Nếu giống, chỉ tính toán thành tiền của sản phẩm và không hiển thị cột tổng tiền
                    $tongtien += $thanhtien;
                  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><?php echo $row['tensanpham'] ?></td>
                      <td><img src="admin/modul/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="70px"></td>
                      <td><?php echo $row['soluongmua'] ?></td>
                      <td><?php echo number_format($row['giasp'], 0, ',', '.') . "vnđ" ?></td>
                      <td></td>
                      <td><?php echo number_format($thanhtien, 0, ',', '.') . "vnđ" ?> </td>
                    </tr>
                  <?php
                  }
                }
                // Hiển thị tổng tiền của các sản phẩm cuối cùng trong đơn hàng
                if ($madonhang_truoc != null) {
                  ?>
                  <tr>
                    <td colspan="8" style="text-align:right;font-weight: bold;">Tổng tiền:</td>
                    <td style="text-align:right;font-weight: bold;"><?php echo number_format($tongtien, 0, ',', '.') . "vnđ" ?></td>
                  </tr>
                <?php
                }
                ?>
              </table>
            <?php
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  </main>


  <div>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger chat-title="Q&A" agent-id="546c6eb8-5f15-47f9-9932-a46a47f38d43" language-code="en" chat-icon="img/qa.png"></df-messenger>

  </div>

  <!-- Footer -->
  <?php
  // include('footer.php')
  ?>

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</html>