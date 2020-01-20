<?php

// Insertion de l'autoloader
require_once '../vendor/autoload.php';

// Connexion à la BDD
require_once 'bdd.php';

// Instanciation de Faker
$faker = Faker\Factory::create('fr_FR');

// Préparation de la requête SQL
$query = $db->prepare("INSERT INTO editeur (nom) VALUES (:nom)");

// Insertion de plusieurs données
for ($i = 0; $i < 10; $i++) {
    $query->bindValue(':nom', $faker->company, PDO::PARAM_STR);
    $query->execute();
}

$query = $db->prepare("INSERT INTO magazine (nom, description, prix, image, editeur_id) VALUES (:nom, :description, :prix, :image, :editeur_id)");

// Insertion de plusieurs données
for ($i = 0; $i < 30; $i++) {
    $query->bindValue(':nom', $faker->name, PDO::PARAM_STR);
    $query->bindValue(':description', $faker->realText(200), PDO::PARAM_STR);
    $query->bindValue(':prix', $faker->numberBetween(12, 39), PDO::PARAM_INT);
    $query->bindValue(':image', $faker->image('images'), PDO::PARAM_STR);
    $query->bindValue(':editeur_id', $faker->numberBetween(1, 10), PDO::PARAM_STR);
    $query->execute();
}

echo 'Insertion des données terminées !';