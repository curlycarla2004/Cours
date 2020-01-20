<?php require_once('include/functions.php'); 
    $article_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ?? 0;
    $article = get_article($article_id);
        // if(!$article){
        //     http_response_code(404);
        //     include('erreur_404.php');
        //     die();
        // }
    $titre_page ='Article |'.$article['titre'];
?>

<!DOCTYPE html>
    <html lang="fr">
    <?php include('include/head.php'); ?>

    <body>

        <?php require_once('include/admin-panel.php'); ?>

        <h1 class="display-1 py-5 my-5 text-center text-secondary">Articles</h1>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="article-list.php">Liste</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Édition</li>
                </ol>
            </nav>
        <img src="<?php echo 'images/protected/'.$article['img_url']; ?>">

        <p class="text-justify py-4"></p>
        <?php $text = lien_hypertext($article['corps']);
            echo $text;
        ?>
        </p>

        <?php include('include/footer.php'); ?>
</body>

</html>