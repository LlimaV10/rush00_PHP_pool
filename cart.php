<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="style_sign.css">
	<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
	<?php require_once("menu.php"); ?>
	<br><br><br>
	<table>
		<?php
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$cart = $_SESSION['cart'];
			require_once("connect_DB.php");
			$sum = 0;
			foreach ($cart as $k => $v) {
				if ($v <= 0)
					continue;
				$sql = "SELECT * FROM products WHERE id='".$k."'";
				$res = $conn->query($sql);
				$raw = $res->fetch_assoc();
				$sum += $raw['price'] * $v;
				echo "<tr><td>".$raw['name']."</td><td><img src='".$raw['href']."'></td><td>Price: ".$raw['price']."$</td>";
				echo "<td>Count: ".$v."</td>";
				?>
				<td class="butt">
					<form action="minus_cart.php" method="POST">
						<input style="display: none;" type="text" name="page" value="cart.php">
						<input style="display: none;" type="text" name="id" value="<?php echo $raw['id']; ?>">
						<input type="submit" name="cart" value="-">
					</form>
				</td>
				<td class="butt">
					<form action="plus_cart.php" method="POST">
						<input style="display: none;" type="text" name="page" value="cart.php">
						<input style="display: none;" type="text" name="id" value="<?php echo $raw['id']; ?>">
						<input type="submit" name="cart" value="+">
					</form>
				</td>
				<td class="butt">
					<form style="margin-left: 100px;" action="clear_cart.php" method="POST">
						<input style="display: none;" type="text" name="page" value="cart.php">
						<input style="display: none;" type="text" name="id" value="<?php echo $raw['id']; ?>">
						<input type="submit" name="cart" value="x">
					</form>
				</td>
				<?php
			}
			$conn->close();
			if ($sum != 0) {
		?>
		<tr><td>
			Total price: <?php echo $sum ?>$
		</td></tr>
		<?php if ($_SESSION['logged_user']) { ?>
		<tr><td class="butt">
			<form action="confirm.php" method="POST">
				<input type="submit" name="condirm" value="confirm the order">
			</form>
		</td></tr>
		<?php }} ?>
	</table>
	<br>
	<?php require_once("footer.php"); ?>
</body>
</html>