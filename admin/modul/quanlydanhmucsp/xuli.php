<?php
include('../../config/config.php');

$tensp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['them'])){
    $sql_them = "INSERT INTO danhmucsp(tensp,thutu) VALUE ('".$tensp."','".$thutu."')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['sua'])){
    $sql_update = "UPDATE danhmucsp SET tensp='".$tensp."',thutu='".$thutu."' WHERE id='$_GET[id]' ";
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{
    $id = $_GET['id'];
    $sql_xoa = "DELETE FROM danhmucsp WHERE id = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>