<?php
session_start ();
include ("saveimage.php");
if ($_SESSION['login'] == "")
	header('Location: login.php');
?>
<head>
	<meta charset="UTF-8">
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="icon" type="image/ico" href="favicon.ico" />
	<script type="text/javascript" src="js/upload_image.js"></script>
</head>
<body>
<?php
include('html_part/side.php');
?>
<div id="all">
	<div id="minigallery">
		<form enctype="multipart/form-data" action="saveimage.php" method="post">
	        <input class="input_upload" type="hidden" name="MAX_FILE_SIZE" value="1048576" />
	        <label for="select" class="label-file">Find...</label>
	        <input id="select" class="input_upload" type="file" name="fic" size=50 />
	      	<input class="btn_upload" type="submit" value="Envoyer" />
	     </form>
	</div>
	<div id="aff_minigallery">
		<img onclick="show_upload()" src="imgs/Download-logo.png" id="download_logo"></img>
		<p>Upload a file</p>
		<p id = "errorContainer3" class="error">
		     <?php
		      	echo $_SESSION['error'];
		     ?>
	    </p>
	</div>
	<div id="mainindex" >
		<div id="mainindex-inner">
			<div id="filtres">
				<form>
					<p>
		   				<input class="chat" type="radio" name="filtre" id="test1">
		   				<label for="test1">chat</label>
					</p>
					<p>
		   				<input class="masque" type="radio" name="filtre" id="test2">
		   				<label for="test2">masque</label>
					</p>
					<p>
		   				<input class="licornes" type="radio" name="filtre" id="test3">
		   				<label for="test3">licornes</label>
					</p>
					<p>
		   				<input class="marron" type="radio" name="filtre" id="test4">
		   				<label for="test4">Filtre bleu</label>
					</p>
				</form>
			</div>
			<div id="menuphoto">
				<div class="filtres_visu"></div>
				<div id="ecran"><video id="video" autoplay="autoplay"></video></div>
				<a onclick="go()" ><div class="inputbox"><img disabled="disabled" onclick="snapshot()" class="buttonSnap" src="imgs/photobutton.png" alt="monimage"></div></a>
			</div>
			<div id="photo">
				<div class="filtres_visu2"></div>
				<canvas id="canvas"></canvas>
				<a>
					<div class="inputbox">
						<img onclick="save_photo()" class="photo_save buttonSnap" src="imgs/logosave.png" alt="monimage">
						<p id="retour_save">SEND!</p>
					</div>
				</a>
			</div>
			<?php
				if (file_exists("tmp_img/img_tmp.png"))
					echo "<img id=\"hidden_img\" src=\"tmp_img/img_tmp.png\"></img>";
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/camera.js"></script>
<script type="text/javascript" src="js/smooth_ancre.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<?php
	if (file_exists("tmp_img/img_tmp.png"))
	{
		echo " <script type=\"text/javascript\">
				window.onload=function()
				{
					var canvas = document.getElementById('canvas');
					canvas.style.position = 'relative';
					canvas.style.visibility = 'visible';
					canvas.style.display = 'inline-block';
					img = document.getElementById('hidden_img');
					canvas.width = img.width;
					canvas.height = img.height;
					canvas.getContext('2d').drawImage(img, 0, 0);
					var appercu = document.getElementById('photo');
					appercu.style.position = 'relative';
					appercu.style.visibility = 'visible';
					appercu.style.display = 'inline-block';
				}
				</script>";
	};
	if ($_SESSION['upload'] == "ok")
	{
		echo "<script>transfert()</script>";
		$_SESSION['upload'] = "ko";
	};
?>
</body>
</html>