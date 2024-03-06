<h3 class="full-text">Thêm sản phẩm</h3>
<table class="table table-striped"  style="width:95%;border-collapse:collapse;margin-left:34px">
<form method="POST" action="modul/quanlysp/xuli.php" enctype="multipart/form-data">
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text"  name="tensanpham"></td>
</tr>
<tr>
    <td>Mã</td>
    <td><input type="text" name="masp"></td>
</tr>

<tr>
    <td>Giá</td>
    <td><input type="text" name="giasp"></td>
</tr>
<tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong"></td>
</tr>

<tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
</tr>
<tr>
    <td>Tiêu đề</td>
    <td><textarea  rows="5" name="tomtat" style="resize: none"></textarea></td>
</tr>
<tr>
    <td>Nội dung</td>
    <td><textarea rows="5" name="noidung" style="resize: none"></textarea></td>
</tr>
<tr>
    <td>Danh mục</td>
    <td>
      <select name="danhmuc">
        <?php 
        $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id DESC ";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
        <option value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tensp']?></option>
      <?php
      }
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang">
        <option value="1">Kích hoạt</option>
        <option value="0">Ẩn</option>
      </select>
    </td>
  </tr>
<tr>
    <td colspan="2"><input  style="margin-left: 382px;" class="btn btn-light" id="button" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
</tr>
  </form>
</table>

