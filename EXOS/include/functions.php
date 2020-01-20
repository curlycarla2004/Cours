<?php

//On inclus le fichier de connexion à la BDD.
require_once('db-connector.php');


/**
 * Récupération d'un nombre limité de villes.
 *
 * @return mixed array ou FALSE
 */
function get_cities($limit = 10)
{
  global $dbh_world;

  $query = 'SELECT city.* FROM city
    LIMIT :debut, :fin';
  $offset = 0;
  $req = $dbh_world->prepare($query);
  $req->bindParam(':debut', $offset, PDO::PARAM_INT);
  $req->bindParam(':fin', $limit, PDO::PARAM_INT);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupération d'un nombre limité d'articles.
 *
 * @return mixed array ou FALSE
 */
function get_articles($limit)
{
  global $dbh_blog;

  $offset = 0;

  $query = 'SELECT article.id, article.titre, article.corps,  DATE_FORMAT(article.date, "%D %b %Y") AS date
    FROM article
    LIMIT :debut, :fin';

  $req = $dbh_blog->prepare($query);
  $req->bindParam(':debut', $offset, PDO::PARAM_INT);
  $req->bindParam(':fin', $limit, PDO::PARAM_INT);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_ASSOC);
}



/**
 * Récupération d'un nombre limité de villes.
 *
 * @return mixed array ou FALSE
 */
function get_countries_by_population($limit = 10){

global $dbh_world;
$query = 'SELECT country.Name, country.Population FROM country
  ORDER BY country.Population DESC
    LIMIT :fin';
  $offset = 0;
  $req = $dbh_world->prepare($query);
  $req->bindParam(':fin', $limit, PDO::PARAM_INT);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_ASSOC);

}

/**
 * Retourne la population d'un continent donnné
 * @param string $continent
 * @return int
 */
function get_continent_population($continent){
  global $dbh_world;

  $query = 'SELECT SUM(country.Population) as population FROM country WHERE country.Continent = :continent';
  $req = $dbh_world->prepare($query);
  $req->execute(['continent'=> $continent]);
  $result = $req->fetch(PDO::FETCH_ASSOC);
  return $result['population'];

}


/**
 * Fonction d'affichage d'un nombre en millions
 * Exemple: 3600000->36,00
 * 
 * @param in $nombre
 * @return string
 */
function affichage_en_millions($nombre){

  $nombre_millions = $nombre/100000;
  return number_format($nombre_millions, 2, ',', '');
}

/**
 * Retourne une chaine de caractère dans l'ordre inverse
 * @param string $text
 * @return string
 */
function reverse_text($text = ''){
  $length= strlen($text);
  $reverse='';
  for ($i=($length-1); $i>=0; $i--){
    $reverse .= $text[$i]; /*ou reverse.text[$i]*/
  }
    return $reverse;
  }
  
  function generateur(){
    $prenoms = ['Juliette', 'Karla', 'Eloise', 'Benoit'];
    $jobs = ['Hair Boiler ', 'Retail Jedi', 'Snake Milker', 'Lab Rat'];
    $adjectifs = ['hard', 'soft', 'crazy', 'freak'];

    //prenom
    $random_name_key = array_rand($prenoms);//Une clé aléatoire d'un tableau 'names'
    $personnage = $prenoms[$random_name_key];
    

    //job
    $random_job_key = array_rand($jobs);//Une clé aléatoire d'un tableau 'names'
    $personnage .= ' le '.$jobs[$random_job_key];
    return $personnage;

    //adj
    $random_adj_key = array_rand($adjectifs);//Une clé aléatoire d'un tableau 'names'
    $personnage = ''.$adjectifs[$random_adj_key];
    return $personnage;
  }

  function texte_en_gras(string $text){
    $regex = '#\[b\](.+)\[/b\]#';
    return preg_replace($regex, '<strong>$1</strong>', $text);

 }