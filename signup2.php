<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<?php
		require_once("connect_DB.php");
		$b = 0;
		if ($_POST['submit'] && $_POST['submit'] == "Register" && $_POST['login'] && $_POST['passwd'])
		{
			$sql = "SELECT * FROM users WHERE name='".$_POST['login']."'";
			$users = $conn->query($sql);
			$b = 1;
			if ($users->num_rows < 1) {
				$sql = "INSERT INTO `users` (`id`, `name`, `pass`, `admin`) VALUES (NULL, '".$_POST['login']."', '".hash("md5", $_POST['passwd'])."', '0');";
				if ($conn->query($sql) !== TRUE)
					$b = 0;
				else
				{
					session_start();
					$_SESSION['logged_user'] = $_POST['login'];
				}
			}
			else
				$b = 0;
		}
		$conn->close();
	?>
	<div class="register_message"><br><br><br><br>
		<?php if ($b) echo "New account successfully created\n"; else echo "Incorrect Username or password\n"; ?></div>
	<?php
		require_once("menu.php");
		require_once("footer.php");
	?>
</body>
</html>