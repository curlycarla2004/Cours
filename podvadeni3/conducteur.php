<html>

<?php

    // On recup la BDD
    require_once 'bdd.php';

    // On select tout depuis la table "conducteur" et on affiche tout son contenu avec FetchAll
    $requete = $dbh->query("SELECT * FROM conducteur");
    $resultats = $requete->fetchAll();
    
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>

<body>

    <!-- Navbar haut de page -->
    <?php require_once 'navbar.php' ?>

    <!-- Main / Info. sur le conducteur -->
    <div class="container">
        <table class="table table-over mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id_conducteur</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Modification</th>
                    <th scope="col">Supression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultats as $conducteur): ?>
                    <tr>
                        <td><?= strip_tags($conducteur['id_conducteur']) ?></td> 
                        <td><?= strip_tags($conducteur['prenom']) ?></td>
                        <td><?= strip_tags($conducteur['nom']) ?></td>
                        <td>
                            <a name="click1" href="modifier.php?id=<?= $conducteur['id_conducteur'] ?>" class="text-muted mr-5">Modifier</a>
                        </td>
                        <td>
                            <a href="supprimer.php" class="text-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Bas de page / Ajout d'un nouveau conducteur -->
    <!-- (Je met ca ici ou sinon trop de fichier)  -->
    <?php    
        require_once 'bdd.php';  

        // Si on clike sur le bouton
        if(isset($_POST['submit']))
        {
            // Check si tout les champs sont remplis
            if(isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['prenom']) && !empty($_POST['prenom'])){
                    $requete = $db->prepare("
                        INSERT INTO conducteur (nom, prenom)
                        VALUES (:nom, :prenom)
                    ");
                    $requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
                    $requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                    $requete->execute();
                        echo '<div class="alert alert-success"> <h4>Conducteur ajouté</h4> !</div>';
                }else{
                    echo '<div class="alert alert-danger"><h4>Tous les champs sont obligatoire</h4> !</div>';
            }
        }
    ?>

    <div class="container-fluid mt-5">
        <form action="conducteur.php" method="post">

            <!-- Nom -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom"  class="form-control" placeholder="nom">
            </div>

            <!-- Prenom -->
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prénom">
            </div>

            <button type="submit" name="submit" class="btn btn-secondary">Ajouter ce conducteur</button>

        </form>
    </div>

    <!-- 
         PS:
         Le supprimer et le modifier na marche pas !!!
    -->

</body>
</html>