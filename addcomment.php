<?php
session_start ();
require 'config/setup.php';

function 	send_comment_email($from)
{
    require 'config/setup.php';
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE login=:login");
        $stmt->execute(array(":login"=>$from)) && $row = $stmt->fetch();
        $email = $row['email'];
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
	$sujet = "Nouveau Commentaire - Camagru" ;
    $entete = "From: no_reply@camagru.com" ;
    $message = 'Bonjour,
    '.$from.' viens tous juste de commenter l\'une de vos image
    ---------------
    Ceci est un mail automatique, Merci de ne pas y répondre.';
    if (!mail($email, $sujet, $message, $entete))
    {
        $_SESSION['errorreg'] = "Probleme email";
        header('Location: login.php');
    }
}

$add_date   = date('Y-m-d H:i:s');
$from = $_SESSION['login'];
$image = $_POST['img'];
if (empty($_POST['text']))
    return;
$comment = htmlspecialchars($_POST['text']);
try
{
    $stmt = $db_con->prepare("INSERT INTO Comment(user,image,comment,date) VALUES(:user, :image, :comment, :date)");
    $val = $stmt->execute(array(":user"=>$from, ":image"=>$image,":comment"=>$comment, ":date"=>$add_date));
    send_comment_email($from);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>