<?php

require_once('include/functions.php');
// require_once('include/image_handler.php');

$titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING) ?? 'Article sans titre';
$corps = filter_input(INPUT_POST, 'corps', FILTER_SANITIZE_STRING) ?? ' -- ';
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING) ?? '';
$auteur = filter_input(INPUT_POST, 'auteur_id', FILTER_SANITIZE_NUMBER_INT) ?? '';

//On créé un tableau avec ces variables.
$params = [
  'titre' => $titre,
  'corps' => $corps,
  'date' => $date,
  'auteur_id' => $auteur
];

//Execution de la requête de mise à jour.
$result = create_article($params);
header("Location: article-list.php");
