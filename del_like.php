<?php
require 'config/setup.php';
session_start ();
$image = $_GET['image'];
$user = $_SESSION['login'];
try
{
    $stmt = $db_con->prepare("UPDATE `Camagru`.`images` SET `images`.`likes` = `images`.`likes`-1 WHERE `images`.`img_nom`=\"$image\" ;");
    $stmt->execute();
    $stmt = $db_con->prepare("DELETE FROM `Camagru`.`like` WHERE image=\"$image\" && user=\"$user\"");
    $stmt->execute();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>