<div id="header">
	<a href="index.php" ><div id="logo" ><p>Camagru</p></div></a>
	<?php
		if ($_SESSION['login'] == "login")
			print '	<div class="btnsignin"><a href="gallery.php" ><button class="btn1" type="button">My gallery</button></a></div>';
		if ($_SESSION['login'] == '')
			print '<div class="btnsignin"><a href="login.php" ><button class="btn1" type="button">Log in</button></a></div>';
		else
			print '<div class="btnsignin"><a href="logout.php" ><button class="btn1" type="button">Log-out</button></a></div>';
		if ($_SESSION['login'] == '')
			print '<div class="btnsignin"><a href="register.php" ><button class="btn1" type="button">Register</button></a></div>'
		?>
</div>