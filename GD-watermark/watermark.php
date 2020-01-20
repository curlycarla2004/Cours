<?php

$stamp = imagecreatefrompng('images/watermark/logo2.png');
$im = imagecreatefromjpeg('images/image_nature3.jpg');

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

header('Content-type: image/png');
imagejpeg($im);

imagedestroy($im);

?>