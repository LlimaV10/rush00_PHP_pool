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
		require_once("connect_DB.php");
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if ($_SESSION['logged_user'] == "")
			$b = "You dont have access";
		else
		{
			$sql = "SELECT * FROM users WHERE name='".$_SESSION['logged_user']."'";
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			if ($row['admin'] == 1)
			{
				$b = "Success<br>".$_POST['name'];
				if ($_POST['submit'] && $_POST['submit'] == "Modify product" && $_POST['name'] && $_POST['price'] && $_POST['href'])
				{
					$sql = "UPDATE products SET name='".$_POST['name']."', price='".$_POST['price']."', href='".$_POST['href']."', description='".$_POST['description']."' WHERE id='".$_POST['id']."'";
					if ($conn->query($sql) !== TRUE)
						$b = "Error to update DB";
				}
			}
			else
				$b = "You dont have access";
		}
		$conn->close();
	?>
	<div class="register_message"><br><br><br><br>
		<?php echo $b?></div>
	<?php require_once("footer.php");?>
</body>
</html>