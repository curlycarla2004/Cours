<?php

header("Access-Control-Allow-Origin: *");
require_once('include/db-connector.php');

// $request = "SELECT dat, artiste, horaire FROM radio ORDER BY dat DESC LIMIT 12"
$request = "SELECT titre, artist, horaire FROM radio ORDER BY horaire DESC LIMIT 12";

$query = $dbh->prepare($request);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($result);

?>


