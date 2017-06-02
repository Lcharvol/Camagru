<?php
session_start(); 
function    add_image_to_table($img_nom, $img_taille, $img_type, $user_login)
{
    require 'config/setup.php';
    try
    {
        $stmt = $db_con->prepare("INSERT INTO images(img_nom,img_taille,img_type,user_login) VALUES(:img_nom, :img_taille, :img_type, :user_login)");
        $val = $stmt->execute(array(":img_nom"=>$img_nom, ":img_taille"=>$img_taille,":img_type"=>$img_type,":user_login"=>$user_login));
        if($val)
            $_SESSION['error'] = 'Upload effectué avec succès !';      
        else
            $_SESSION['error'] = 'Echec de l\'upload !';
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

function    get_img_name($int)
{
    require 'config/setup.php';
    $name = "new_image_";
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM images");
        $stmt->execute();
        $count = $stmt->rowCount() + $int;
        $name = $name.$count.".png";
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM images WHERE img_nom=:img_nom");
        $stmt->execute(array(":img_nom"=>$name));
        $count = $stmt->rowCount();
        if ($count != 0)
            return(get_img_name($int + 1));
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    return($name);
}

function    add_filter($filtre, $name)
{
    header("Content-type: image/png");
    
    $largeur = 640;
    $hauteur = 480;
    $rendu = imagecreatetruecolor($largeur, $hauteur);
    $fond = imagecolorallocatealpha($rendu,  0, 128, 255, 0);
    imagefill($rendu, 0, 0, $fond);
    $image1 = imagecreatefrompng("img_gallery/".$name);
    if ($filtre === "licornes")
       $image2 = imagecreatefrompng("imgs/cadre_licorne.png");
    else if ($filtre === "masque")
        $image2 = imagecreatefrompng("imgs/masque_paul.png");
    else if ($filtre === "chat")
        $image2 = imagecreatefrompng("imgs/cadre_chaton.png");
    else if ($filtre === "marron")
        $image2 = imagecreatefrompng("imgs/blue_filtre.png");
    imagecopy($rendu, $image1, 0, 0, 0,0, $largeur, $hauteur);
    imagecopy($rendu, $image2, 0, 0, 0,0, 640, 480);
    imagesavealpha($rendu, true);
    imagepng($rendu, "img_gallery/".$name);
}

$img = $_POST['img'];
$filtre = $_POST['filtre'];
$name = get_img_name(0);
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir."img_gallery/".$name;
add_image_to_table($name, 1, "png", $_SESSION['login']);
$success = file_put_contents($file, $data);
add_filter($filtre, $name);
echo $file;
?>