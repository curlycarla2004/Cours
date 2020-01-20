<?php

require_once('include/db-connector.php');
require_once('include/functions.php');

?>
<html>
    <?php
        $titre_page = "Ajouter logement";
        include('include/head.php');
        ?>  
    <body>

    <div class="container p-5">

        <h1 class="text-center text-secondary">Ajouter un Logement</h1>
        
        <?php
       
        // Tableau contenant le valeurs
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
                if(insertLogement($_POST, $cles, $dbh)) {

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
        <div class="container py-5 mb-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Liste de Logement</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter nouveau Logement</li>
                </ol>
            </nav>

            <form action="ajouter-logement.php" method="post" enctype="multipart/form-data" class="shadow p-5 my-5 rounded border w-100 mx-auto">

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
                    <label for="type">Type</label>
                    <select class="custom-select" id="type" name="type">
                        <option value="location">Location</option>
                        <option value="vente">Vente</option>
                    </select>
                </div>

                <!-- La Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="20" rows="2" class="form-control"></textarea>
                </div>

                
                    <!-- Ajout d'une image -->
                <div class="form-group">
                    <img src="<?php echo get_img_src(); ?>" class="img-fluid">
                    <input type="file" class="form-control-file py-2" id="image" name="image">
                </div>
                

                <button type="submit" class="btn btn-primary mt-5" name="envoiForm">Ajouter</button>

            </form>
        </div>
        <?php include('include/footer.php'); ?>
    </body>
</html>