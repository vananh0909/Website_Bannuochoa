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
    <title>Tìm Kiếm</title>
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
    <div class="wrapperr">

        <div class="container text-center">
            <div class="row g-2">
                <div class="sanphams">
                    <h3 class="fullsp">SẢN PHẨM BẠN TÌM</h3>
                </div>

                <ul class="lists">
                    <?php
                    if (isset($_POST['timkiem'])) {
                        $tukhoa = $_POST['tukhoa'];
                    } else {
                        $tukhoa = '';
                    }
                    $sql_lietke_sp = "SELECT * FROM qlsanpham WHERE qlsanpham.tensanpham LIKE '%" . $tukhoa . "%'";
                    $lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
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
            </div>
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


</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>