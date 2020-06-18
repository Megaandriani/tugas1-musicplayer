<?php 

require_once "inc/config.php";

$track = new app\track();

if ($_POST['btn-simpan']) {
	$track->tambah();
	header("location:dashboard.php?page=track-tampil");
}

if ($_POST['btn-edit']) {
	$track->update();
	header("location:dashboard.php?page=track-tampil");
}

if ($_GET['delete-id']) {
	$track->hapus($_GET['delete-id']);
	header("location:dashboard.php?page=track-tampil");
}