<?php
//On inclus le fichier de connexion à la BDD.
require_once('db-connector.php');

//On s'assure de lancer le gestionnaire de session à chaque fois.
session_start();

function create_order($params)
{
  global $dbh;
  $query = 'INSERT INTO coffee (nom, taille, boisson, cafetiere)
  VALUES (:nom, :taille, :boisson, :cafetiere)';

  $req = $dbh->prepare($query);
  $result_boolean = $req->execute($params);
  return $result_boolean;
}