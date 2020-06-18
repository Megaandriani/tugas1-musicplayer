<?php 

require_once "inc/config.php";

$artis = new app\artis();

if ($_POST['btn-simpan']) {
	$artis->tambah();
	header("location:dashboard.php?page=artis-tampil");
}

if ($_POST['btn-edit']) {
	$artis->update();
	header("location:dashboard.php?page=artis-tampil");
}

if ($_GET['delete-id']) {
	$artis->hapus($_GET['delete-id']);
	header("location:dashboard.php?page=artis-tampil");
}