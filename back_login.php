<?php
require_once 'config/setup.php';
session_start ();
if($_POST)
{
    $login    = $_POST['login'];
    $user_password  = $_POST['password'];
    $password  =  hash('sha256', $_POST['password']);
    
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM user_db WHERE login=:login && password=:password");
        $stmt->execute(array(":login"=>$login, ":password"=>$password)) && $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count == 1)
        {
            if ($row['actif'] == 0)
            {
                $_SESSION['errorlog'] = "Your acount is not actived";
                header('Location: login.php');
            }
            else
            {
                $_SESSION['login'] = $login;
                header('Location: index.php');
            }
        }
        else
        {
            $_SESSION['errorlog'] = "Wrong login or password";
            header('Location: login.php');
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>