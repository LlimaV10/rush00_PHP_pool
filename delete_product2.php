<!DOCTYPE html>
<html>
<head>
	<title>Delete product</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
</head>
<body>
	<?php
		require_once("menu.php");
		$b = "Successfully deleted";
		require_once("connect_DB.php");
		$sql = "SELECT * FROM products WHERE name='".$_POST['name']."'";
		$res = $conn->query($sql);
		if ($res->num_rows < 1)
			$b = "There is no such product";
		else
		{
			$row1 = $res->fetch_assoc();
			$cat = explode(' ', $row1['categories']);
			foreach ($cat as $v)
				if ($v || $v == "0")
				{
					$sql = "SELECT * FROM categories WHERE id='".$v."'";
					$res = $conn->query($sql);
					$row = $res->fetch_assoc();
					$ids = $row['products'];
					$newids = "";
					$sids = explode(' ', $ids);
					foreach ($sids as $v2)
						if ($v2 || $v2 == "0")
							if ($v2 != $row1['id'])
								$newids .= " ".$v2;
					$sql = "UPDATE categories SET products='".$newids."' WHERE id='".$v."'";
					$conn->query($sql);
				}
			$sql = "DELETE FROM products WHERE name='".$_POST['name']."'";
			$conn->query($sql);
		}
	?>
	<br><br><br><br><br><br><br><br>
	<div class="register_message">
		<?php echo $b; ?>
	</div>
	<?php require_once("footer.php"); ?>
</body>
</html>