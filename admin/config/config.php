<?php 

$mysqli = new mysqli("localhost","root","","sanpham");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
  exit();
}

?>