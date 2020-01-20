<?php

//Taille de l'image.
$width = 900;
$height = 300;

//Création de l'image.
$image = imagecreatetruecolor($width, $height);

$green = imagecolorallocate($image, 0,146,70);
$white = imagecolorallocate($image, 241, 242, 241);
$red = imagecolorallocate($image, 206,43,55);

$tiers = $width/3;

for($y = 0; $y < $height; $y++){
  for($x = 0; $x < $width; $x++){
      if($x<$tiers){
        imagesetpixel($image, $x, $y, $green);
      }
      elseif($x>= (2*$tiers)){
        imagesetpixel($image, $x, $y, $red);
      }
      else{
          imagesetpixel($image, $x, $y, $white);
      }
    }
}

header('Content-type: image/png');
imagepng($image);

?>