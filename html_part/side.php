<div id="side">
<a href="index.php">
	<div class="loader">
		<div class="loader-inner">
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div id="center-loader"></div>
		</div>
	</div>
</a>
	<?php
		include 'aff_appercu_gallery.php';
		$url = $_SERVER['PHP_SELF']; 
    	$url = basename($url);
		if ($url != "gallery.php")
			echo "<div id=\"btngallery\"><a href=\"gallery.php\"><input type=\"button\" id=\"buttonGallery\" value=\"Gallery\"/></a></div>";
		if($url == "gallery.php")
			echo "<div id=\"btnaccueil\"><a href=\"index.php\"><input type=\"button\" id=\"buttonGallery\" value=\"Accueil\"/></a></div>";
		echo "<div id=\"btngallery\"><a href=\"logout.php\"><input type=\"button\" id=\"buttonGallery\" value=\"Logout\"/></a></div>";
		if ($url != "gallery.php")
		{
			echo "<div id=\"appercu_gallery\">";
			aff_appercu_gallery();
			echo "</div>";
		}
	?>
</div>