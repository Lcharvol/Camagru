<?php
require_once 'config/setup.php';
session_start ();
$email = $_GET['email'];
$new_passwd = hash('sha256', $_POST['new_passwd']);
$repeat_new_passwd = hash('sha256', $_POST['repeat_new_passwd']);
if ($_POST['new_passwd'] != "" && $_POST['repeat_new_passwd'] != "")
{
	if ( $new_passwd !== $repeat_new_passwd)
	{
		$_SESSION['reset_mss'] = "Mot de passe incorect";
	}
	else
	{
		try
   		{
   		    $stmt = $db_con->prepare("UPDATE user_db SET password=:password WHERE email =:email ");
		   	$stmt->execute(array(':password'=>$new_passwd, ':email'=>$email));
		   	$_POST['new_passwd'] = "";
		   	$_POST['repeat_new_passwd'] = "";
		   	header('Location: login.php');
   		    
   		}
   		catch(PDOException $e){
   		    echo $e->getMessage();
   		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div id="loginform">
			<form id="reset-form" method="POST" action="" onsubmit="return isValidreset()">
			<input class ="imputzone" type="text" name="new_passwd" id="new_passwd" placeholder="New password"></input>
			<input class ="imputzone" type="text" name="repeat_new_passwd" id="new_passwd" placeholder="Repeat new password"></input>
			<input type="submit" name="submit" value="Reset" id="submit"/>
			</form>
			<p id = "errorContainer1" class="error">
			<?php
				if ($_SESSION['reset_mss'] != '')
				{
					echo $_SESSION['reset_mss'];
					$_SESSION['reset_mss'] = '';
				}
				?>
			</p>
</div>
</body>
</html>