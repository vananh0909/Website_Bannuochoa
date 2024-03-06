<?php 
session_start();
include("admin/config/config.php");
require('carbon/autoload.php');
// require('mail/guimail.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$id_khachhang = $_SESSION['id_khachhang'];
$hthuc_ttoan = $_POST['thanhtoan'];
// cho random
$code_order = rand(0,9999); 
// lấy id địa chỉ vận chuyển
$id_dangky= $_SESSION['id_khachhang'];
$sql_ship = mysqli_query($mysqli, "SELECT * FROM vanchuyen WHERE id_dangky = '$id_dangky' LIMIT 1");
$sql_vanchuyen= mysqli_fetch_array($sql_ship);
$id_ship = $sql_vanchuyen['id_ship'];
$insert_giohang = "INSERT INTO giohang(id_khachhang, madonhang, thanhtoan, hthuc_ttoan,id_vanchuyen,ngay_dathang) 
VALUE('".$id_khachhang."','".$code_order."',1,'".$hthuc_ttoan."','".$id_ship."','".$now."')";
$cart_query = mysqli_query($mysqli,$insert_giohang);
if($cart_query){
    // thêm giỏ hàng chi tiết
    foreach($_SESSION['cart'] as $key => $value){

        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_donhang = "INSERT INTO donhang(id_sanpham, ma_cart, soluongmua) 
        VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
       mysqli_query($mysqli,$insert_donhang);
    } 


}
unset($_SESSION['cart']);
header('Location:camon.php');
