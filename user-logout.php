<?php 
require_once "inc/config.php";

session_destroy();

echo "<script>alert('Anda Telah Logout');</script>";
echo "<script>location='index.php';</script>";

 ?>