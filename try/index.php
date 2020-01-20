<!DOCTYPE html>
<?php

    // Fichier de la connexion a la BDD.
    require_once('include/db-connector.php');

    //Fichier avec des fonctions.
    require_once('include/functions.php');

    // On select. tout depuis la table Logement et on affiche tout son contenu avec FetchAll
    $requete = $dbh->query("SELECT * FROM logement");
    $resultats = $requete->fetchAll();
    
?>


<html lang="en">
<?php
    $titre_page = "Logement";
    include('include/head.php');
    ?>  
<body>

<div class="container">
   <h1 class="text-center"><strong>Mes Logements</strong></h1>


   <table class="table table-over mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">CP</th>
                <th scope="col">surface</th>
                <th scope="col">prix</th>
                <th scope="col">photo</th>
                <th scope="col">type</th>
                <th scope="col">description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultats as $logement): ?>
                <tr>
                    <td><?php strip_tags($logement['id_logement']) ?></td> 
                    <td><?php strip_tags($logement['titre']) ?></td>
                    <td><?php strip_tags($logement['adresse']) ?></td> 
                    <td><?php strip_tags($logement['ville']) ?></td> 
                    <td><?php strip_tags($logement['cp']) ?></td> 
                    <td><?php strip_tags($logement['surface']) ?></td> 
                    <td><?php strip_tags($logement['prix']) ?></td> 
                    <td><img src="<?php $logement['photo']?>" width="150px"></td>
                    <td><?php strip_tags($logement['type']) ?></td> 
                    <td><?php mb_strimwidth(strip_tags($logement['description']), 0, 35, '...') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <a href="ajouter-logement.php" class="btn btn-primary">Ajouter un Logement</a>
        </div>
   </div>

</body>
</html>