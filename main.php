<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>css/style.css">
<h2>Selamat Datang</h2>
<?php 
session_start();
 ?>
<h2 align="center"> Welcome <?php echo $_SESSION['user_name']; ?></h2>
</html>