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
  <link href="img/img4.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <title>Liên hệ</title>
  <link rel="stylesheet" href="lienhe.css">
  <link rel="stylesheet" href="main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body>
  <?php
  include('header.php')
  ?>

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/bia.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/img2.jpg" class="d-block w-100" alt="...">
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <main>

    <div class="container">
      <div class="trai">
        <h2 class="text2"><span>GP</span></h2>
        <p class="text3">GP được thành lập vào năm 2021, hiện đang là nhà phân phối chính hãng của các nhãn hàng lớn như
          Versace, Creed, Salvatore Ferragamo, Carolina Herrera, Jean Paul Gaultier v..v
          Tại GP, tất cả sản phẩm đều là hàng chính hãng và khách hàng sẽ được hậu mãi ở mức cao nhất.</p>
        <div class="item">
          <h3 class="text2">
            Cửa hàng chính
          </h3>
          <p class="text3"><i class="fa fa-map-marker" style="color:gray"></i> Ấp Hòa Đức, xã Hòa An, huyện Phụng Hiệp,
            tỉnh Hậu Giang</p>

          <p class="text3"><i class="fa fa-phone" style="color:gray"></i> <a style="text-decoration:none;" href="">
              0123456789</a></p>


          <p class="text3"><i class="fa fa-envelope" style="color:gray"></i> <a style="text-decoration:none;" href="#">
              anhb2014814@gmail.com
            </a></p>

        </div>

        <div>
          <div id="login">
            <h3 class="text2"> Gửi tin nhắn cho chúng tôi</h3>
          </div>
          <div style="margin-left:120px" class="col-md-4">
            <form id="signupForm" class="vanchuyen" action="" autocomplete="off" method="POST">
              <?php

              if (isset($_POST['guiph'])) {
                if (!isset($_SESSION['dangky'])) {
                  echo "<script>
      Swal.fire({
      
        icon: 'error',
        title: 'Xin lỗi! Bạn cần đăng nhập để gửi.',
        showConfirmButton: false,
        timer: 1500
        })</script>";
                } else {
                  $tenph = $_POST['tenph'];
                  $sdtph = $_POST['sdtph'];
                  $emailph = $_POST['emailph'];
                  $noidungph = $_POST['noidungph'];
                  $id_kh =   $_SESSION['id_khachhang'];

                  $sql_phanhoi = mysqli_query($mysqli, "INSERT INTO phanhoi(tenph,sdtph,emailph,noidungph,id_kh) 
  VALUE('" . $tenph . "','" . $sdtph . "','" . $emailph . "','" . $noidungph . "','" . $id_kh . "')");
                  if ($sql_phanhoi) {
                    echo "<script>
        Swal.fire({
        
          icon: 'success',
          title: 'Gửi tin nhắn thành công!',
          showConfirmButton: false,
          timer: 1500
          })</script>";
                  }
                }
              }    ?>
              <div class="mb-3">
                <label style="float:left;padding-top:10px" class="form-label">Tên khách hàng: </label>
                <input type="text" class="form-control" id="tenph" name="tenph">
              </div>
              <div class="mb-3">
                <label style="float:left" class="form-label">Số điện thoại: </label>
                <input type="text" class="form-control" id="sdtph" name="sdtph">
              </div>
              <div class="mb-3">
                <label style="float:left" class="form-label">Email: </label>
                <input type="email" class="form-control" id="emailph" name="emailph">
              </div>
              <div class="mb-3">
                <label style="float:left" class="form-label">Ghi chú: </label>
                <textarea type="text" class="form-control" id="noidungph" name="noidungph"></textarea>
              </div>

              <button type="submit" class="btn btn-light" name="guiph">Gửi tin nhắn</button>
            </form>
          </div>

          <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62910.86404648022!2d105.59758077670818!3d9.772075072302089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0f1a704ed5033%3A0x2653701cfe37b05e!2zSMOyYSBBbiwgUGjhu6VuZyBIaeG7h3AsIEjhuq11IEdpYW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1672574484813!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
  </main>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery.validate.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#signupForm").validate({
        rules: {

          tenph: {
            required: true,
            minlength: 2
          },
          sdtph: {
            required: true,
            minlength: 8

          },

          emailph: {
            required: true,
            email: true
          },
          noidungph: {
            required: true,
            minlength: 8
          }
        },
        messages: {
          tenph: {
            required: "Bạn chưa nhập vào tên đăng nhập.",
            minlength: "Tên đăng nhập phải có ít nhất 2 ký tự."
          },
          sdtph: {
            required: "Bạn chưa nhập số điện thoại",
            minlength: "Vui lòng nhập đầy đủ số điện thoại."
          },
          noidungph: {
            required: "Bạn cần điền nội dung tin nhắn.",
            minlength: "Vui lòng nhập đầy đủ số điện thoại."
          },
          emailph: "Email không hợp lệ"


        },
        errorElement: "div",
        errorPlacement: function(error, element) {
          error.addClass("invalid-feedback");
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.siblings("label"));
          } else {
            error.insertAfter(element);
          }
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
      });
    });
  </script>
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