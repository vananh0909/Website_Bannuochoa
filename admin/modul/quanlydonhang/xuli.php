<?php
	use Carbon\Carbon;
    use Carbon\CarbonInterval;
include("../../config/config.php");
require('../../../carbon/autoload.php');
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
if(isset($_GET['thanhtoan'])&& isset($_GET['code'])){
    $code = $_GET['code'];
    $sql ="UPDATE giohang SET thanhtoan = 0 WHERE madonhang='".$code."'";
     $query = mysqli_query($mysqli,$sql);
     #thong ke doanh thu
     $sql_lietkedh = "SELECT * FROM donhang,qlsanpham WHERE donhang.id_sanpham=qlsanpham.id_sanpham 
     AND donhang.ma_cart='$code' ORDER BY donhang.id_cart DESC";
     $query_lietkedh = mysqli_query($mysqli,$sql_lietkedh);

     $sql_thongke= "SELECT * FROM thongke WHERE ngaydat='$now'";
     $query_thongke = mysqli_query($mysqli, $sql_thongke);
#tong gia tien
$soluongmua = 0;
$doanhthu = 0;
while($row = mysqli_fetch_array($query_lietkedh)){
      $soluongmua+=$row['soluongmua'];
      $doanhthu+=$row['giasp']*$row['soluongmua'];
}

if(mysqli_num_rows($query_thongke)==0){
        $soluongban = $soluongmua;
        $doanhthu = $doanhthu;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($mysqli,"INSERT INTO thongke (ngaydat,soluongban,doanhthu,donhang) VALUE('$now','$soluongban','$doanhthu','$donhang')" );
}elseif(mysqli_num_rows($query_thongke)!=0){
    while($row_tk = mysqli_fetch_array($query_thongke)){
        $soluongban = $row_tk['soluongban']+$soluongmua;
        $doanhthu = $row_tk['doanhthu']+$doanhthu;
        $donhang = $row_tk['donhang']+1;
        $sql_update_thongke = mysqli_query($mysqli,"UPDATE thongke SET soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'" );
    }
}

header('location:../../index.php?action=quanlydonhang&query=lietke');
}
?>