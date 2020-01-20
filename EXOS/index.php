<?php require_once('include/functions.php') ?>


<!DOCTYPE html>
<html lang="fr">
<?php require_once('include/head.php') ?>

<body class="bg-dark">
  <h2 class="text-light text-center display-4 py-5">Le monde 🌍</h2>
  <div class="container shadow rounded border bg-light p-0">
    <div id="accordion-world">

      <!-- N premières villes. -->
      <div class="card">
        <div class="card-header" id="exo-init">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-init">
              <strong>N</strong> premières villes
            </button>
          </h5>
        </div>

        <div id="collapse-exo-init" class="collapse" data-toggle="collapse" data-parent="#accordion-world">
          <div class="card-body">
            <?php require('exos/exo-init.php'); ?>
          </div>
        </div>
      </div>

      <!-- Les N pays les plus peuplés    -->
      <div class="card">
        <div class="card-header" id="exo-01">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-01">
              <strong>N</strong> pays les plus peuplés
            </button>
          </h5>
        </div>

        <div id="collapse-exo-01" class="collapse" data-toggle="collapse" data-parent="#accordion-world">
          <div class="card-body">
            <?php require('exos/exo-01.php'); ?>
          </div>
        </div>
      </div>
      <!-- Population totale d'un continent donné. -->
      <div class="card">
        <div class="card-header" id="exo-03">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-03">
              Population totale (en millions d'habitants) pour <strong>un continent donné</strong></button>
          </h5>
        </div>

        <div id="collapse-exo-03" class="collapse" data-toggle="collapse" data-parent="#accordion-world">
          <div class="card-body">
            <?php require('exos/exo-02.php'); ?>
          </div>
        </div>
      </div>

    </div>
  </div>

  <h2 class="text-light text-center display-4 py-5">Le blog 🖍️</h2>
  <div class="container shadow rounded border bg-light p-0">
    <div id="accordion-blog">

      <!-- N premiers articles. -->
      <div class="card">
        <div class="card-header" id="exo-init-blog">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-init-blog">
              <strong>N</strong> premiers articles. Ajoutez la date et limitez le corps à 120 caractères.
            </button>
          </h5>
        </div>

        <div id="collapse-exo-init-blog" class="collapse" data-toggle="collapse" data-parent="#accordion-blog">
          <div class="card-body">
            <?php require('exos/exo-init-blog.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <h2 class="text-light text-center display-4 py-5">Art 👩‍🎨</h2>
  <div class="container shadow rounded border bg-light p-0">
    <div id="accordion-art">

      <!-- Parcourir une image. -->
      <div class="card">
        <div class="card-header" id="exo-init-art">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-init-art">
              Image de largeur <strong>x</strong> et de hauteur <strong>y</strong> remplie aléatoirement.
            </button>
          </h5>
        </div>

        <div id="collapse-exo-init-art" class="collapse" data-toggle="collapse" data-parent="#accordion-art">
          <div class="card-body">
            <img src="exos/exo-init-art.php" alt="image aléatoire" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="exo-art-02">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-art-02">
              Remplir uniquement la partie droite de l'image.
            </button>
          </h5>
        </div>

        <div id="collapse-exo-art-02" class="collapse" data-toggle="collapse" data-parent="#accordion-art">
          <div class="card-body">
            <img src="exos/exo-init-art-1.php" alt="image partie droite" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="exo-art-03">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-art-03">
              Créer le drapeau italien 🇮🇹
            </button>
          </h5>
        </div>

        <div id="collapse-exo-art-03" class="collapse" data-toggle="collapse" data-parent="#accordion-art">
          <div class="card-body">
            <img src="exos/exo-drapeau.php" alt="image drapeau italien" class="img-fluid"> 
          </div>
        </div>
      </div>
    </div>
  </div>


  <h2 class="text-light text-center display-4 py-5">Divers</h2>
  <div class="container shadow rounded border bg-light p-0">
    <div id="accordion-divers">

      <!-- Écrire un texte donné à l'envers. -->
      <div class="card">
        <div class="card-header" id="exo-divers-01">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-divers-01">
              Créer une fonction qui retourne un texte donné dans l'ordre inverse. Ex: 'Hello' -> 'olleH'.
            </button>
          </h5>
        </div>

        <div id="collapse-exo-divers-01" class="collapse" data-toggle="collapse" data-parent="#accordion-divers">
          <div class="card-body">
            <?php 
            echo reverse_text('Hello World');
            ?>
          </div>
        </div>
      </div>

      <!-- Générateur de noms chelous -->
      <div class="card">
        <div class="card-header" id="exo-divers-02">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-divers-02">Créer un générateur aléatoire de noms et qualificatifs de personnages<br>, sous la forme Prenom | Profession | adjectif.
              Exemple: Didier, taxidermiste téméraire.
            </button>
          </h5>
        </div>

        <div id="collapse-exo-divers-02" class="collapse" data-toggle="collapse" data-parent="#accordion-divers">
          <div class="card-body">
            <?php
            echo generateur();
            ?>
          </div>
        </div>
      </div>

      <!-- Calculateur temps necessaire pour distance selon vitesse -->
      <div class="card">
        <div class="card-header" id="exo-divers-03">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-exo-divers-03">Calculer le temps necessaire pour parcourir une distance <strong>d</strong> (en km) en fonction de la vitesse <strong>v</strong> (en km/h).
            </button>
          </h5>
        </div>

        <div id="collapse-exo-divers-03" class="collapse" data-toggle="collapse" data-parent="#accordion-divers">
          <div class="card-body">
            <?php require('exos/exo-divers-03.php'); ?>
          </div>
        </div>
      </div>


    </div>
  </div>
</body>

</html>
