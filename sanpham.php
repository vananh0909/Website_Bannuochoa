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
  <link href="img/img3.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <title>Sản phẩm</title>
  <link rel="stylesheet" href="sanpham.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="chitietsp.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">


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


    <div class="wrapperr">

      <div class="container text-center">
        <div class="row g-2">
          <?php
          $sql = "SELECT * FROM danhmucsp";
          $sua = mysqli_query($mysqli, $sql);
          while ($dong = mysqli_fetch_array($sua)) {
          ?>
            <div class="col-5">

              <div class="p-4" id="nchoa">
                <a class="color" style="text-decoration: none!important; " href="sanpham.php?quanly=danhmucsp&id=<?php echo $dong['id'] ?>"><?php echo $dong['tensp'] ?></a>
              </div>

            </div>
          <?php
          }
          ?>


        </div>
      </div>


      <div class="sanphams">

        <h3 class="fullsp">TẤT CẢ SẢN PHẨM</h3>


      </div>

      <ul class="lists">
        <?php
        if (isset($_GET['trang'])) {
          $page = $_GET['trang'];
        } else {
          $page = '';
        }
        if ($page == '' || $page == 1) {
          $begin = 1;
        } else {
          $begin = ($page * 20) - 20;
        }


        $sql_lietke_sp = "SELECT * FROM qlsanpham LIMIT $begin,20 ";
        if (isset($_GET['id'])) {
          $sql_lietke_sp = "SELECT * FROM qlsanpham WHERE qlsanpham.id_danhmuc='$_GET[id]' ORDER BY qlsanpham.id_sanpham";
        }

        $lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
        if (isset($_GET['quanly'])) {
          $file = $_GET['quanly'];
        } else {
          $file = "";
        }
        if ($file == 'sp') {
          include("chitetsp.php");
        } elseif ($file == 'thanhtoan') {
          include("thanhtoan.php");
        }

        $i = 0;
        while ($row = mysqli_fetch_array($lietke_sp)) {


          $i++;

        ?>
          <li class="li">
            <a href="sanpham.php?quanly=sp&id=<?php echo $row['id_sanpham'] ?>">
              <div class="list-item">
                <div class="list-top">
                  <a class="list-img">
                    <img src="admin/modul/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="180px">

                  </a>

                  <!--mua ngay-->

                  <a class="buy-now" href="sanpham.php?quanly=sp&id=<?php echo $row['id_sanpham'] ?>">Xem chi tiết</a>
                </div>
                <div class="list-info">
                  <a href="" class="list-name"><?php echo $row['tensanpham'] ?></a>
                  <div class="list-money">Giá: <?php echo number_format($row['giasp'], 0, ',', '.') . "vnđ" ?></div>
                </div>
              </div>
          </li>
          </a>

        <?php

        }
        ?>
      </ul>

      <!-- phân trang -->

      <div class="container">
        <?php
        $row_count = mysqli_num_rows($lietke_sp);
        $trang = ceil($row_count / 10);

        ?>
        <ul class="pagination justify-content-center">
          <?php
          for ($i = 1; $i <= $trang; $i++) {


          ?>

            <li class="page-item">
              <a <?php if ($i == $page) {
                    echo 'style="background-color:#d9b56f;"';
                  } ?> class="page-link" href="sanpham.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
            <?php



          }
            ?>


            </li>



        </ul>


  </main>
  <div>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger chat-title="Q&A" agent-id="546c6eb8-5f15-47f9-9932-a46a47f38d43" language-code="en" chat-icon="img/qa.png"></df-messenger>

  </div>


  <!-- Footer -->
  <?php
  include('footer.php')
  ?>

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</html>