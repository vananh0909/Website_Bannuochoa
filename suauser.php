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
    <link href="img/suauser.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Sửa thông tin</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="gioithieu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body style="  background-color: #fff!important;">
    <?php
    include('header.php')
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <h2 style="text-align:center">Sửa thông tin</h2>
                <div class="card " style="margin-top: 20px;">
                    <div class="card-header">


                        <?php
                        if (isset($_SESSION['dangky'])) {
                            $dki = $_SESSION['id_khachhang'];
                            $sql_lietke = "SELECT * FROM  dangky WHERE id_dangky = '" . $dki . "' LIMIT 1";
                            $lietke = mysqli_query($mysqli, $sql_lietke);
                            while ($row = mysqli_fetch_array($lietke)) {
                        ?>
                                <table class="table table-striped" style="width:100%;margin-bottom: 20px; border-collapse:collapse;">
                                    <form method="POST" action="">
                                        <tr>
                                            <td>Tên đăng nhập :</td>
                                            <td><input type="text" class="form-control" value="<?php echo $row['tenkhachhang'] ?>" name="tenkhachhang"></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại : </td>
                                            <td><input type="text" class="form-control" value="<?php echo $row['dienthoai'] ?>" name="dienthoai"></td>
                                        </tr>

                                        <tr>
                                            <td>Email : </td>
                                            <td><input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ : </td>
                                            <td><input type="text" class="form-control" value="<?php echo $row['diachi'] ?>" name="diachi"></td>
                                        </tr>
                                        <tr>

                                            <td colspan="2"><input style="margin-left: 260px;" class="btn btn-outline-success" id="button" type="submit" name="capnhatthongtin" value="Cập nhật"></td>
                                        </tr>
                                        <!-- <button style="margin-left:350px" type="button" class="btn btn-outline-success" ame="capnhatthongtin">Cập nhật</button> -->
                                        <?php
                                        if (isset($_POST['capnhatthongtin'])) {
                                            $tenkhachhang = $_POST['tenkhachhang'];
                                            $dienthoai = $_POST['dienthoai'];
                                            $email = $_POST['email'];
                                            $diachi = $_POST['diachi'];
                                            $id_dangky =     $_SESSION['id_khachhang'];

                                            $sql_capnhat = mysqli_query($mysqli, "UPDATE dangky SET
  tenkhachhang = '$tenkhachhang',dienthoai='$dienthoai',email='$email',diachi='$diachi' WHERE id_dangky='$id_dangky'");
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
                                    </form>
                                </table>
                        <?php
                            }
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
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</html>