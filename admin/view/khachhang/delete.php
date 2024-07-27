<?php 
$id = $_GET['id'];

delete_khachhang($id);
header("Location: index.php?act=listkh");