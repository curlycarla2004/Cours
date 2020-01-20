<?php

require_once('include/functions.php');


$article_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ?? 0;

$article = get_article($article_id);
if (!$article) {
  http_response_code(404);
  include('erreur_404.php');
  die();
}

$titre_page = 'Article | ' . $article['titre'];
?>

<!DOCTYPE html>
<html lang="fr">
<?php include('include/head.php'); ?>

<body>

  <?php require_once('include/admin-panel.php'); ?>
  <h1 class="display-1 py-5 my-5 text-center text-secondary"><?php echo $article['titre']; ?></h1>

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="article-list.php"><i class="fa fa-home" aria-hidden="true"></i> </a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $article['titre']; ?></li>
      </ol>
    </nav>

    <article class="py-4">
      <header class="d-flex justify-content-center">
        <h6 class="text-muted pr-4"><i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $article['prenom'] . ' ' . $article['nom']; ?></h6>
        <h6 class="text-muted"><i class="fa fa-calendar pr-2" aria-hidden="true"></i><?php echo $article['date']; ?></h6>
      </header>
      <img src="<?php echo 'images/protected/'.$article['img_url']; ?>" class="img-fluid">
      <p class="text-justify py-4">
        <?php
        $text = texte_en_gras($article['corps']);
        $text = url_to_link($text);
        echo $text;
        ?>
      </p>
    </article>

  </div>

  <?php include('include/footer.php'); ?>
</body>

</html>
