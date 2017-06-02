<?php
$url = 'http://www.developpez.net/template/images/logo.png';
 
$path = pathinfo($url);
$extension = isset($path['extension']) ? strtolower($path['extension']) : null;
if(in_array($extension, array('jpg','jpeg','JPG','PNG','png','gif')))
{
	$dossier = 'dossier_destination/';
	$nouveau_nom = 'copy_'.$path['basename'];
	$current = file_get_contents($url);
	file_put_contents($dossier.$nouveau_nom, $current);
}
?>