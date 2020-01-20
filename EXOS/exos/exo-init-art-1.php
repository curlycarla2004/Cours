<?php

//Taille de l'image.
$width = 1096;
$height = 300;

//Création de l'image.
$image = imagecreatetruecolor($width, $height);


//Allocation du rouge pour l'image.
$red = imagecolorallocate($image, 255, 0, 0);
$black = imagecolorallocate($image, 0, 0, 0);


for($y = 0; $y < $height; $y++){
  for($x = 0; $x < $width; $x++){
      //si x est superieur à la moitié de la longeur de l'image
      if($x >= ($width/2)){
      imagesetpixel($image, $x, $y, $red);
    }
    else{
      imagesetpixel($image, $x, $y, $black);
    }
  }
}

header('Content-type: image/png');
imagepng($image);


?>