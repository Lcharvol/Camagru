<?php
session_start ();
require 'config/setup.php';
$add_date   = date('Y-m-d H:i:s');
$from = $_SESSION['login'];
$image = $_POST['img'];
$comment = $_POST['text'];
try
{
    $stmt = $db_con->prepare("INSERT INTO Comment(user,image,comment,date) VALUES(:user, :image, :comment, :date)");
    $val = $stmt->execute(array(":user"=>$from, ":image"=>$image,":comment"=>$comment, ":date"=>$add_date));
    if($val)
        $_SESSION['error'] = 'Commentaire effectué avec succès !';      
    else
        $_SESSION['error'] = 'Echec !';
    send_comment_email();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>