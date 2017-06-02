<?php
require 'config/setup.php';
session_start ();
$image = $_GET['image'];
$user = $_SESSION['login'];
try
    {
        $stmt = $db_con->prepare("UPDATE `Camagru`.`images` SET `images`.`likes` = `images`.`likes`+1 WHERE `images`.`img_nom`=\"$image\";");
        $stmt->execute();
        $stmt2 = $db_con->prepare("INSERT INTO `Camagru`.`like`(user,image) VALUES(:user, :image)");
        $stmt2->execute(array(":user"=>$user, ":image"=>$image));
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>