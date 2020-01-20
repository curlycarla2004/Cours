<?php

/**
 * On définit le $dbh en variable globale afin de pouvoir y acceder
 * depuis toutes nos fonctions de requetes vers MySQL.
 * Cela évite d'avoir à le passer systématiquement en paramètre.
 */
global $dbh_blog;
global $dbh_world;

//Variables de connexion à MySQL.
$config_blog = [
  'host' => 'localhost',
  'db_name' => 'blog3',
  'user' => 'wf3',
  'password' => '1234'
];
$config_world = [
  'host' => 'localhost',
  'db_name' => 'world',
  'user' => 'wf3',
  'password' => '1234'
];

// Tentative de connexion à MySQL.
try {
  global $dbh_blog;
  $dbh_blog = new PDO('mysql:host='. $config_blog['host'].';dbname='. $config_blog['db_name'], $config_blog['user'], $config_blog['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
//Si erreur on affiche le message issu de l'exception et on arrête tout.
catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
// Tentative de connexion à MySQL.
try {
  global $dbh_world;
  $dbh_world = new PDO('mysql:host='. $config_world['host'].';dbname='. $config_world['db_name'], $config_world['user'], $config_world['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
//Si erreur on affiche le message issu de l'exception et on arrête tout.
catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
