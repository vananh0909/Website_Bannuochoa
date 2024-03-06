<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
#Xu li hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];




if(isset($_POST['themsanpham'])){
    $sql_them = "INSERT INTO qlsanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE ('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlysp&query=them');

}elseif(isset($_POST['suasanpham'])){
    if($hinhanh!=''){

     move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

    $sql_update = "UPDATE qlsanpham SET tensanpham='".$tensanpham."',masp='".$masp."'
    ,giasp='".$giasp."',soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',
    tinhtrang='".$tinhtrang."', id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsp]'";
    //update xong xóa ảnh cũ
    $sql = "SELECT * FROM qlsanpham WHERE id_sanpham = '$_GET[idsp]' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
       unlink('uploads/'.$row['hinhanh']);
   }
  
    }else{
    $sql_update = "UPDATE qlsanpham SET tensanpham='".$tensanpham."',masp='".$masp."'
    ,giasp='".$giasp."',soluong='".$soluong."',tomtat='".$tomtat."',noidung='".$noidung."',
    tinhtrang='".$tinhtrang."', id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsp]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlysp&query=them');

}else{
    $id = $_GET['idsp'];

    $sql = "SELECT * FROM qlsanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
  
    $sql_xoa = "DELETE FROM qlsanpham WHERE id_sanpham = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}

?>