<?php
require_once 'config/setup.php';
session_start ();
if($_POST)
{
    $user_name      = $_POST['login'];
    $user_email     = $_POST['email'];
    $user_password  = $_POST['password'];
    $joining_date   = date('Y-m-d H:i:s');
    $cle = md5(microtime(TRUE)*100000);
    
    $password = hash('sha256', $_POST['password']);
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE email=:email");
        $stmt->execute(array(":email"=>$user_email));
        $count = $stmt->rowCount();
        if ($count == 0){

            $stmt = $db_con->prepare("INSERT INTO user_db(login,email,password,creation_date, cle) VALUES(:login, :email, :password, :creation_date, :cle)");
            $val = $stmt->execute(array(":login"=>$user_name, ":email"=>$user_email, ":password"=>$password,":creation_date"=>$joining_date,":cle"=>$cle));
            if($val)
            {
                $to = $user_email;
                $sujet = "Activer votre compte - Camagru" ;
                $entete = "From: no_reply@camagru.com" ;
                $message = 'Bienvenue sur Camagru !
                Pour activer votre compte, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.
                http://localhost:8080/Camagru_last/validation.php?login='.urlencode($user_name).'&cle='.urlencode($cle).'
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.';
                if (!mail($to, $sujet, $message, $entete))
                {
                     $_SESSION['errorreg'] = "Probleme email";
                    header('Location: login.php');
                }
                else
                 {
                    $_SESSION['errorreg'] = "mail send";
                    header('Location: login.php');
                }
                $_SESSION['errorreg'] = "";
                header('Location: login.php');
            }
            else
            {
                $_SESSION['errorreg'] = "Could not execute !";
            }
        }
        else{
            $_SESSION['errorreg'] = "Already registered";
            header('Location: login.php');
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>