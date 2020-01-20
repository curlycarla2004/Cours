<?php

require_once 'bdd.php';
require_once 'fonctions.php';

// Sélectionne un magazine
$magazine = selectOneMagazine($_GET['id'], $db);

// Suppression d'un magazine
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['delete']) && $_GET['delete'] == true) {
    deleteMagazine($_GET['id'], $magazine['image'], $db);
    header('Location: index.php');
}

?>
<html>
<head>
    <title>Mes magazines - Détails d'un magazine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">

    <?php if(!$magazine): ?>

        <h3>Pas de magazine !</h3>
        <a href="index.php">Retour à la liste des magazines</a>

    <?php else: ?>

        <h3><?= strip_tags($magazine['nom']) ?></h3>

        <a href="index.php">Retour à la liste des magazines</a>

        <div class="row mt-5">

            <div class="col-12 py-3">
                <p>
                    <a href="details.php?id=<?= $magazine['id'] ?>&delete=true" class="btn btn-danger float-right">Supprimer</a>
                    <a href="editer.php?id=<?= $magazine['id'] ?>" class="btn btn-secondary mr-4 float-right">Mettre à jour</a>
                </p>
            </div>

            <!-- Colonne ID -->
            <div class="col-4"><strong>ID</strong></div>
            <div class="col-8 mb-4"><?= $magazine['id'] ?></div>

            <!-- Colonne Description -->
            <div class="col-4"><strong>Description</strong></div>
            <div class="col-8 mb-4"><?= strip_tags($magazine['description']) ?></div>

            <!-- Colonne Image -->
            <div class="col-4"><strong>Image</strong></div>
            <div class="col-8 mb-4">
                <img src="<?= strip_tags($magazine['image']) ?>" alt="<?= strip_tags($magazine['nom']) ?>" class="w-50">
            </div>

            <!-- Colonne Prix -->
            <div class="col-4"><strong>Prix</strong></div>
            <div class="col-8 mb-4"><?= strip_tags($magazine['prix']) ?> €</div>

            <!-- Colonne Editeur -->
            <div class="col-4"><strong>Editeur</strong></div>
            <div class="col-8"><?= strip_tags($magazine['editeur']) ?></div>

        </div>

    <?php endif; ?>

</div>

</body>
</html>