<?php

//On charge nos classes
require 'Classes\Player.php';
require 'Classes\Round.php';
require 'Classes\Randomizer.php';
// require 'Classes\Monster.php';

//On créer deux nouveau joueur
$player1 = new Player('WebForce3');
$player2 = new Player('Jean-Jacques');

//On les stocke dans un tableau au cas ou.
$players = [$player1,$player2];


//Premier tour
echo '<h1>Tour 0</h1>';
echo 'Le joueur <b style="color:red">'. $player1->getNickname(). '</b> est <b style="color:red">LVL'.$player1->getLevel(). '</b> et il à <b style="color:red">'. $player1->getVie(). '</b> de vie <br>';
echo 'Le joueur <b style="color:red">'. $player2->getNickname(). '</b> est <b style="color:red">LVL'.$player2->getLevel(). '</b> et il à <b style="color:red">'. $player2->getVie(). '</b> de vie';


//GAME (On va faire 20 round)
for($i=1;$i<20;$i++) {
    echo '<h1>Tour '.$i.'</h1>';
    //Tout les 3 tour on va ajouter des Bonus/Malus
    if($i % 3 != 0) {
        $random = new Randomizer();
        // $random->for($players);
    }
    if($i % 2 != 0) {
        $round = new Round($player2,$player1) ;
        $round->attaquer();
    } else {
        $round = new Round($player1,$player2) ;
        $round->attaquer();
    }
}

//TODO: Vous devez ajouter la prise en commte de l'armure
