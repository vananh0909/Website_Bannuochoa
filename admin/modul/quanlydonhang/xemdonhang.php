<p class="full-text">Chi tiết đơn hàng</p>
<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM  donhang, qlsanpham  WHERE donhang.id_sanpham=qlsanpham.id_sanpham 
AND  donhang.ma_cart ='".$code . "' ORDER BY  donhang.id_cart DESC";
$lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table  class="table table-striped"  border="1" style="width:95%;border-collapse:collapse;margin-left:34px">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>

    </tr>
    <?php
    $i = 0;
    $tongtien=0;
    while ($row = mysqli_fetch_array($lietke_dh)) {
        $i++;
        $thanhtien=$row['giasp']*$row['soluongmua'];
        $tongtien += $thanhtien;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['ma_cart'] ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['soluongmua'] ?></td>
            <td><?php echo number_format($row['giasp'], 0, ',', '.') . "vnđ" ?></td>
            <td><?php echo number_format($thanhtien, 0, ',', '.') . "vnđ" ?> </td>

        </tr>
    <?php
    }
    ?>
                <td colspan="6">
                <p style="text-align:right;margin-right:5px; text-transform:uppercase;">Tổng số tiền: <?php echo number_format($tongtien, 0, ',', '.') . "vnđ" ?> </p>
            </td>
</table>

<p class="full-text">Địa chỉ vận chuyển</p>
<table  class="table table-striped"  style="width:95%;border-collapse:collapse;margin-left:34px">
<?php 
$code = $_GET['code'];
$sql_ship = mysqli_query($mysqli, "SELECT * FROM giohang, vanchuyen WHERE giohang.id_vanchuyen=vanchuyen.id_ship AND giohang.madonhang = '".$code."'");
?>
    <tr>
        <th>Tên người nhận: </th>
        <th>Địa chỉ giao: </th>
        <th>Số điện thoại: </th>
        <th>Ghi chú</th>

    </tr>
<?php 

while ($rows = mysqli_fetch_array($sql_ship)) {
?>
        <tr>
            
            <td><?php echo $rows['ten_nguoinhan'] ?></td>
            <td><?php echo $rows['diachi_nhan'] ?></td>
            <td><?php echo $rows['sdt'] ?></td>

            <td><?php echo $rows['ghichu'] ?></td>
        </tr>
<?php 
}
?>
</table>