<?php

require_once 'connexion.php';
require_once 'fonctions.php';

?>
<html>
<?php

require_once('include/db-connector.php');
require_once('include/functions.php');

?>
<body>

<div class="container p-5">

    <h3>Ajouter un Logement</h3>
    
    <a href="index.php">Retour à la liste des Logements</a>
    <?php

    // Ajout d'un magazine

    // Tableau contenant la valeur des 'name=""' des champs input
    // que l'on souhaite vérifier
    $cles = array(
        'titre',
        'adresse',
        'ville',
        'cp',
        'surface',
        'prix',
        'type'
    );

    // Vérifie si l'utilisateur à cliqué sur le bouton "Valider"
    if(isset($_POST['envoiForm'])) {

        // Vérifie si tous les champs sont bien remplis
        if(verifierFormulaire($_POST, $cles)) {

            // Vérifie si l'image est correct
            // $extension = verifierImage($_FILES['photo']);
        //     if($extension) {

        //         // Insertion du magazine en BDD
        //         $lastID = insertLogement($_POST, $_FILES['fichier']['name'], $dbh);

        //         // Nouveau nom de l'image
        //         // Exemple : mon-magazine_4.png
        //         $nom_image = slug($_POST['titre']) .'logement_'. $lastID .'.'. $extension;

        //         // Upload du fichier
        //         uploadImage($_FILES['photo'], $nom_image);

        //         // Mise à jour du magazine en BDD
        //         updateImageLogement($lastID, $nom_image, $dbh);

        //         echo '<div class="alert alert-success mt-3">Le magazine est correctement ajouté !</div>';
        //     }
        //     else {
        //         echo '<div class="alert alert-danger mt-3">Votre image ne respecte pas les consignes !</div>';
        //     }

        // }
        // else{
        //     echo '<div class="alert alert-danger mt-3">Tous les champs sont obligatoires !</div>';
        // }
    }
}

    ?>

    <form action="ajouter.php" method="post" enctype="multipart/form-data" class="mt-3">

        <!-- Le Titre -->
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>

        <!-- L'adresse -->
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control">
        </div>

        <!-- La Ville -->
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control">
        </div>

        <!-- Le Code postal -->
        <div class="form-group">
            <label for="cp">Code postal</label>
            <input type="text" name="cp" id="cp" class="form-control">
        </div>

        <!-- La Surface -->       
        <div class="form-group">
            <label for="surface">Surface</label>
            <input type="number" name="surface" id="surface" class="form-control">
        </div>

        <!-- La Prix -->
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control">
        </div>

        <!-- La Type de logement -->
        <div class="form-group">
            <label for="type">Type de logement</label>
            <select class="custom-select" id="type" name="type">
                <option value="logement">Logement</option>
                <option value="vente">Vente</option>
            </select>
        </div>

        <!-- La Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choisir une image</label>
                <small id="image" class="form-text text-muted">
                    Les formats PNG, GIF et JP(E)G sont acceptés. Le poids ne doit pas dépasser 3Mo.
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