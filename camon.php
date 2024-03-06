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


  <div>
    <h2 style="text-align:center; margin-top:40px;">Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận đơn!</h2>
    <img style="margin-left:510px;width:500px; height:auto;" src="img/img13.jpg">
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