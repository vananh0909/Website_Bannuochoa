<h3 class="full-text">Tin nhắn khách hàng</h3>
<?php
include("config/config.php");
$sql_lietke_dh = "SELECT * FROM phanhoi, dangky WHERE phanhoi.id_kh=dangky.id_dangky ORDER BY phanhoi.id_kh DESC";
$lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?> 
<table  class="table table-striped"  style="width:95%;border-collapse:collapse;margin-left:34px" >
  <tr>
    <th>Stt</th>
    <th>Tên khách hàng</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Nội dung tin nhắn</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($lietke_dh)){
$i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenph'] ?></td>
    <td><?php echo $row['sdtph'] ?></td>
    <td><?php echo $row['emailph'] ?></td>
    <td><?php echo $row['noidungph'] ?></td>

  </tr>
<?php
}
?>
</table>