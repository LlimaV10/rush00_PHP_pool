<!DOCTYPE html>
<html>
<head>
	<title>Adding product</title>
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
			if ($row['admin'] == 1) {
				$b = "Success<br>";
				if ($_POST['submit'] && $_POST['submit'] == "Add product" && $_POST['name'] && $_POST['price'] && $_POST['href'])
				{
					$sql = "SELECT * FROM products WHERE name='".$_POST['name']."'";
					$res = $conn->query($sql);
					if ($res->num_rows > 0)
						$b = "This product name already taken\n";
					else {
						$sql = "SELECT * FROM categories";
						$res = $conn->query($sql);
						$categories = "";
						while ($row = $res->fetch_assoc())
						{
							if (isset($_POST["check".$row['id']]) == true)
								$categories = $categories." ".$row['id'];
						}
						if ($categories == "")
							$b = "Error, select some category\n";
						else
						{
							$sql = "INSERT INTO `products`(`id`, `name`, `price`, `description`, `categories`, `href`) VALUES (NULL, '".$_POST['name']."', ".$_POST['price'].", '".$_POST['description']."', '".$categories."', '".$_POST['href']."')";
							if ($conn->query($sql) !== TRUE)
								$b = "Failed to add to database products\n";
							else
							{
								$sql = "SELECT * FROM products WHERE name='".$_POST['name']."'";
								$res = $conn->query($sql);
								$prod_id = $res->fetch_assoc()['id'];
								$spl = explode(' ', $categories);
								foreach ($spl as $v)
									if ($v || $v == "0")
									{
										$sql = "SELECT * FROM `categories` WHERE id='".$v."'";
										$res = $conn->query($sql);
										$row = $res->fetch_assoc();
										$str_products = $row['products']." ".$prod_id;
										$sql = "UPDATE categories SET products='".$str_products."' WHERE id=".$v;
										if ($conn->query($sql) !== TRUE)
										{
											$b = "Failed to add to database categories ".$v."<br>";
											break;
										}
									}
							}
						}
					}
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