<?php
require 'config/setup.php';
session_start ();
$image = $_POST['img'];
$user = $_SESSION['user'];
try
{
    $stmt = $db_con->prepare("DELETE FROM `Camagru`.`images` WHERE `images`.`img_nom`='$image';");
    $stmt->execute();
    $stmt = $db_con->prepare("DELETE FROM `Camagru`.`Comment` WHERE `Comment`.`image` = '$image';");
    $stmt->execute();
    $stmt = $db_con->prepare("DELETE FROM `Camagru`.`like` WHERE `like`.`image`='$image';");
    $stmt->execute();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
unlink("img_gallery/".$image."");
?>