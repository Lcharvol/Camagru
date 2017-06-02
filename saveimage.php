<?php
session_start ();

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

function    verifname($img_nom)
{
    require 'config/setup.php';
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM images WHERE img_nom=:img_nom");
        $stmt->execute(array(":img_nom"=>$img_nom));
        $count = $stmt->rowCount();
        if($count == 0)
          return($img_nom);
        else
            return(verifname("1".$img_nom));
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

function    transfert()
{
    ini_set('upload-max-filesize', '10M');
    ini_set('post_max_size', '10M');
    $name = $_FILES['fic']['name'];
    $dossier = 'tmp_img/';
    $extensions = array('.png', '.jpg','.JPG', '.jpeg');
    $extension = strrchr($name, '.');
    if(!in_array($extension, $extensions))
        $_SESSION['error'] = "Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...";
    else if (strpos($name, ' ') != FALSE)
         $_SESSION['error'] = "Nom de l'image incorect";
    else
    {
        $name = verifname($name);
        $fichier = basename($name);
        if(move_uploaded_file($_FILES['fic']['tmp_name'], $dossier . $fichier))
        {
            // add_image_to_table($name, "10000", $extension, $_SESSION['login']);
        }
        else
            $_SESSION['error'] = 'Echec de l\'upload !';
    }
    header('Location: index.php');
}
if (isset($_FILES['fic']['name']))
{
    transfert();
    $_SESSION['upload'] = "ok";
}
?>
