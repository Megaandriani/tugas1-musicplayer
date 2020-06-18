<?php

// Config
require_once "inc/config.php";

$ind = new app\index();

if (isset($_POST['btn-login'])) {

	$ind->login();
	header("location:index.php?page=index_login");
}
