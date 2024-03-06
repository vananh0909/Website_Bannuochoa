<?php
$sql_lietke = "SELECT * FROM danhmucsp ORDER BY thutu DESC";
$lietke = mysqli_query($mysqli, $sql_lietke);
?> 
<p class="full-text">Danh mục đã thêm</p>
<table class="table table-striped" style="width:95%;margin-bottom: 30px; margin-left:34px" border="1" style="border-collapse:collapse;">
  <tr>
    <th>Id</th>
    <th>Tên nước hoa</th>
    <th>Sửa</th>
    <th>Xóa</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($lietke)){
$i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensp'] ?></td>
    <td>
        <a class="thesua" href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $row['id']?>"><i class="fas fa-edit"></i></a>
    </td>
    <td>
    <a class="thea" href="modul/quanlydanhmucsp/xuli.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></a> 
    </td>
  </tr>
<?php
}
?>
</table>