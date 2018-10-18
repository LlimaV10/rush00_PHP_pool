<?php
	session_start();
	$_SESSION['logged_user'] = null;
	$_SESSION['cart'] = null;
	require_once("index.php");
?>