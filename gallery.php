<?php
session_start ();
include ("saveimage.php");
require 'config/setup.php';
if ($_SESSION['login'] == "")
	header('Location: login.php');
if (isset($_FILES['fic']) )
   transfert();
?>
<head>
	<meta charset="UTF-8">
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
	<?php
	include ("aff_gallery.php");
	?>
</body>
	<script type="text/javascript" src="js/comment.js"></script>
	<script type="text/javascript" src="js/like.js"></script>
	<script type="text/javascript" src="js/delete_image.js"></script>
</html>