<h3 class="full-text">Đơn hàng</h3>
<?php
include("config/config.php");
$sql_lietke_dh = "SELECT * FROM giohang, dangky WHERE giohang.id_khachhang=dangky.id_dangky ORDER BY giohang.id_giohang DESC";
$lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?> 
<table  class="table table-striped"  style="width:95%;border-collapse:collapse;margin-left:34px" >
  <tr>
    <th>Stt</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>hình thức thanh toán</th>
    <th>Tình trạng</th>
    <th>Ngày đặt</th>
    <th>Xem đơn</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($lietke_dh)){
$i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['madonhang'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['hthuc_ttoan']?></td>
    <td>
      <?php 
      if($row['thanhtoan']==1){
        echo '<a  href="modul/quanlydonhang/xuli.php?thanhtoan=0&code='.$row['madonhang'].'">Đơn hàng mới</a>';
      }else{
        echo "Đã xem đơn";
      }
      ?>
    </td>
    <td><?php echo $row['ngay_dathang']?></td>
    <td>
        <a class="thea" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['madonhang']?>">Xem đơn hàng</a> 

    </td>
  </tr>
<?php
}
?>
</table>