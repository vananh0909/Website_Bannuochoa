<?php
include("admin/config/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="img/img6.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="dangki.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body style="  background-color: aqua !important;">
    <?php 
include('header.php')
?>

    <div>

        <h2 class="text">Đăng Ký</h2>

        <div class="the">
            <a class="home" href="trangchu.php">Trang Chủ / </a>
            <span class="gt">Đăng Ký</span>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-7 offset-sm-2">


                <div class="card">
                    <div class="card-header">
                        <?php
						if (isset($_POST['signup'])) {
							$tenkhachhang = $_POST['username'];
							$email = $_POST['email'];
							$dienthoai = $_POST['sdt'];
							$matkhau = md5($_POST['password']);
							$diachi = $_POST['diachi'];
							$sql_dangky = mysqli_query($mysqli, "INSERT INTO dangky(tenkhachhang,email,dienthoai,matkhau,diachi) 
 VALUE('" . $tenkhachhang . "','" . $email . "','" . $dienthoai . "','" . $matkhau . "','" . $diachi . "')");
							if ($sql_dangky) {
								echo "<script>
								Swal.fire({
								
									icon: 'success',
									title: 'Đăng ký thành công!',
									showConfirmButton: false,
									timer: 1500
								  })</script>"
								  ;
								$_SESSION['dangky'] = $tenkhachhang;
								// lấy id khách hàng, isset xong lấy id lưu vào config
								$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
								// header("location:giohang.php");
							}
						}
						?>
                        <h3 class="card-text">Đăng ký </h3>
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="POST" class="form-horizontal" action="">


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="username">Tên đăng ký:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Tên đăng ký" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="email">Email:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="password">Mật khẩu:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Mật khẩu" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="sdt">Điện thoại:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="sdt" name="sdt"
                                        placeholder="Số điện thoại" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="diachi">Điạ chỉ:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="diachi" name="diachi"
                                        placeholder="Địa chỉ" />
                                </div>
                            </div>

                            <!-- <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password"
										name="confirm_password" placeholder="Nhập lại mật khẩu" />
								</div> -->
                    </div>

                    <div class="form-group form-check">
                        <div class="col-sm-5 offset-sm-4">
                            <input class="form-check-input" type="checkbox" id="agree" name="agree" value="agree" />
                            <label class="form-check-label" for="agree">Đồng ý các quy định của chúng
                                tôi</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 offset-sm-4">
                            <button type="submit" class="btn btn-light" name="signup">Đăng ký</button>
                        </div>
                        </br>
                        <td><a class="dangnhaptk" href="dangnhap.php">Đăng nhập nếu có tài khoản</a></td>

                    </div>

                    <div class="dn">
                        <a href="" class="fb">
                            <i class="fab fa-facebook-f"></i>
                            Kết nối với Facebook
                        </a>
                        <a href="" class="gg">
                            <i class="fab fa-google"></i>
                            Kết nối với Google
                        </a>
                    </div>

                    </form>
                </div>
            </div>
        </div> <!-- Cột nội dung -->
    </div> <!-- Dòng nội dung -->
    </div> <!-- Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#signupForm").validate({
            rules: {

                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    equalto: "#password"
                },
                sdt: {
                    required: true,
                    minlength: 8

                },
                diachi: {
                    required: true,
                    minlength: 10,
                },
                email: {
                    required: true,
                    email: true
                },
                agree: "required"
            },
            messages: {
                username: {
                    required: "Bạn chưa nhập vào tên đăng nhập.",
                    minlength: "Tên đăng nhập phải có ít nhất 2 ký tự."
                },

                password: {
                    required: "Bạn chưa nhập mật khẩu.",
                    minlength: "Mật khẩu phải có ít nhất 8 ký tự."
                },
                confirm_password: {
                    required: "Bạn chưa nhập lại mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 8 ký tự",
                    equalTo: "Mật khẩu không trùng khớp với mật khẩu đã nhập."
                },
                sdt: {
                    required: "Bạn chưa nhập số điện thoại",
                    minlength: "Vui lòng nhập đầy đủ số điện thoại."
                },
                diachi: {
                    required: "Bạn chưa nhập địa chỉ",
                    minlength: "Vui lòng nhập đầy đủ địa chỉ."
                },
                email: "Email không hợp lệ",
                agree: "Bạn phải đồng ý với các quy định của chúng tôi"
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
        <df-messenger chat-title="Q&A" agent-id="546c6eb8-5f15-47f9-9932-a46a47f38d43" language-code="en"
            chat-icon="img/qa.png"></df-messenger>

    </div>


    <!-- Footer -->
    <?php 
include('footer.php')
?>

</body>
<script src="main.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>