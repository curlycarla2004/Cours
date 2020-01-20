<?php require_once('include/functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php

$titre_page = 'Liste des articles';

// Récupération des articles.
$articles = get_articles();

include('include/head.php');
?>

<body>

<?php require_once('include/admin-panel.php'); ?>
  <h1 class="display-1 py-5 my-5 text-center text-secondary">Articles</h1>

  <div class="container">
    <a href="article-create.php" class="btn btn-outline-success mb-4"><i class="fa fa-plus pr-2" aria-hidden="true"></i></i>Ajouter un article</a>
    <?php foreach ($articles as $article) : ?>
      <article class="shadow rounded border p-4 mb-5">
        <h2 class="text-primary text-uppercase"><?php echo $article['titre']; ?></h2>

        <?php $tags = get_tags($article['id']); ?>

        <?php foreach ($tags as $tag) : ?>
          <span class="badge badge-primary"><?php echo $tag['nom']; ?></span>
        <?php endforeach ?>


        <p class="text-justify">
          <?php echo $article['corps']; ?>
        </p>
        <hr>
        <footer class="d-flex justify-content-between align-items-center">
          <div class="d-flex">
            <a href="article-edit.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-primary"><i class="fa fa-pencil pr-2" aria-hidden="true"></i>Éditer</a>
            <?php if(is_admin()): ?>
              <a href="delete-article.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-danger ml-2"><i class="fa fa-times pr-2" aria-hidden="true"></i>Supprimer</a>
            <?php endif; ?>
          </div>
          <div class="d-flex">
            <h6 class="text-muted pr-4"><i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $article['prenom'] . ' ' . $article['nom']; ?></h6>
            <h6 class="text-muted"><i class="fa fa-calendar pr-2" aria-hidden="true"></i><?php echo $article['date']; ?></h6>
          </div>
        </footer>
      </article>
    <?php endforeach; ?>
  </div>

  <?php include('include/footer.php'); ?>
</body>

</html>
