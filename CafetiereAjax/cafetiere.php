<?php

$nom = $_REQUEST['nom'];
$taille = $_REQUEST ['taille'];
$boisson = $_REQUEST ['boisson'];
$cafetiere = $_REQUEST ['cafetiere'];


for ($i = 0; $i <500000000; $i++){
    //Préparation env 10s
};


if(!empty($nom) && !empty($taille) && !empty($boisson) && !empty($cafetiere)){
    global $dbh;
    $query = 'INSERT INTO coffee (nom, taille, boisson, cafetiere)
    VALUES (:nom, :taille, :boisson, :cafetiere)';

    $req = $dbh->prepare($query);
    $req->execute(array(
        'nom' => $nom,
        'taille' => $taille,
        'boisson' => $boisson,
        'cafetiere' => $cafetiere
    ));

}

echo $cafetiere . $nom ;



?>