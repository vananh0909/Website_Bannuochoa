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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color:f2f2f2!important;">
  <?php
  include('header.php')
  ?>



  <h2 style="color:#171414;margin-left:40px;"> <span style="color:green"><?php if (isset($_SESSION['dangky'])) {
                                                                            echo $_SESSION['dangky'];
                                                                          } ?></span> <i class="fas fa-shopping-basket"></i> :</h2>
  <?php
  if (isset($_SESSION['cart']) && isset($_SESSION['dangky'])) {



  ?>

    <div style="margin-left:35px;" class="arrow-steps clearfix">
      <div class="step done "> <span> <a href="giohang.php">Giỏ hàng</a></span> </div>
      <div class="step current"> <span><a href="vanchuyen.php">Xác nhận địa chỉ</a></span> </div>
      <div class="step"> <span><a href="thongtinthanhtoan.php">Hình thức thanh toán</a><span> </div>
    </div>

    <h3 style="margin-left:35px;  text-transform:uppercase;font-size:20px">Xác nhận thông tin địa chỉ</h3>
    <?php
    if (isset($_POST['them'])) {
      $ten_nguoinhan = $_POST['ten_nguoinhan'];
      $sdt = $_POST['sdt'];
      $diachi_nhan = $_POST['diachi_nhan'];
      $ghichu = $_POST['ghichu'];
      $id_dangky =   $_SESSION['dangky'];
      $sql_them = mysqli_query($mysqli, "INSERT INTO vanchuyen(ten_nguoinhan,sdt,diachi_nhan,ghichu,id_dangky)
  VALUE('" . $ten_nguoinhan . "','" . $sdt . "','" . $diachi_nhan . "','" . $ghichu . "','" . $id_dangky . "') ");
      if ($sql_them) {
        echo "<script>
    Swal.fire({
    
      icon: 'success',
      title: 'Thêm thông tin thành công!',
      showConfirmButton: false,
      timer: 1500
      })</script>";
      }
    } elseif (isset($_POST['capnhat'])) {
      $ten_nguoinhan = $_POST['ten_nguoinhan'];
      $sdt = $_POST['sdt'];
      $diachi_nhan = $_POST['diachi_nhan'];
      $ghichu = $_POST['ghichu'];
      $id_dangky =   $_SESSION['id_khachhang'];
      $sql_capnhat = mysqli_query($mysqli, "UPDATE vanchuyen SET
   ten_nguoinhan = '$ten_nguoinhan',sdt='$sdt',diachi_nhan='$diachi_nhan',ghichu='$ghichu',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
      if ($sql_capnhat) {
        echo "<script>
    Swal.fire({
    
      icon: 'success',
      title: 'Cập nhật thông tin thành công!',
      showConfirmButton: false,
      timer: 1500
      })</script>";
      }
    }

    ?>
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


    <div style="margin: 0 auto;padding-top:30px;" class="col-md-4">
      <form class="vanchuyen" action="" autocomplete="off" method="POST">
        <div class="mb-3">
          <label class="form-label">Tên người nhận: </label>
          <input type="text" class="form-control" name="ten_nguoinhan" value="<?php echo $ten_nguoinhan ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Số điện thoại: </label>
          <input type="text" class="form-control" name="sdt" value="<?php echo $sdt ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa chỉ nhận: </label>
          <input type="text" class="form-control" name="diachi_nhan" value="<?php echo $diachi_nhan ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Ghi chú: </label>
          <textarea type="text" class="form-control" name="ghichu"><?php echo $ghichu ?></textarea>
        </div>

        <?php
        if ($ten_nguoinhan == '' && $sdt == '') {
        ?>
          <button type="submit" class="btn btn-light" id="capnhat" name="them">Thêm địa chỉ</button>
        <?php
        } elseif ($ten_nguoinhan != '' && $sdt != '') {
        ?>
          <button type="submit" class="btn btn-light" id="capnhat" name="capnhat">Cập nhật</button>
        <?php
        }
        ?>
        <a href="thongtinthanhtoan.php" class="btn btn-light" id="capnhat" style="margin-left:250px">Tiếp theo</a>
      </form>


    <?php
  }

    ?>

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
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>