<?php
session_start ();
if ($_SESSION['login'] != "")
	header('Location: index.php');
?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
	<div class="loader-login">
	<div class="loader-inner">
		<div class="loader-line-wrap">
			<div class="loader-line"></div>
		</div>
		<div id="center-loader"></div>
	</div>
	</div>
	<div id ="loginregister">
		<div id="resetpassword">
			<form id="reset-form" method="POST" action="email_reset_password.php" onsubmit="return isValidreset()">
			<input class ="imputzone" type="email" name="email" id="emailres" placeholder="E-mail adress"></input>
			<input type="submit" name="submit" value="Send me an email" id="submit"/>
			<div onclick="moove2()"><a class="link"><p>Login</p></a></div>
			<p id = "errorContainer1" class="error">
				<?php
				if ($_SESSION['errorres'] != '')
				{
					echo $_SESSION['errorres'];
					$_SESSION['errorres'] = '';
				}
				?>
			</p>
			</form>
		</div>
		<div id="loginform">
			<form id="login-form" method="POST" action="back_login.php" onsubmit="return isValidlog()">
			<input class ="imputzone" type="login" name="login" id="emaillog" placeholder="Login"></input>
			<input class ="imputzone" type="password" name="password" id="passwordlog" placeholder="password"></input>
			<input type="submit" name="submit" value="Login" id="submit"/>
			<div onclick="moove()"><a class="link"><p>Register</p></a></div>
			<div onclick="moove2()"><a class="link"><p>Reset your password</p></a></div>
			<p id = "errorContainer2" class="error">
				<?php
				if ($_SESSION['errorlog'] != '')
				{
					echo $_SESSION['errorlog'];
					$_SESSION['errorlog'] = '';
				}
				?>
			</p>
			</form>
		</div>
		<div id="registerform">
			<form id="register-form" method="POST" action="back_register.php" onsubmit="return isValidregister()">
			<input class ="imputzone" type="email" name="email" id="emailreg" placeholder="E-mail adress"></input>
			<input class ="imputzone" type="text" name="login" id="loginreg" placeholder="Type your name here"></input>
			<input class ="imputzone"type="password" name="password" id="passwordreg" placeholder="Password"></input>
			<input type="submit" name="submit" value="Register" id="submit"/>
			<div onclick="moove()"><a class="link"><p>Login</p></a></div>
			<p id = "errorContainer3" class="error">
				<?php
				if ($_SESSION['errorreg'] != '')
				{
					echo $_SESSION['errorreg'];
					$_SESSION['errorreg'] = '';
				}
				?>
			</p>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/resetpasswd.js"></script>
<script type="text/javascript" src="js/moovediv.js"></script>
</html>
