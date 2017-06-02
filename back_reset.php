<?php
require_once 'config/setup.php';
session_start ();
if($_POST)
{
    $user_email     = $_POST['email'];
    $oldpassword  =  hash('sha256', $_POST['oldpassword']);
    $newpassword  =  hash('sha256', $_POST['newpassword']);
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE email=:email && password=:odpassword");
        $stmt->execute(array(":email"=>$user_email, ":password"=>$password));
        $count = $stmt->rowCount();
        if ($count == 1)
        {
            $_SESSION['login'] = "login";
            header('Location: index.php');
        }
        else
        {
            $_SESSION['errorlog'] = "Wrong input";
            header('Location: login.php');
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>