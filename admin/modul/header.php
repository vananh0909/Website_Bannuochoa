<?php
 if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}
?>
<div class="dxx" >
<button type="button" id="dx" class="btn btn-light">
<a class="dx" href="index.php?dangxuat=1">Đăng Xuất: <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];
    }
    ?>
        </a>
</button>
</div>