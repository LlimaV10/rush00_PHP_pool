<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<form action="signup2.php" method="POST">
		<br><br><br>
		Your username: <input type="text" name="login" value="" required="required" placeholder="usename">
		<br>
		Your password: <input type="password" name="passwd" value="" required="required" placeholder="password">
		<br>
		<input type="submit" class="button10" name="submit" value="Register">
	</form>
	<?php
		require_once("menu.php");
		require_once("footer.php");
	?>
</body>
</html>