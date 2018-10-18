<!DOCTYPE html>
<html>
<head>
	<title>Add Categories</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
<?php
	require_once("menu.php");
	require_once("connect_DB.php");
	if ($_POST['Add'] && $_POST['Add'] == "Add" && $_POST['cat'])
	{
		$sql = "INSERT INTO `categories`(`id`, `name`, `products`)  VALUES (NULL, '".$_POST['cat']."', '0' )";
		$res = $conn->query($sql);
		echo "<div class=\"register_message\"><br><br><br><br><h3>Категоря добавлена</h3></div>";
		$conn->close();
        }
?>
<?php
	require_once("menu.php");
	require_once("footer.php");
?>
</body>
</html>
