<?php
require 'class/Carte.php';

$carte = new Carte();

// $carte->setEnseigne('Pique');
// $enseigne = $carte->getEnseigne();
// echo $enseigne;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Card</title>
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
                $(document).ready(function(){
                $("#hide").click(function(){
                    $("h2").hide();
                });
                $("#show").click(function(){
                    $("h2").show();
                });
                });
        </script>
    </head>
    <body>
        <h1>What will your card be? Let see!<br></h1>
        <h2 id="card" style="display:none;"><?php $carte -> afficher();?></h2>

        <button id="show" >Show</button>
        <button id="hide" onclick='window.location.reload(false)'>Hide</button>
    </body>
</html>