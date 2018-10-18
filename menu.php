<div class="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="macbook.php?categories=Laptops">Laptops</a></li>
		<li><a href="macbook.php?categories=Monitors">Monitors</a></li>
		<li><a href="macbook.php?categories=Peripherals">Peripherals</a></li>
		<li><a href="macbook.php?categories=Tablets">Tablets</a></li>
		<li><a href="cart.php">Cart</a></li>
	</ul>
</div>
<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!$_SESSION['logged_user']) {?>
<div class="auth">
	<ul>
		<li><a href="singin.php">Sign in</a></li>
		<li style="margin: 14px 8px;">/</li>
		<li><a href="signup.php">Sign up</a></li>
	</ul>
</div>
<?php } else {?>
<div class="auth">
	<ul>
		<li><a href="admin_page.php"><?php echo $_SESSION['logged_user']?></a></li>
		<li style="margin: 14px 8px;"></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<?php } ?>