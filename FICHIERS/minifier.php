<?php

require_once('fonctions/minified-file.php');
// $fichier_styles_min = 'styles.min.css';

// La CSS non minifiée.
$ma_css = 'css/styles.css';

// css minifiée.
$min_css = minified_this_file($ma_css);
// var_dump($min_css);

if ($min_css){
    $handle = fopen('css/styles.min.css', 'w');
    //on ecrit la chaine qui compose la css Minifie
    fwrite($handle, $min_css);

    //fermeture du fichier
    fclose($handle);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>HELLOOOOO</h1>
    <div class="heart"></div>
    
</body>
</html>

