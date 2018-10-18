<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$cart = $_SESSION['cart'];
	if ($cart[$_POST['id']])
	{
		$cart[$_POST['id']] += 1;
		$_SESSION['cart'] = $cart;
		if ($_SESSION['logged_user'])
		{
			require_once("connect_DB.php");
			$scart = serialize($cart);
			$sql = "SELECT * FROM cart WHERE user_name='".$_SESSION['logged_user']."'";
			$res = $conn->query($sql);
			if ($res->num_rows < 1)
			{
				$sql = "INSERT INTO cart (user_name, products) VALUES ('".$_SESSION['logged_user']."', '".$scart."')";
				if ($conn->query($sql) !== TRUE)
					echo "Error\n";
			}
			else
			{
				$sql = "UPDATE cart SET products='".$scart."' WHERE user_name='".$_SESSION['logged_user']."'";
				if ($conn->query($sql) !== TRUE)
					echo "Error\n";
			}
		}
	}
	require_once($_POST['page']);
?>