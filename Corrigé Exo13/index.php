<?php

// Les fonctions
require_once 'fonctions.php';
require_once 'bdd.php';

?>
<html>
<head>
    <title>Mes magazines</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">

    <h3>Mes magazines</h3>

    <a href="ajouter.php" class="btn btn-primary float-right mb-3">Nouveau magazine</a>

    <?php

    if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['delete'] == true) {

        // Vérifier si le magazine à supprimer existe !
        $magazine = selectOneMagazine($_GET['id'], $db);
        if($magazine) {

            // Supprime la magazine en BDD
            deleteMagazine($_GET['id'], $magazine['image'], $db);

            echo '<div class="alert alert-success">Le magazine "'. $magazine['nom'] .'" à bien été supprimé !"</div>';
        }
        else {
            echo '<div class="alert alert-danger">Pas de magazine avec cet ID !</div>';
        }
    }

    $magazines = getAllMagazines($db);

    ?>

    <?php

    if($magazines) {
        echo createTable($magazines, true);
    }

    ?>

</div>

</body>
</html>