<!DOCTYPE html>
<html>
<head>
	<title>Modify product</title>
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
				$b = "";
	?>
	<form action="modify_product1.php" method="POST">
		<br><br><br>
		Product name: <input type="text" name="name" value="" required="required" placeholder="MacBook">
		<br>
		<input type="submit" class="button10" name="submit" value="Modify">
	</form>
	<?php }} ?>
	<div class="register_message"><br><br><br><br>
		<?php echo $b?></div>
	<?php require_once("footer.php"); ?>
</body>
</html>