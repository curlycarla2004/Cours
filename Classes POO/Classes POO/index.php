<?php

    require 'Classes\Monster.php';

    $monster = new Monster();

    echo $monster->getVie(); echo "<br>";

    $monster->setVie(150);

    echo $monster->getVie();