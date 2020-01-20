<?php 

//Variable global that can be accesible from all the requetes for MySQL
global $dbh;

//Variables de connexion à MySQL.
$config = [
  'host' => 'localhost',
  'db_name' => 'immobilier',
  'user' => 'wf3',
  'password' => '1234'
];

// Tentative de connexion à MySQL.
try {
  global $dbh;
  $dbh = new PDO('mysql:host='.$config['host'].';dbname='.$config['db_name'], $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
//If error on affiche le message below and stop everything.
catch (PDOException $error) {
  print "La connexion a la base de données n'a pas fonctionné !: " . $error->getMessage() . "<br/>";
  die();
}

?>