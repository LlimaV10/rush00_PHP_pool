<!DOCTYPE html>
<html>
<head>
	<title>Remove user</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<?php
		require_once("menu.php");
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$b = "You dont have access";
		if ($_SESSION['logged_user'] != "")
		{
			require_once("connect_DB.php");
			$sql = "SELECT * FROM users WHERE name='".$_SESSION['logged_user']."'";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			if ($row['admin'] == 1) {
				$sql = "DELETE FROM users WHERE name='".$_POST['name']."'";
				$conn->query($sql);
				$b = "Success";
			}} ?>
	<div class="register_message"><br><br><br><br>
		<?php echo $b?></div>
	<?php require_once("footer.php"); ?>
</body>
</html>