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
    if(rand(0,10) > 9){
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


