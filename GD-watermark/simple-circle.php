<?php
//Nouvelle image
$image = imagecreatetruecolor(400, 300);

//Couleur de fond
$bg = imagecolorallocate($image, 100, 120, 45);
imagefill($image, 0, 0, $bg);

//Couleur de remplissage de l'ellipse
$col_ellipse = imagecolorallocate($image, 255, 255, 255);

//On dessine l'ellipse blanche
imagefilledellipse($image, 200, 150, 300, 100, $col_ellipse);



//on affiche l'image
// $image = imagecreatetruecolor(400, 300);
header("Content-type: image/png");
imagepng($image);


?>
