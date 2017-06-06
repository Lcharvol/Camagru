<?php
require_once 'config/setup.php';
$email = $_POST['email'];
	try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE email=:email");
        $stmt->execute(array(":email"=>$email)) && $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count == 1)
        {
           $sujet = "Changer votre mot de passe - Camagru" ;
           $entete = "From: no_reply@camagru.com" ;
           $message = 'Pour changer votre mot de passe, veuillez cliquer
           sur le lien ci dessous
           ou copier/coller dans votre navigateur internet.
           http://localhost:8080/reset.php?email='.urlencode($email).'
           ---------------
           Ceci est un mail automatique, Merci de ne pas y répondre.';
           if (!mail($email, $sujet, $message, $entete))
           {
                $_SESSION['errorreg'] = "Probleme email";
               header('Location: login.php');
           }
           else
            {
               $_SESSION['errorreg'] = "mail send";
               header('Location: login.php');
            }
        }
        else
        {
          $_SESSION['errorlog'] = "Email incorect!";
          header('Location: login.php');
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>