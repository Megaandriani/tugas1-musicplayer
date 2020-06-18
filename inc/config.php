<?php 
error_reporting(E_ALL);

// Mulai sesi
session_start();

define('URL', 'http://localhost/uts-mega1/');
define('ASSET' , URL . 'layout/assets/');

require_once "vendor/autoload.php";