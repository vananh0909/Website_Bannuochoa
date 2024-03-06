<?php
$sql_sua_sp = "SELECT * FROM qlsanpham WHERE id_sanpham='$_GET[idsp]' LIMIT 1";
$sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?> 
<h3 class="full-text">Sửa sản phẩm</h3>
<table class="table table-striped" border="1" style="width:95%;border-collapse:collapse;margin-left:34px">
<?php 
while($row = mysqli_fetch_array($sua_sp)){
?>
<form method="POST" action="modul/quanlysp/xuli.php?idsp=<?php echo  $row['id_sanpham'] ?>" enctype="multipart/form-data">
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
</tr>
<tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
</tr>

<tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
</tr>
<tr>
    <td>Số lượng</td>
    <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
</tr>

<tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
    <img src="modul/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
</tr>
<tr>
    <td>Tóm tắt</td>
    <td><textarea  rows="10" name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
</tr>
<tr>
    <td>Nội dung</td>
    <td><textarea rows="10" name="noidung" style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
</tr>
<tr>
    <td>Danh mục sản phẩm</td>
    <td>
      <select name="danhmuc">
        <?php 
        $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id DESC ";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
          if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
        ?>
        <option selected value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tensp']?></option>
      <?php
       }else{
        ?>
        <option value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tensp']?></option>
        <?php 
        }
      }
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang">
        <?php 
        if($row['tinhtrang']==1){
        ?> 
        <option value="1" selected >Kích hoạt</option>
        <option value="0">Ẩn</option>
        <?php 
        }else{
        ?>
        <option value="1">Kích hoạt</option>
        <option value="0"selected>Ẩn</option>
        <?php 
        }
        ?>
      </select>
    </td>
  </tr>
<tr>
    <td colspan="2"><input id="button" type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
</tr>
  </form>
 <?php 
  }
 ?>
</table>
