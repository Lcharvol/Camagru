<?php
function aff_appercu_gallery()
{
    session_start ();
    require 'config/setup.php';
    $user = $_SESSION['login'];
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM images WHERE user_login=:user");
        $stmt->execute(array(":user"=>$user));
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $result = array_reverse($result);
    $i = 0;
    foreach($result as $key)
    {
        if ($i < 10)
            echo "<div class=\"mini_image\" style=\"background-image:url(img_gallery/".$key['img_nom'].")\" ></div>";
        $i++;
    }
}

?>