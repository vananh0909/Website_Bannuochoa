<?php
$sql_sua = "SELECT * FROM danhmucsp WHERE id='$_GET[id]' LIMIT 1";
$sua = mysqli_query($mysqli, $sql_sua);
?> 
<p class="full-text">Sửa danh mục</p>
<table class="table table-striped" border="1" style="width:95%;border-collapse:collapse;margin-left:34px">
<form method="POST" action="modul/quanlydanhmucsp/xuli.php?id=<?php echo $_GET['id'] ?>">
    <?php
      while($dong = mysqli_fetch_array($sua)){
 ?>
  <tr>
    <td>Tên danh mục</td>
    <td><input type="text" value="<?php echo $dong['tensp']?>" name="tendanhmuc"></td>
</tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
  </tr>
<tr>
    <td colspan="2"><input id="button" type="submit" name="sua" value="sửa danh mục sản phẩm"></td>
</tr>
<?php
      }
?>

  </form>
</table>

