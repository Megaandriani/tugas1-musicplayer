<?php 

require_once "inc/config.php";

$album = new app\album();

if ($_POST['btn-simpan']) {
	$album->tambah();
	header("location:dashboard.php?page=album-tampil");
}

if ($_POST['btn-edit']) {
	$album->update();
	header("location:dashboard.php?page=album-tampil");
}

if ($_GET['delete-id']) {
	$album->hapus($_GET['delete-id']);
	header("location:dashboard.php?page=album-tampil");
}