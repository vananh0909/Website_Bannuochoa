<?php
require_once 'admin/config/config.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link href="img/img5.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="dangki.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="  background-color: #f2f2f2!important;">
	<?php
	include('header.php')
	?>

	<div>

		<h2 class="text">Đăng Nhập</h2>

		<div class="the">
			<a class="home" href="trangchu.php">Trang Chủ / </a>
			<span class="gt">Đăng Nhập</span>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-sm-7 offset-sm-2">


				<div class="card">
					<div class="card-header">
						<h3 class="card-text">Đăng Nhập </h3>
					</div>
					<div class="card-body">
						<form id="signupForm" method="POST" class="form-horizontal" action="">

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="tenkhachhang">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname" name="tenkhachhang" placeholder="Tên của bạn" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="matkhau" placeholder="Mật khẩu" />
								</div>
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
									<button type="submit" class="btn btn-light" name="dangnhap" value="Sign up">Đăng
										Nhập</button>
									<?php
									if (isset($_POST['dangnhap'])) {
										$email = $_POST['email'];
										$matkhau = md5($_POST['matkhau']);
										$sql = "SELECT * FROM dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
										$row = mysqli_query($mysqli, $sql);
										$count = mysqli_num_rows($row);

										if ($count > 0) {
											$row_data = mysqli_fetch_array($row);
											$_SESSION['dangky'] = $row_data['tenkhachhang'];
											$_SESSION['email'] = $row_data['email'];
											$_SESSION['id_khachhang'] = $row_data['id_dangky'];
											header("Location:giohang.php");
										} else {
											echo "<script>
			Swal.fire({
			
				icon: 'error',
				title: 'Thông tin sai. Vui lòng đăng nhập lại !',
				showConfirmButton: false,
				timer: 1500
			  })</script>";
										}
									}
									?>

								</div>
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

					tenkhachhang: {
						required: true,
						minlength: 2
					},
					matkhau: {
						required: true,
						minlength: 8
					},
					// confirm_password: {
					// 	required: true,
					// 	minlength: 8,
					// 	equalto: "#password"
					// },
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {

					tenkhachhang: {
						required: "Bạn chưa nhập vào tên đăng nhập",
						minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
					},

					matkhau: {
						required: "Bạn chưa nhập mật khẩu",
						minlength: "Mật khẩu phải có ít nhất 8 ký tự"
					},
					confirm_password: {
						required: "Bạn chưa nhập mật khẩu",
						minlength: "Mật khẩu phải có ít nhất 8 ký tự",
						equalTo: "Mật khẩu không trùng khớp với mật khẩu đã nhập"
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
		<df-messenger chat-title="Q&A" agent-id="546c6eb8-5f15-47f9-9932-a46a47f38d43" language-code="en" chat-icon="img/qa.png"></df-messenger>

	</div>


	<!-- Footer -->
	<?php
	include('footer.php')
	?>

</body>
<script src="sweetalert2.all.min.js"></script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>