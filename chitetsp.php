
<?php

$sql_chitiet = "SELECT * FROM qlsanpham,danhmucsp WHERE qlsanpham.id_danhmuc=danhmucsp.id
  AND qlsanpham.id_sanpham = '$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
if(isset($_GET['quanly'])){
    $file = $_GET['quanly'];
  }else{
    $file="";
  }
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {

?>
    <div class="chitiet">
        <div class="hinhanh_sp">
            <img width="80%" src="admin/modul/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="chitet_sp">
            <h3 class="tensp"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p style="font-size:18px; padding-top:10px;text-transform:uppercase;">Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p style="font-size:18px; padding-top:5px;text-transform:uppercase;">Giá: <?php echo number_format($row_chitiet['giasp'],0,',','.' )." vnđ" ?></p>
            <p style="font-size:18px; padding-top:5px;text-transform:uppercase;">Số lượng trong kho: <?php echo $row_chitiet['soluong'] ?></p>
            <p style="font-size:18px;  padding-top:5px;text-transform:uppercase;">Danh mục : <?php echo $row_chitiet['tensp'] ?></p>
            <p style=" padding-top:5px"><input id="giohang" class="btn btn-light" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
           
        </div>

        </form>
    </div>
    <div><h3 style="text-transform:uppercase;font-size:20px">Chi tiết thêm về sản phẩm : </h3>
    <p style ="line-height: 4px; "></p><?php echo $row_chitiet['tomtat']?></p>
    <p style ="line-height: 4px; "></p><?php echo $row_chitiet['noidung']?></p>
    </div>
    </div>
    
<?php
}
?>