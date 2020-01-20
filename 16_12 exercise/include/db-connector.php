<?php

/**
 * On définit le $dbh en variable globale afin de pouvoir y acceder
 * depuis toutes nos fonctions de requetes vers MySQL.
 * Cela évite d'avoir à le passer systématiquement en paramètre.
 */
global $dbh;

//Variables de connexion à MySQL.
$config = [
  'host' => 'localhost',
  'db_name' => 'blog2',
  'user' => 'wf3',
  'password' => '1234'
];

// Tentative de connexion à MySQL.
try {
  global $dbh;
  $dbh = new PDO('mysql:host='.$config['host'].';dbname='.$config['db_name'], $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
//Si erreur on affiche le message issu de l'exception et on arrête tout.
catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
