<?php
require_once 'config/setup.php';
session_start ();
if ($_GET['login'] == "" || $_GET['cle'] == "")
	header('Location: index.php');
$login = $_GET['login'];
$cle = $_GET['cle'];

try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE login=:login");
        if ($stmt->execute(array(":login"=>$login)) && $row = $stmt->fetch())
        {
        	$clebdd = $row['cle'];
    		$actif = $row['actif'];
        }
        if($actif == '1')
		{
		     echo "Votre compte est déjà actif !";
		}
		else
		{
		    if($cle == $clebdd)
		    {
		       $stmt = $db_con->prepare("UPDATE user_db SET actif = 1 WHERE login =:login ");
		       $stmt->execute(array(':login'=>$login));
		       header('Location: login.php');
		    }
		    else
		    {
		       echo "Erreur ! Votre compte ne peut être activé...";
		    }
		}
 
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>