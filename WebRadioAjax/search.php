<?php

    header("Access-Control-Allow-Origin: *");
    require_once('include/db-connector.php');

    $recherche = $_POST ['recherche'];
    
    $request = "SELECT * FROM radio WHERE artist LIKE '%$recherche%' ORDER BY horaire DESC LIMIT 20 ";

    $query = $dbh->prepare($request);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($result);

 ?>
  