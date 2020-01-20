<?php

require_once 'bdd.php';
require_once 'fonctions.php';

// Sélectionne tous les éditeurs
// $requete = $db->prepare("SELECT * FROM editeur");
// $requete->execute();
// $editeurs = $requete->fetchAll();
$editeurs = getAllEditeurs($db);

?>
<html>
<head>
    <title>Mes magazines - Ajouter un magazine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">

    <h3>Ajouter un magazine</h3>

    <a href="index.php">Retour à la liste des magazines</a>

    <?php

    // Ajout d'un magazine

    // Tableau contenant la valeur des 'name=""' des champs input
    // que l'on souhaite vérifier
    $cles = array(
        'nom',
        'description',
        'prix',
        'editeur'
    );

    // Vérifie si l'utilisateur à cliqué sur le bouton "Valider"
    if(isset($_POST['envoiForm'])) {

        // Vérifie si tous les champs sont bien remplis
        if(verifierFormulaire($_POST, $cles)) {

            // Vérifie si l'image est correct
            $extension = verifierImage($_FILES['image']);
            if($extension) {

                // Insertion du magazine en BDD
                $lastID = insertMagazine($_POST, $_FILES['image']['name'], $db);

                // Nouveau nom de l'image
                // Exemple : mon-magazine_4.png
                $nom_image = slug($_POST['titre']) .'_'. $lastID .'.'. $extension;

                // Upload du fichier
                uploadImage($_FILES['photo'], $nom_image);

                // Mise à jour du magazine en BDD
                updateImageMagazine($lastID, $nom_image, $db);

                echo '<div class="alert alert-success mt-3">Le magazine est correctement ajouté !</div>';
            }
            else {
                echo '<div class="alert alert-danger mt-3">Votre image ne respecte pas les consignes !</div>';
            }
        }
        else{
            echo '<div class="alert alert-danger mt-3">Tous les champs sont obligatoires !</div>';
        }
    }

    ?>

    <form action="ajouter.php" method="post" enctype="multipart/form-data" class="mt-3">

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control">
        </div>

        <div class="form-group">
            <label for="editeur">Editeur</label>
            <select class="custom-select" id="editeur" name="editeur">

                <option value="" selected>Sélectionner un éditeur</option>

                <?php foreach($editeurs as $editeur): ?>
                    <option value="<?= $editeur['id'] ?>"><?= $editeur['nom'] ?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choisir une image</label>
                <small id="image" class="form-text text-muted">
                    Les formats PNG, GIF et JP(E)G sont acceptés. Le poids ne doit pas dépasser 2Mo.
                </small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-5" name="envoiForm">Ajouter</button>

    </form>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>