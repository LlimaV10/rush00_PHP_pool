<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<?php
		require_once("connect_DB.php");
		if ($_POST['submit'] && $_POST['submit'] == "Login" && $_POST['login'] && $_POST['passwd'])
		{
			$sql = "SELECT * FROM users WHERE name='".$_POST['login']."'";
			$users = $conn->query($sql);
			$b = 0;
			if ($users->num_rows > 0)
			{
				$row = $users->fetch_assoc();
				if ($row['name'] == $_POST['login'] && $row['pass'] == hash("md5", $_POST['passwd']))
				{
					session_start();
					$_SESSION['logged_user'] = $_POST['login'];
					$sql = "SELECT * FROM cart WHERE user_name='".$_POST['login']."'";
					$res = $conn->query($sql);
					if ($res->num_rows > 0)
					{
						$row = $res->fetch_assoc();
						$uns = unserialize($row['products']);
						foreach ($uns as $k => $v) {
							$_SESSION['cart'][$k] += $v;
						}
					}
					$scart = serialize($_SESSION['cart']);
					$sql = "SELECT * FROM cart WHERE user_name='".$_SESSION['logged_user']."'";
					$res = $conn->query($sql);
					if ($res->num_rows < 1)
					{
						$sql = "INSERT INTO cart (user_name, products) VALUES ('".$_SESSION['logged_user']."', '".$scart."')";
						$conn->query($sql);
					}
					else
					{
						$sql = "UPDATE cart SET products='".$scart."' WHERE user_name='".$_SESSION['logged_user']."'";
						$conn->query($sql);
					}
					$b = 1;
				}
			}
		}
		$conn->close();
	?>
	<div class="register_message"><br><br><br><br>
		<?php if ($b) echo "Success\n"; else echo "Incorrect Username or password\n"; ?></div>
	<?php
		require_once("menu.php");
		require_once("footer.php");
	?>
</body>
</html>