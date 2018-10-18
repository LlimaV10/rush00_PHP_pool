<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
	<style type="text/css">
		h1 {
			color: white;
			text-align: center;
		}
		.link {
			padding: 20px 100px;
			margin: 50px;
			background-color: green;
			color: white;
			border-radius: 20px;
			opacity: 0.75;
			outline: 0;	
			text-decoration: none;
		}
		.link:hover {
			opacity: 1;
		}
	</style>
</head>
<body>
	<?php
		require_once("menu.php");
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if ($_SESSION['logged_user'] != "")
		{
			require_once("connect_DB.php");
			$sql = "SELECT * FROM users WHERE name='".$_SESSION['logged_user']."'";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			$conn->close();
			if ($row['admin'] == 1) {
	?>
	<div>
		<br><br><br>
		<h1>Hello Admin</h1>
		<a class="link" href="add_product.php">Add product</a>
		<br><br><br><br>
		<a class="link" href="delete_product.php" style="background-color: red;">Delete product</a>
		<br><br><br><br>
		<a class="link" href="modify_product.php">Modify product</a>
		<br><br><br><br>
		<a class="link" style="background-color: red;" href="remove_user.php">Remove User</a>
		<br><br><br><br>
		<a class="link" href="add_cat.php">Add Category</a>
		<br><br><br><br>
		<!-- <a class="link" style="background-color: red;" href="">Delete Category</a>
		<br><br><br><br> -->
	</div>
	<?php } else { ?>
	<div class="register_message"><br><br><br><br>
		You dont have access</div>
	<?php }} else { ?>
	<div class="register_message"><br><br><br><br>
		You dont have access</div>
	<?php } ?>
	<?php require_once("footer.php");?>
</body>
</html>