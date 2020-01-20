<?php 
$source = imagecreatefromjpeg("images/image_nature3.jpg"); //la photo est la source
$destination = imagecreatetruecolor(400, 250); // On crée la miniature vide

//les fonctions imagesx et magesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

//On crée la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

//on eregistre la miniature sous le nom
// header('Content-type : image/jpg');
imagejpeg($destination, "images/thumbnails/image_nature3-mini.jpg", 100);


?>