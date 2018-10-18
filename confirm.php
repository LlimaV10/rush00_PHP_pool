<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<?php
		require_once("menu.php");
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['cart'] = null;
		$cart = null;
		if ($_SESSION['logged_user'])
		{
			require_once("connect_DB.php");
			$scart = serialize($cart);
			$sql = "SELECT * FROM cart WHERE user_name='".$_SESSION['logged_user']."'";
			$res = $conn->query($sql);
			if ($res->num_rows < 1)
			{
				$sql = "INSERT INTO cart (user_name, products) VALUES ('".$_SESSION['logged_user']."', '".$scart."')";
				if ($conn->query($sql) !== TRUE)
					echo "Error\n";
			}
			else
			{
				$sql = "UPDATE cart SET products='".$scart."' WHERE user_name='".$_SESSION['logged_user']."'";
				if ($conn->query($sql) !== TRUE)
					echo "Error\n";
			}
			$conn->close();
		}
	?>
	<br><br><br><br><br><br><br><br>
	<div class="register_message">
		Successfully confirmed!
	</div>
	<?php require_once("footer.php"); ?>
</body>
</html>