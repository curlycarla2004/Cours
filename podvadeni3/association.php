<html>

<?php

    // On recup la BDD
    require_once 'bdd.php';

    // On select tout depuis la table "conducteur" et on affiche tout son contenu avec FetchAll
    // Il est long mais je crois qu'il est bon :)
    $requete = $dbh->query("SELECT * FROM association_vehicule_conducteur INNER JOIN conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur INNER JOIN vehicule ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule ");
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
                    <th scope="col">id_association</th>
                    <th scope="col">Conducteur</th>
                    <th scope="col">Vehicule</th>
                    <th scope="col">Modification</th>
                    <th scope="col">Supression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultats as $association): ?>
                    <tr>
                        <td><?= strip_tags($association['id_association']) ?></td> 
                        <td><?= strip_tags($association['nom']).' '. strip_tags($association['prenom'])?></td>
                        <td><?= strip_tags($association['marque']).' '. strip_tags($association['modele']).'<br>'.strip_tags($association['id_vehicule'])?></td>
                        <td>
                            <a href="modifier.php?id=<?= $produits['id_conducteur'] ?>" class="text-muted mr-5">Modifier</a>
                        </td>
                        <td>
                            <a href="supprimer.php?id=<?= $produits['id_conducteur'] ?>" class="text-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Bas de page / Association entre Conducteur & Vehicule-->
    <div class="container-fluid mt-5">
        <form action="association.php" method="post">

            <!-- Select pour le Conducteur -->
            <select class="custom-select" name="editeur" id="editeur">
            <option selected>Selectionner un conducteur</option>
                <?php foreach($resultats as $association):?>
                <option value="<?= $association['nom'] ?>"><?= ($association['prenom'] == $resultats['id_association']) ? 'selected ="selected"' : ''; ?></option>
                <?php endforeach;?>
            </select>

            <!-- Select pour le Véhicule -->
            <select class="custom-select" name="editeur" id="editeur">
            <option selected>Selectionner une voiture</option>
                <?php foreach($resultats as $association):?>
                <option value="<?= $association['marque'] ?>"><?= ($association['modele'] == $conducteur['id_vehicule']) ? 'selected ="selected"' : ''; ?></option>
                <?php endforeach;?>
            </select>

            <button type="submit" class="btn btn-secondary">Ajouter cette association</button>

        </form>
    </div>

</body>
</html>