<?php 

// Kalau sesi user_name tidak ada, redirect
/*if (!isset($_SESSION['user_name'])) {	
	header("location:index.php"); 
}*/ 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Music Player</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>css/style.css">
	<link href="<?php echo ASSET; ?>images/hdr.jpg" rel="shortcut icon">
</head>
<body>
	<div class="utama">
		<div class="header">
			<img src="<?php echo ASSET; ?>images/hdr.jpg">
		</div>
		<div class="menu">
			<a href="dashboard.php">Dashboard</a>
			<a href="dashboard.php?page=artis-tampil">Artis</a>
			<a href="dashboard.php?page=album-tampil">Album</a>
			<a href="dashboard.php?page=track-tampil">Lagu</a>
			<a href="dashboard.php?page=user-tampil">User</a>
			<a href="dashboard.php?page=user-logout">Logout</a>
		</div>

		<div class="main">
			
			<?php 

			if (isset($_GET['page'])) {
				include $_GET['page'] . ".php";
			} else {
				include "dashboard_main.php";
			}

			?>

		</div>

		<div class="footer">
			Copyright 2020. Music Player
		</div>
	</div>
</body>
</html>