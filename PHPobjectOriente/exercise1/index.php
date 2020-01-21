<?php

require 'class/MaClasse.php'; 
$mon_objet = new MaClasse('Salut!');
echo $mon_objet->titre();
// var_dump($mon_objet);



// //BONNE facon de faire
// $mon_objet->setDate();
// echo $mon_objet->date();


// //MAUVAISE facon de faire
// $mon_objet->date = date('d/m/Y');
// echo $mon_objet->date;







