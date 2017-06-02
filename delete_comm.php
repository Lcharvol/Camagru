<?php
require_once 'config/setup.php';
session_start ();

$comment_id = $_POST['comment_id'];
$stmt = $db_con->prepare("DELETE FROM `Camagru`.`Comment` WHERE `Comment`.`comment-id` = $comment_id ;");
$stmt->execute();
header('Location: gallery.php');
?>