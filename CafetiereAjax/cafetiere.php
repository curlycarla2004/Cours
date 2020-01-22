<?php

require_once('include/functions.php');

// $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING) ?? ' -- ';
// $taille = filter_input(INPUT_POST, 'taille', FILTER_SANITIZE_STRING) ?? ' -- ';
// $boisson = filter_input(INPUT_POST, 'boisson', FILTER_SANITIZE_STRING) ?? '';
// $cafetiere = filter_input(INPUT_POST, 'cafetiere', FILTER_SANITIZE_NUMBER_INT) ?? '';

$nom = $_REQUEST['nom'];
$taille = $_REQUEST ['taille'];
$boisson = $_REQUEST ['boisson'];
$cafetiere = $_REQUEST ['cafetiere'];


for ($i = 0; $i <5000000; $i++){
    //Préparation env 10s
};


// if(!empty($nom) && !empty($taille) && !empty($boisson) && !empty($cafetiere)){
//     global $dbh;
//     $query = 'INSERT INTO coffee (nom, taille, boisson, cafetiere)
//     VALUES (:nom, :taille, :boisson, :cafetiere)';

//     $req = $dbh->prepare($query);
//     $req->execute(array(
//         'nom' => $nom,
//         'taille' => $taille,
//         'boisson' => $boisson,
//         'cafetiere' => $cafetiere
//     ));

// }

//On créé un tableau avec ces variables.
$params = [
    'nom' => $nom,
    'taille' => $taille,
    'boisson' => $boisson,
    'cafetiere' => $cafetiere
  ];
  

echo $cafetiere . $nom ;

$result = create_order($params);


?>