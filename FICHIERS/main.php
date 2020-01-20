<?php

// Nom du fichier qui contiendra la liste des tâches.
$fichier_todo_list = 'todo-list.txt';


// Création du fichier si nécessaire.
if (!file_exists($fichier_todo_list)) {
  $handle = fopen($fichier_todo_list, 'w');
  fclose($handle);
}

//Récupération d'une nouvelle tâche à faire passée en POST par le formulaire.
$nouvelle_tache = filter_input(INPUT_POST, 'nouvelle_tache', FILTER_SANITIZE_STRING);
//Si non vide, alors on l'ajoute à la todo list.
if ($nouvelle_tache) {
  $handle = fopen($fichier_todo_list, 'a+');
  fwrite($handle, $nouvelle_tache . PHP_EOL);
  fclose($handle);
}

/**
 * Récupération des tâches de la todo-list.
 *
 * @param string $nom_fichier fichier todo list
 * @return array
 */
function recuperer_les_taches($nom_fichier)
{
  $handle = fopen($nom_fichier, 'r+');
  $liste_taches = [];
  while ($tache = fgets($handle)) {
    $liste_taches[] = $tache;
  }
  fclose($handle);
  return $liste_taches;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
    <h1>TO DO LISTE</h1>
  <ul>
    <!-- Récupération de la liste des tâches -->
    <?php $taches = recuperer_les_taches('todo-list.txt'); ?>
    <?php foreach ($taches as $tache) : ?>
      <!-- Affichage d'une tâche -->
      <li><?php echo $tache; ?></li>
    <?php endforeach; ?>
  </ul>

  <!-- Formulaire d'ajout de tâche -->
  <form method="POST">
    <input type="text" name="nouvelle_tache">
    <input type="submit" value="Ajouter">
  </form>
</body>

</html>
