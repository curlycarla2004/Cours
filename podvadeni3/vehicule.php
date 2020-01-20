<html>

<?php

    // On recup la BDD
    require_once 'bdd.php';

    // On select tout depuis la table "vehicule" et on affiche tout son contenu avec FetchAll
    $requete = $dbh->query("SELECT * FROM vehicule");
    $resultats = $requete->fetchAll();
    
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>

<body>

    <!-- Navbar haut de page -->
    <?php require_once 'navbar.php' ?>

    <!-- Main / Info. sur les véhicules -->
    <div class="container">
        <table class="table table-over mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id_vehicule</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modele</th>
                    <th scope="col">Couleur</th>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Modification</th>
                    <th scope="col">Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultats as $vehicule): ?>
                    <tr>
                        <td><?= strip_tags($vehicule['id_vehicule']) ?></td> 
                        <td><?= strip_tags($vehicule['marque']) ?></td>
                        <td><?= strip_tags($vehicule['modele']) ?></td>
                        <td><?= strip_tags($vehicule['couleur']) ?></td>
                        <td><?= strip_tags($vehicule['immatriculation']) ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $produits['id_vehicule'] ?>" class="text-muted mr-5">Modifier</a>
                        </td>
                        <td>
                            <a href="supprimer.php?id=<?= $produits['id_vehicule'] ?>" class="text-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bas de page / Ajout d'un nouveau véhicule -->

    <?php    
        require_once 'bdd.php';  

        // Si on clike sur le bouton
        if(isset($_POST['submit']))
        {
            // Check si tout les champs sont remplis
            if(isset($_POST['marque']) && !empty($_POST['marque']) &&
            isset($_POST['modele']) && !empty($_POST['modele']) &&
            isset($_POST['couleur']) && !empty($_POST['couleur']) &&
            isset($_POST['immatriculation']) && !empty($_POST['immatriculation'])){
                    $requete = $db->prepare("
                        INSERT INTO vehicule (marque, modele, couleur, immatriculation)
                        VALUES (:marque, :modele, :couleur, :immatriculation)
                    ");
                    $requete->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
                    $requete->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
                    $requete->bindValue(':couleur', $_POST['couleur'], PDO::PARAM_STR);
                    $requete->bindValue(':immatriculation', $_POST['immatriculation'], PDO::PARAM_STR);
                    $requete->execute();
                        echo '<div class="alert alert-success"> <h2> Véhicule Ajouté </h2> !</div>';
                }else{
                    echo '<div class="alert alert-danger"> <h5> Tous les champs sont obligatoire </h5> !</div>';
            }
        }
    ?>


    <div class="container-fluid mt-5">
        <form action="vehicule.php?id=<?= $_GET['id'] ?>" method="post">

            <!-- Marque -->
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="marque" id="marque"  class="form-control" placeholder="marque">
            </div>

            <!-- Modele -->
            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" name="modele" id="modele" class="form-control" placeholder="modèle">
            </div>

            <!-- Modele -->
            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="text" name="couleur" id="couleur" class="form-control" placeholder="couleur">
            </div>

            <!-- Modele -->
            <div class="form-group">
                <label for="immatriculation">Immatriculation</label>
                <input type="text" name="immatriculation" id="immatriculation" class="form-control" placeholder="immatriculation">
            </div>

            <button type="submit" name="submit" class="btn btn-secondary">Ajouter ce vehicule</button>

        </form>
    </div>
    
</body>
</html>