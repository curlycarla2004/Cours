<?php

require_once('include/functions.php');
redirect_if_not_admin();
?>

<!DOCTYPE html>
<html lang="en">

<?php
$titre_page = "Édition d'un article";
require_once('include/head.php');
?>

<body>

  <h1 class="display-1 py-5 my-5 text-center text-secondary">Création d'un article</h1>
  
  <!-- Si la variable $article n'est pas considerée comme vide, on affiche le formulaire. -->
    <div class="container py-5 mb-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="article-list.php">Liste</a></li>
          <li class="breadcrumb-item active" aria-current="page">Édition</li>
        </ol>
      </nav>

      <form action="create-article.php" method="post" class="shadow p-5 my-5 rounded border w-50 mx-auto">
        <div class="alert alert-warning" role="alert">
          Vous pouvez crée un article.
        </div>

        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" value="">
          <small class="form-text text-muted">Titre de l'article</small>
        </div>

        <div class="form-group">
          <label for="corps">Contenu</label>
          <textarea class="form-control" id="corps" name="corps" rows="3"></textarea>
          <small class="form-text text-muted">Contenu de l'article</small>
        </div>

        <div class="form-group">
          <label for="corps">Date de création</label>
          <input type="date" class="form-control" id="date" name="date" value="2019-12-17">
          <!-- <small class="form-text text-muted">Contenu de l'article</small> -->
        </div>
        
        <?php
        // $list_auteurs = [
        //     '1' => 'Bob Martin',
        //     '2' => 'Jean MICHEL',
        // ];  
        $list_auteurs = get_auteurs($dbh);      
        ?>

        <div class="form-group">
            <label for="pet-select">Auteur:</label>
            <select name="auteur_id" id="auteur_id" class="form-control">
                <!-- <option value="1">Bob MARTIN</option>
                <option value="2">Jean MICHEL</option> -->
                <?php foreach ($list_auteurs as $auteur) :  ?>
                    <option value="<?php echo $auteur['id']; ?>"><?php echo $auteur['prenom']. ' ' .$auteur['nom'];?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
   


  <?php include('include/footer.php'); ?>
</body>

</html>
