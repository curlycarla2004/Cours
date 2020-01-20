<?php
    // define('HOST', 'localhost');
    // define('BDD', 'vtc');
    // define('USER', 'root');
    // define('PASSWD', '');

    // try{
    //     $db = new PDO('mysql:host='. HOST .';dbname='. BDD, USER, PASSWD, array(
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    //     ));
    // }catch(PDOException $error){
    //     throw new PDOException("La connexion a la base de données n'a pas fonctionné");
    // }


    global $dbh;

//Variables de connexion à MySQL.
$config = [
  'host' => 'localhost',
  'db_name' => 'vtc',
  'user' => 'wf3',
  'password' => '1234'
];

// Tentative de connexion à MySQL.
try {
  global $dbh;
  $dbh = new PDO('mysql:host='.$config['host'].';dbname='.$config['db_name'], $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
//Si erreur on affiche le message issu de l'exception et on arrête tout.
catch (PDOException $error) {
  print "La connexion a la base de données n'a pas fonctionné !: " . $error->getMessage() . "<br/>";
  die();
}
?>