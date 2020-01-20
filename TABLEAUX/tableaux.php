<?php

//--------------------Rappels sur les tableaux -------------------------------------//

//Tableau simple
$tableau_simple = [
  'lundi',
  'mardi',
  'mercredi',
  'jeudi',
  'vendredi'
];

//Tableau associatif
$tableau_associatif = [
  'jour_01' => 'lundi',
  'jour_02' => 'mardi',
  'jour_03' => 'mercredi',
  'jour_04' => 'jeudi',
  'jour_05' => 'jeudi'

];

// $cle_tab_asso = array_keys($tableau_associatif);
// print_r($cle_tab_asso);

// for ($i = 0 ; $i < 5; $i++){
//   echo $tableau_simple [$i] .PHP_EOL;
// }

// foreach($tableau_associatif as $key =>$value){
//   // echo $value.PHP_EOL;
    
// }

//Tableau à 2 dimensions.
// $tableau_2d = [
//   'lundi' => ['matin', 'midi', 'soir'],
//   'mardi' => ['matin', 'midi', 'soir'],
//   'mercredi' => ['matin', 'midi', 'soir'],
//   'jeudi' => ['matin', 'midi', 'soir'],
//   'vendredi' => ['matin', 'midi', 'soir']
// ];
$tableau_2d = [
  'lundi' => ['cours PHP', 'midi(repas)', 'repos'],
  'mardi' => ['cours SQL', 'midi(repas)', 'apéro'],
  'mercredi' => ['cours HTML', 'midi(repas)', 'soir'],
  
];

// - Parcourir ces tableaux avec for puis avec foreach.

foreach($tableau_2d as $key => $value){
  foreach($value as $num => $event){
    echo "le jour $key event N° $num activité: $event <br>";
    // echo $key.' event n°'.$num.' -> '.$event. '<br>';
  }
  echo '<br>';
    // echo 'id =>'. $key.'<br>';
    // print_r($value);  
  }


$var = ['1', 'bonjour'];
// - vérifiez que $var est un tableau avec 'is_array()'.
if(is_array($var)){
  echo "c'est un super tableau <br>";
}
else
  echo "NON";


$fruits = ['pomme','fraise','kiwi','cerise','poire','banane','raisin'];
// - utilisez 'count()' pour le nombre d'éléments.
echo "il y a ".count($fruits)."fruits.<br>";

// - Retournez uniquement le 3ème fruit.
echo 'Le 3eme fruit est :' .$fruits['2'].'<br>';

// - Crééz un bloc de condition pour savoir s'il existe un fruit nommé 'cerise'.
$cerise_existe = FALSE;
foreach($fruits as $key => $value){
  // var_dump($key);
  if($value == 'cerise'){
    $cerise_existe = TRUE;
  break;
  }
}
echo $cerise_existe ? 'cerise existe <br>' : "cerise n'existe pas";

// - Crééz un bloc de condition pour savoir s'il existe un fruit nommé 'cassis'.
$cassis_existe = FALSE;
foreach($fruits as $key => $value){
  // var_dump($key);
  if($value == 'cassis'){
    $cassis_existe = TRUE;
  break;
  }
}
echo $cassis_existe ? 'cassis existe' : "cassis n'existe pas<br>";
// if(in_array('cassis', $fruits)){
//   echo 'cassis exsite';
// }else{
//   echo 'cassis n\'existe pas';
// }


// - Triez le tableau $fruits par ordre alphabetique.
sort($fruits);
print_r($fruits);
// $a = 0;
// ajouter2($a);
// var_dump($a);

// function ajouter2(&$valeur){
//   $valeur = $valeur + 2;
// }

// - Mélangez le tableau $fruits

shuffle($fruits);

// - Manipulez les fonctions 'explode()' et 'implode()' de php sur le tableau $fruits.

$array_to_str = implode(', ', $fruits);
echo $array_to_str , '<br>';

$str_to_array = explode(', ', $array_to_str);
print_r($str_to_array);



$user_profile = [
  'first_name' => 'Bob',
  'last_name' => 'MARTIN',
  'age' => 25
];
// - Utilisez 'extract()' sur ce tableau associatif pour automatiquement créer des variables PHP portant le nom des clés.
  extract($user_profile);
  echo '<br>'.$first_name.'<br>'.$last_name.'<br>'.$age.'<br>';
  
//Voici les listes de courses d'Alice & Bob.
$liste_alice = [
  'oeufs',
  'farine',
  'huile',
  'mayo',
  'lait',
  'crème fraîche',
  'sucre',
  'compote',
  'carottes',
];

$liste_bob = [
  'thé',
  'café',
  'oeufs',
  'crème fraîche',
  'lentilles',
  'compote',
  'ketchup',
  'pommes de terre',
  'lait',
  'huitres',
  'bacon',
  'bieres',
  'champagne',
  'Meursault Premier Cru “Genevrières” 2016'
];

// - Lister sous forme de tableau les produits en commun dans les 2 listes
$produits_communs = array_intersect($liste_alice, $liste_bob);
print_r($produits_communs);

// - Lister sous forme de tableau les produits en exclusifs à la liste de Bob.
$produits_exclu_bob = array_diff($liste_bob, $liste_alice);
print_r($produits_exclu_bob);

// - Donner la liste sous forme de tableau de tous les produits de bob et alice sans doublons.
$tous_produits = array_unique(array_merge($liste_alice, $liste_bob));
print_r($tous_produits);


// - Aouter l'ingrédient 'riz' au début de la liste de bob.
array_unshift($liste_bob, 'riz');
print_r($liste_bob);  