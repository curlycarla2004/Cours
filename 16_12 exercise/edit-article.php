<?php

require_once('include/functions.php');
// require_once('include/image_handler.php');

//Récupération des variables issues de $_POST.
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT) ?? 0;
$titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING) ?? 'Article sans titre';
$corps = filter_input(INPUT_POST, 'corps', FILTER_SANITIZE_STRING) ?? ' -- ';
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING) ?? '';

// upload_image();

//On créé un tableau avec ces variables.
$params = [
  'id' => $id,
  'titre' => $titre,
  'corps' => $corps,
  'date' => $date
];

//Execution de la requête de mise à jour.
$result = update_article($params);

if($result){
  $redirect_url = 'article-edit.php?id='.$params['id'].'&valid=1';
}
else {
  $redirect_url = 'article-edit.php?id='.$params['id'].'&valid=0';
}
header("Location: $redirect_url");
