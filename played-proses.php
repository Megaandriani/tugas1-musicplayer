<?php 

include_once "app/controller.php";

include "app/played.php";

$played = new app\played();

if ($_POST['btn-simpan']) {
	$played->tambah();
	header("location:index2.php?page=played-tampil");
}

if ($_POST['btn-edit']) {
	$played->update();
	header("location:index2.php?page=played-tampil");
}

if ($_GET['delete-id']) {
	$played->hapus($_GET['delete-id']);
	header("location:index2.php?page=played-tampil");
}