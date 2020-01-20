<?php


  // $user = $_GET['prenom'];
  if(empty($_GET['prenom'])){
    $user = 'WEBFORCE3';
  }else{
    $user = $_GET['prenom'];
  }

  //couleur du titre
  $couleur_titre = $_GET['couleur'] ?? '#000000';


  //date_default_timezone_set("Europe/Paris"); 
  //heure actuelle
  $heure = date('H:i:s');
  //date actuelle
  $date = date('l j F');
  //couleur du titre
  //  $couleur_titre = "text-primary";

  
 
  // $jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
  
  /**
   * fonction de traduction des jours
   * @param string $jour_a_traduire
   * @return string
   * 
   */
  function traduire($jour_a_traduire){
    $traductions = [
      'Monday' => 'Lundi',
      'Tuesday' => 'Mardi',
      'Wednesday' => 'Mercredi',
      'Thursday' => 'Jeudi',
      'Friday' => 'Vendredi',
      'Saturday' => 'Samedi',
      'Sunday' => 'Dimanche',
    ];
    $traduction = $traductions[$jour_a_traduire];
    return $traduction;
  }

  $jour_de_la_semaine_en = date ('l');
  $jour_de_la_semaine_fr = traduire($jour_de_la_semaine_en);

  $jour = $jour_de_la_semaine_fr;


//liste des choses à faire
  $liste = [
    'Terminer ce cours trop compliqué',
    'Aller au bar'
  ];
?>