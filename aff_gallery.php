<?php
function    affcom()
{
    require 'config/setup.php';
    $image = $_get['id']; 
    $stmt = $db_con->prepare("SELECT * FROM Comment");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $result = array_reverse($result);
    $i = 0;
     foreach ($result as $value) {
           echo "<div id=\"comment-elem\">
           <input id=\"hiddeninput\" type=\"hidden\" name=\"".$value['image']."\" value=\"\">
           <p>".$value['comment']."</p>
           <h1>From: ".$value['user']." (".$value['date'].")</h1>";
           if ($_SESSION['login'] == $value['user'])
            echo "<form action=\"delete_comm.php\" method=\"post\"><button class=\"croix_comm\" name=\"comment_id\" value=\"".$value['comment-id']."\"></button></form>";
        echo   "</div>";
     }
     echo "<p id=\"no_comm\"></p>";

}

function checklike($image)
{
    require 'config/setup.php';
    $user = $_SESSION['login'];
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM `Camagru`.`like`  WHERE image=\"$image\" && user=\"$user\"");
        $stmt->execute(array(":user"=>$user, ":image"=>$image));
        $count = $stmt->rowCount();
        if ($count == 1)
           return("imgs/coeur.png");
        else
            return("imgs/unlike.png");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    return("");
}

function    count_like($image)
{
    require 'config/setup.php';
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM `Camagru`.`like`  WHERE image=\"$image\"");
        $stmt->execute(array(":image"=>$image));
        $count = $stmt->rowCount();
        return($count);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

function    count_comm($image)
{
    require 'config/setup.php';
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM `Camagru`.`Comment`  WHERE image=\"$image\"");
        $stmt->execute(array(":image"=>$image));
        $count = $stmt->rowCount();
        return($count);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

function    aff_mini_image()
{
   require 'config/setup.php';
    $stmt = $db_con->prepare("SELECT * FROM images");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $result = array_reverse($result);
    $i = 0;
    foreach ($result as $value) {
        $name = $value['img_nom'];
        if ($i < 10)
        {
            echo "<div  class=\"imggallery ".$value['user_login']."\" style=\"background-image:url(img_gallery/".$value['img_nom'].");\">
                <div class=\"blackscreen\">";
            $i2++;
        }
        else
        {
            echo "<div class=\"imggallery ".$value['user_login']."\" style=\"display:none;background-image:url(img_gallery/".$value['img_nom'].");\">
                <div class=\"blackscreen\">";
        }
        if ($value['user_login'] == $_SESSION['login'])
            echo "<a onclick=\"delete_image(this)\" class=\"croix croix_".$value['img_nom']."\"><img src=\"imgs/croix.png\"></a>";
        echo    "<div id=\"coeur\"><img src=\"";
        echo    checklike($value['img_nom']);
        echo    "\" onclick=\"like('".$value['img_nom']."')\" class=\"like".$value['img_nom']."\"><p class=\"nb_like_".$value['img_nom']."\">";
        echo    count_like($value['img_nom']);
        echo        "</p></div>
                <div id=\"commentaire\" onclick=\"affcomment('".$value['img_nom']."')\"><img src=\"imgs/commentaire.png\"><p>";
        echo    count_comm($value['img_nom']);
        echo        "</p></div>
                <p>From: ".$value['user_login']."</p>
                </div>
            </div>";
        $i++;
    }
    echo "<div class=\"imggallery more_image\" onclick=\"aff_more_image()\" ></div>";
}

function    aff()
{
    require 'config/setup.php';
    include('html_part/side.php');
	include('html_part/topbarre.php');
	echo "<div id=\"maingallery\">";
    aff_mini_image();
    echo    "<div class=\"comment-zone\" id=\"comment\">
                    <div class=\"comment-zone-inner\">
                    <div class=\"croixcomment\" onclick=\"closecomment()\"></div>
                    <div id=\"image-comment-content\"><img id=\"image-comment\" src=\"\"></div>
                    <div id=\"comment-form\">
                        <form id=\"form_comment_submit\">
                            Your comment: </br><textarea placeholder=\"Type here..\" id=\"input-text-comment\" type=\"text\" name=\"comment\"></textarea>
                            <input id=\"hiddeninput\" type=\"hidden\" name=\"image\" value=\"\"><br>
                            <input id=\"buttoncomment\" type=\"submit\" name=\"Post\"value=\"Post\">
                        </form>
                    </div>
                    <div id=\"existent-comment\">";
                    affcom();              
    echo            "</div>
                </div></div>";
}
aff();
?>