<?php 
require_once "inc/config.php";

$user = new app\user();

if ($_POST['btn-simpan']) {
	$user->tambah();
	header("location:dashboard.php?page=user-tampil");
}

if ($_POST['btn-edit']) {
	$user->update();
	header("location:dashboard.php?page=user-tampil");
}

if ($_GET['delete-id']) {
	$user->hapus($_GET['delete-id']);
	header("location:dashboard.php?page=user-tampil");
}