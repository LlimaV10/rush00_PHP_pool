<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<form action="add_cat2.php" method="POST">
		<br><br><br>
		New categories: <input type="text" name="cat" value="" required="required" placeholder="name new categories">
		<br>
		<input type="submit" class="button10" name="Add" value="Add">
	</form>
	<?php
		require_once("menu.php");
		require_once("footer.php");
	?>
</body>
</html>