<!DOCTYPE html>
<html>
<head>
	<title>Adding product</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
	<style type="text/css">
		form {
			float: left;
			text-align: left;
			padding: 0px 50px;
		}
		form td {
			width: 50vw;
			padding-left: 15vw;
		}
		textarea {
			font-family: sans-serif;
			font-size: 12px;
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
			if ($row['admin'] == 1) {
	?>
	<form action="add_product2.php" method="POST" id="add_product">
		<table><tr>
			<td>
				<br><br><br>
				Product name: <input type="text" name="name" value="" required="required" placeholder="ManBook">
				<br>
				Price: <input type="number" name="price" value="" required="required" placeholder="500$">
				<br>
				Image href: <input type="text" name="href" value="" required="required" placeholder="http:// ...">
				<br>
				Description: <br>
				<textarea rows="8" cols="50" name="description" form="add_product"></textarea>
				<br>
				<input type="submit" class="button10" name="submit" value="Add product">
			</td>
			<td>
				<br><br><br>
				Categories:<br>
				<?php
					$sql = "SELECT * FROM categories";
					$res = $conn->query($sql);
					if ($row = $res->fetch_assoc())
						echo '<div>'.$row['name'].' <input type="checkbox" name="check'.$row['id'].'" checked></div>';
					while ($row = $res->fetch_assoc())
						echo '<div>'.$row['name'].' <input type="checkbox" name="check'.$row['id'].'"></div>';
					$conn->close();
				?>
			</td>
		</tr></table>
	</form>
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