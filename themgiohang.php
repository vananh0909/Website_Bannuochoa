<?php
session_start();
include("admin/config/config.php");


//                          Thêmm số lượng
if(isset($_GET['cong'])){
  $id = $_GET['cong'];
  foreach($_SESSION['cart']as $cart_item){
    if($cart_item['id']!=$id){
      
      $sp[] = array(
        'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 
        'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
      );
      $_SESSION['cart']= $sp;
    }else{
      $tangsl = $cart_item['soluong']+1;
      if($cart_item['soluong']<=9){
        $sp[] = array(
          'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$tangsl,
           'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
      }else{
        $sp[] = array(
          'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
           'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );

      }
      $_SESSION['cart']= $sp;

    }
    }
    header("location:giohang.php?quanly=giohang");
  }




  //                          TRỪ số lượng

  if(isset($_GET['tru'])){
    $id = $_GET['tru'];
    foreach($_SESSION['cart']as $cart_item){
      if($cart_item['id']!=$id){
        
        $sp[] = array(
          'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 
          'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
        $_SESSION['cart']= $sp;
      }else{
        $tangsl = $cart_item['soluong']-1;
  
        if($cart_item['soluong']>1){
          $sp[] = array(
            'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$tangsl,
             'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );
        }else{
          $sp[] = array(
            'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
             'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );
  
        }
        $_SESSION['cart']= $sp;
  
      }
      }
      header("location:giohang.php?quanly=giohang");
    }
  




//                            Xóa từng sản phẩm

if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
  $id = $_GET['xoa'];
  foreach($_SESSION['cart'] as $cart_item){
    if($cart_item['id']!=$id){

      $sp[] = array(
        'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
      );

    }
    $_SESSION['cart']= $sp;
    header("location:giohang.php?quanly=giohang");
  }

}

//                            Xóa tất cả
if(isset($_GET['xoatatca'])&& $_GET['xoatatca']==1){
  unset($_SESSION['cart']);
  header("location:giohang.php?quanly=giohang");
}





//                               Thêm sp vào giỏ hàng
if (isset($_POST['themgiohang'])) {
  $id = $_GET['idsanpham'];
  $soluong = 1;
  $sql = "SELECT * FROM qlsanpham WHERE id_sanpham='" . $id . "' LIMIT 1 ";
  $query = mysqli_query($mysqli, $sql);
  $row =  mysqli_fetch_array($query);
  if ($row) {
    $sp_moi = array(array(
      'tensanpham' => $row['tensanpham'],
      'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']
    ));
    // Kiểm tra xem sp có chưa, nếu có rồi thì tăng hoặc giảm 
    if (isset($_SESSION['cart'])) {
      $found = false;
      foreach ($_SESSION['cart'] as $cart_item) {
        //nếu dữ liệu bị trùng 
        if ($cart_item['id'] == $id) {
          $sp[] = array(
            'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$soluong+1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );
          $found = true;

        } else { //nếu dữ liệu không trùng
          $sp[] = array(
            'tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );

        }
      }
      if($found==false){ //liên kết dữ liệu sp mới với sp
        $_SESSION['cart'] = array_merge($sp,$sp_moi);
      }else{
        $_SESSION['cart'] = $sp;
      }
    } else {
      $_SESSION['cart'] = $sp_moi;
    }
  }
  
   header("location:giohang.php?quanly=giohang");
  // print_r($_SESSION['cart']);
}
?>

