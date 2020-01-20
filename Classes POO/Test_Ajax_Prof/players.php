<?php

//On charge nos classes
require 'Players.php';
require 'Round.php';

//On créer deux nouveau joueur
$player1 = new Player('WebForce3');
$player2 = new Player('Jean-Jacques');


//On les stocke dans un tableau au cas ou.
$players = [$player1->getNickname(),$player2->getNickname()];
header('Content-Type: application/json');
echo json_encode($players);