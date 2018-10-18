<!DOCTYPE html>
<html>
<head>
	<title>ManBooks</title>
 	<link rel="stylesheet" type="text/css" href="style1.css">
 	<script type="text/javascript" src="script1.js"></script>
</head>
<body>
	<?php require_once("menu.php"); ?>
	<div class="main_img">
		<div>
			ManBook Pro X<br><br>
			We created what we needed!
			<div>Modern engineering idea<br>
			Great design<br>
			Retina LCD display</div>
			<img src="img/notebook.png">
		</div>
	</div>
	<br>
	<div class="categories">
		<div class="c1">
			Laptops
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='Laptops'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 4)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=Laptops'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							// "<button data-prod_id='".$raw['id']."' class='add_to_cart'>Add to cart</button></div></td>";
							$i++;
						}
				?>
			</tr></table>
		</div>
		<div class="c2">
			Monitors
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='Monitors'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 4)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=Monitors'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							$i++;
						}
				?>
			</tr></table>
		</div>

		<div class="c3">
			Peripherals
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='Peripherals'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 2)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=Peripherals'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							$i++;
						}
				?>
			</tr></table>
		</div>

		<div class="c4">
			Speakers
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='Speakers'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 2)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=Speakers'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							$i++;
						}
				?>
			</tr></table>
		</div>

		<div class="c5">
			Tablets
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='Tablets'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 2)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=Tablets'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							$i++;
						}
				?>
			</tr></table>
		</div>

		<div class="c6">
			MP3 players
			<table><tr>
				<?php
					require_once("connect_DB.php");
					$sql = "SELECT * FROM categories WHERE name='MP3'";
					$res = $conn->query($sql);
					$raw = $res->fetch_assoc();
					$products = $raw['products'];
					$spl = explode(' ', $products);
					$i = 0;
					foreach ($spl as $v)
						if (($v || $v == "0") && $i < 2)
						{
							$sql = "SELECT * FROM products WHERE id='".$v."'";
							if (!($res = $conn->query($sql)))
								continue;
							if (!($raw = $res->fetch_assoc()))
								continue;
							echo "<td><div><a href='macbook.php?categories=MP3'><div>".$raw['name']."</div><img src='".$raw['href']."'>";
							echo "<div>Price: ".$raw['price']."$</div></a>";
							echo '<form action="add_to_cart.php" method="POST"><input style="display: none;" type="text" name="page" value="index.php"><input style="display: none;" type="text" name="id" value="'.$raw['id'].'"><input type="submit" name="cart" value="Add to cart"></form>';
							$i++;
						}
				?>
			</tr></table>
		</div>
	</div>
	<?php require_once("footer.php"); ?>
	
</body>
</html>