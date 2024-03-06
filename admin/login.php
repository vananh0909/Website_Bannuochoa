<?php
session_start();
include("config/config.php");
if(isset($_POST['dangnhap'])){
    $taikhoan= $_POST['username'];
    $matkhau =  md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username ='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
     $row = mysqli_query($mysqli,$sql);
     $count = mysqli_num_rows($row);
     if($count > 0){
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
     }else{
        echo "<script>alert('Tài khoản hoặc mật khẩu sai ! 
                              Xin vui lòng nhập lại.')</script>";
         header("Location:login.php");
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập Trang ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <style>
    body{
        background-color: #f3f3f3;
    }

    .weapper-login{
        width:20%;
        border-radius: 10px;
    box-shadow: 0px 0px 0px 3px #d9b56f;
        margin:0 auto;
        margin-top: 230px;

   
    }
    .table-login{
        width:100%;

    }
    table.table-login tr td{
        padding:8px;
    }

    .nutdn:hover{
    background-color: #d9b56f;
    
}
  </style>
</head>
<body>
    <div class="weapper-login">
        <form action="" autocomplete="off" method="POST">
        <table  class="table-login" style="text-align:center;border-collapse:collapse;">
        <tr>
            <td colspan="2"><h3>Đăng Nhập ADMIN</h3></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="username"></td>
        </tr>

        <tr>
            <td>Mật khẩu</td>
            <td><input type="password"  name="password"></td>
        </tr>

        <tr>
            <td colspan="2"><input class ="nutdn" type="submit" name="dangnhap" value="Đăng Nhập"></td>
        </tr>
    </table>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>