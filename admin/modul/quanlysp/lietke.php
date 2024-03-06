<?php
$sql_lietke_sp = "SELECT * FROM qlsanpham,danhmucsp WHERE qlsanpham.id_danhmuc=danhmucsp.id ORDER BY id_sanpham DESC";
$lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?> 
<h3 class="full-text">Sản phẩm đã thêm</h3>
<table class="table table-striped" border="1" style="width:95%;border-collapse:collapse;margin-left:34px">
  <tr>
    <th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã </th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Sửa</th>
    <th>Xóa</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($lietke_sp)){
$i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modul/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tensp'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){
        echo'Kích hoạt';
    }else{

      echo 'Ẩn';
    }
     ?>
     </td>
    <td>
      
        <a class="thesua" href="?action=quanlysp&query=sua&idsp=<?php echo $row['id_sanpham']?>"><i class="fas fa-edit"></i></a>
    </td>
    <td>        <a class="thea" href="modul/quanlysp/xuli.php?idsp=<?php echo $row['id_sanpham'] ?>"><i class="fas fa-trash"></i></a> </td>
  </tr>
<?php
}
?>
</table>