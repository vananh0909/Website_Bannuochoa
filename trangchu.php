<?php
include("admin/config/config.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="img/img3.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <title>GP</title>
  <link rel="stylesheet" href="trangchu.css">
  <link rel="stylesheet" href="main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

</head>


<body>

  <?php
  include('header.php')
  ?>
  <!-- <img class="img2" src="img/img2.jpg"> -->
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


    <div class="wrapper">






      <div class="sanphams">
        <h3>SẢN PHẨM MỚI NHẤT
          <i class="fas fa-sun"></i>
        </h3>
      </div>
      <ul class="lists">
        <?php
        $sql_lietke_sp = "SELECT * FROM qlsanpham ORDER BY id_sanpham DESC LIMIT 12 ";

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
      <a class="xemthem" href="sanpham.php">Xem thêm <i class="fas fa-angle-double-right"></i></a>

      <div class="videos">
        <div class="sanphams">
          <h3>Video
            <i class="fab fa-youtube"></i>
          </h3>
        </div>
        <p class="text6">Đây là những video bạn có thể xem và tham khảo để lựa ra mùi hương phù hợp với mình nhé !
          <i class="far fa-grin-hearts"></i>
        </p>


        <div class="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/Hcz888cSQSA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/D7lsnCUlvz0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/9ZeJ1bAhpIU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/ZxfNHwDEYXo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
  include('footer.php')
  ?>

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</html>