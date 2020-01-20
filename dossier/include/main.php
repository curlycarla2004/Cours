<?php

/**
 * Test et affectations des variables issues du formulaire.
 */
// $user = $_GET['prenom'];
if(empty($_GET['prenom'])){

  //Vérification que $_SESSION['prenom'] est bien vide
  if(empty($_SESSION['prenom'])){
    $_SESSION['prenom'] = 'Inconnu';
    $prenom = $_SESSION['prenom'];
}else{ //sinon, on réafecte la vlaeur de $_SESSION['prenom'] dans $prenom
  $prenom = $_SESSION['prenom'];
}
}else{ 
  $_SESSION['prenom'] = $_GET['prenom'];
  $prenom = $_SESSION['prenom'];
}

// couleur
// if(empty($_GET['couleur'])){

//   //Vérification que $_SESSION['prenom'] est bien vide
//   if(empty($_SESSION['couleur'])){
//     $_SESSION['couleur'] = 'Inconnu';
//     $prenom = $_SESSION['couleur'];
// }else{ //sinon, on réafecte la vlaeur de $_SESSION['prenom'] dans $prenom
//   $prenom = $_SESSION['couleur'];
// }
// }else{ 
//   $_SESSION['couleur'] = $_GET['couleur'];
//   $prenom = $_SESSION['couleur'];
// }

// alternative avec l'utilisation d'un opérateur Null coalescent.
// /$prenom = $_GET['prenom'] ?? 'Inconnu';

// couleur du titre.
  // $couleur_titre = $_GET['couleur'] ?? '#000000';

  //Récupération de la date (issue du formulaire, rien à voir avec la date dynamique du jour), (chaine vide si aucune).
  $new_date = $_GET['new_date'] ?? ''; //chaine vide si aucune date dans le $_GET['new_date].

  $reponse = bientot_le_weekend($new_date);

  // Heure actuelle.
  $heure = date('H:i');
  // Date actuelle.
  $date = date('l j F');



  $jour_de_la_semaine_en = date('l');
  $jour_de_la_semaine_fr = traduire($jour_de_la_semaine_en);

  //Liste des choses à faire.
  $liste = [
  'Terminer ce cours trop compliqué',
  'Aller au bar',
  '🤮🤮🤮'
  ];


//Les fonctions.
/**
 * fonction de traduction des jours.
 *
 * @param string $jour_a_traduire
 * @return string
 */
function traduire($jour_a_traduire)
{

  //tableau de traduction des jours.
  $traductions = [
    'Monday' => 'Lundi',
    'Tuesday' => 'Mardi',
    'Wednesday' => 'Mercredi',
    'Thursday' => 'Jeudi',
    'Friday' => 'Vendredi',
    'Saturday' => 'Samedi',
    'Sunday' => 'Dimanche',
  ];

  //Récupération de la traduction dans le tableau.
  $traduction = $traductions[$jour_a_traduire];

  //On renvoie la traduction.
  return $traduction;
}

/**
 * Retourne une chaine de caractères indiquant si c'est ou non bientôt le weekend.
 *
 * @param string $date Une date au format yyyy-mm-jj. ex: '2019-12-24'.
 * @return string
 */
function bientot_le_weekend($date = '')
{
  //On utilise strtotime pour convertir la date textuelle en timestamp, plus facilement manipulable.
  $timestamp = strtotime($date);

  //On récupère le numéro du jour de la semaine qui correspond à ce timestamp.
  $jour_semaine = date("N", $timestamp);
  switch ($jour_semaine) {
    //Lundi = 1, mardi = 2 et ainsi de suite.
    case 1:
    case 2:
    case 3:
      $reponse = 'Non.';
      break;
    case 4:
      $reponse = 'Bof....';
      break;
    case 5:
      $reponse = 'Presque!';
      break;
    case 6:
    case 7:
      $reponse = "C'est les weekend!";
      break;
    default:
      $reponse = "Erreur";
      break;
  }
  return $reponse;
}

?>

