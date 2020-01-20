<?php

require_once 'bdd.php';
require_once 'fonctions.php';

// Sélectionne tous les éditeurs
// $requete = $db->prepare("SELECT * FROM editeur");
// $requete->execute();
// $editeurs = $requete->fetchAll();
$editeurs = getAllEditeurs($db);

// Sélectionne un magazine
$magazine = selectOneMagazine($_GET['id'], $db);

?>
<html>
<head>
    <title>Mes magazines - Modifier un magazine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">

    <?php if(!$magazine): ?>

        <h3>Pas de magazine !</h3>
        <a href="index.php">Retour à la liste des magazines</a>

    <?php else: ?>

        <h3>Modifier un magazine</h3>

        <a href="index.php">Retour à la liste des magazines</a>

        <?php

        $clés = [
            'nom',
            'description',
            'prix',
            'editeur'
        ];

        // Vérifie si l'utilisateur à cliqué sur le bouton "Valider"
        if(isset($_POST['envoiForm'])) {

            // Vérification du formulaire
            if(verifierFormulaire($_POST, $db)) {

                // Vérifie si le champs "file" est envoyé et non vide
                if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

                    // Vérifier si l'image est correct
                    $extension = verifierImage($_FILES['image']);
                    if($extension) {

                        // Supprime l'ancienne image
                        unlink($_POST['old_image']);

                        // Formatage du nouveau nom de l'image
                        $nouveau_nom = slug($_POST['nom']) .'_'. $_GET['id'] .'.'. $extension;

                        // Upload de l'image sur le serveur
                        uploadImage($_FILES['image'], $nouveau_nom);
                    }
                    else {
                        echo '<div class="alert alert-danger mt-3">Votre image ne respecte pas les consignes !</div>';
                    }

                }

                // Récupère l'ancien ou le nouveau nom de l'image
                $nom_image = isset($nouveau_nom) ? 'images/'. $nouveau_nom : $_POST['old_image'];

                // Met à jour en BDD
                updateMagazine($_GET['id'], $_POST, $nom_image, $db);

                echo '<div class="alert alert-success mt-3">Le magazine est correctement modifié !</div>';
            }
            else {
                echo '<div class="alert alert-danger mt-3">Tous les champs sont obligatoires !</div>';
            }
        }

        ?>

        <form action="editer.php?id=<?= $magazine['id'] ?>" method="post" enctype="multipart/form-data" class="mt-3">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= strip_tags($magazine['nom']) ?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= strip_tags($magazine['description']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" name="prix" id="prix" class="form-control" value="<?= strip_tags($magazine['prix']) ?>">
            </div>

            <div class="form-group">
                <label for="editeur">Editeur</label>
                <select class="custom-select" id="editeur" name="editeur">

                    <option value="" selected>Sélectionner un éditeur</option>

                    <?php foreach($editeurs as $editeur): ?>
                        <option value="<?= $editeur['id'] ?>" <?= ($editeur['id'] == $magazine['editeur_id']) ? 'selected="selected"' : ''; ?>><?= strip_tags($editeur['nom']) ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-row">
                <div class="col-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choisir une image</label>
                        <small id="image" class="form-text text-muted">
                            Les formats PNG, GIF et JP(E)G sont acceptés. Le poids ne doit pas dépasser 2Mo.
                        </small>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <p>Image actuelle</p>
                    <img src="<?= $magazine['image'] ?>" class="w-50">
                </div>
            </div>

            <input type="hidden" name="old_image" value="<?= $magazine['image'] ?>">
            <button type="submit" class="btn btn-primary mt-5" name="envoiForm">Modifier</button>

        </form>

    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>