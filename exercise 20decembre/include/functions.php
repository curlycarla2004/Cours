<?php

define('IMAGE_PAR_DEFAUT', 'images/default/no-picture.png');
define('IMAGE_THUMBNAILS_DIR', 'images/thumbnails');
define('IMAGE_WATERMARK', 'images/watermark/logo2.png');
define('NB_ARTICLES_PAR_PAGE', 2);
//On inclus le fichier de connexion à la BDD.
require_once('db-connector.php');

//On s'assure de lancer le gestionnaire de session à chaque fois.
session_start();

/**
 * Récupération de tous les articles.
 *
 * @return mixed array ou FALSE
 */
function get_articles()
{
  global $dbh;

  $offset =  filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT)* NB_ARTICLES_PAR_PAGE ?? 0;
  $limit = NB_ARTICLES_PAR_PAGE;

  $query = 'SELECT article.id, article.titre, article.corps,  DATE_FORMAT(article.date, "%D %b %Y") AS date,
  article.img_url, auteur.nom, auteur.prenom
    FROM article
    JOIN auteur ON auteur.id = article.auteur_id
    LIMIT :debut, :fin';

  $req = $dbh->prepare($query);
  $req->bindParam(':debut', $offset, PDO::PARAM_INT);
  $req->bindParam(':fin', $limit, PDO::PARAM_INT);
  $req->execute();
  $articles = $req->fetchAll(PDO::FETCH_ASSOC);
  return $articles;
}

/**
 * Retourne le nombre total d'articles.
 */
function count_articles()
{
  global $dbh;
  return $dbh->query("SELECT COUNT(*) FROM article")->fetchColumn();
}


/**
 * Récupération des tags d'un article.
 *
 * @param INT $article_id
 *
 * @return mixed array ou FALSE
 */
function get_tags($article_id)
{
  global $dbh;
  $query = "SELECT article_has_tag.article_id, tag.nom
  FROM article_has_tag
  JOIN tag ON tag.id = article_has_tag.tag_id
  WHERE article_has_tag.article_id = :article_id";

  $req = $dbh->prepare($query);
  $params = [
    'article_id' => $article_id
  ];
  //Éxecution de la requête.
  $req->execute($params);

  $tags = $req->fetchAll(PDO::FETCH_ASSOC);
  return $tags;
}



/**
 * Récupération des détails d'un seul article.
 *
 * @param INT $article_id
 *
 * @return mixed array or false
 */
function get_article($article_id)
{
  global $dbh;
  $query = 'SELECT article.titre, article.corps,  DATE_FORMAT(article.date, "%Y-%m-%d") AS date, img_url,
  auteur.nom, auteur.prenom
  FROM article
  JOIN auteur ON article.auteur_id = auteur.id
  WHERE article.id = :article_id';

  $req = $dbh->prepare($query);
  $params = [
    'article_id' => $article_id
  ];
  //Éxecution de la requête.
  $req->execute($params);

  $article = $req->fetch(PDO::FETCH_ASSOC);
  return $article;
}

/**
 * Création d'un article en base.
 *
 * @param array $params
 *
 * @return bool
 */
function create_article($params)
{
  global $dbh;
  $query = 'INSERT INTO article (corps, date, auteur_id, titre, img_url)
  VALUES (:corps, :date, :auteur_id, :titre, :img_url)';

  $req = $dbh->prepare($query);
  $result_boolean = $req->execute($params);
  return $result_boolean;
}

/**
 * Mise à jour d'un article en base.
 *
 * @param array $params
 *
 * @return bool
 */
function update_article($params)
{
  global $dbh;
  $query = 'UPDATE article
  SET titre = :titre, corps = :corps, date = :date, img_url = :img_url
  WHERE id = :id';

  $req = $dbh->prepare($query);
  $result_boolean = $req->execute($params);
  return $result_boolean;
}


/**
 * Suppression d'un article en base.
 *
 * @param int $article_id
 *
 * @return bool
 */
function delete_article($article_id)
{
  global $dbh;
  //On supprime d'abord les tags eventuellement associés à cet article dans la table pivot 'article_has_tag'.
  $query_01 = 'DELETE FROM article_has_tag
  WHERE article_has_tag.article_id = :id';
  $req = $dbh->prepare($query_01);
  $req->execute(['id' => $article_id]);

  //Puis on supprime l'article concerné.
  $query_02 = 'DELETE FROM article WHERE article.id = :id';
  $req = $dbh->prepare($query_02);

  //execute() retourne TRUE ou FALSE.
  return $req->execute(['id' => $article_id]);
}

/**
 * Récupération des auteurs.
 *
 * @return mixed array or false
 */
function get_auteurs()
{
  global $dbh;
  $query = 'SELECT id, nom, prenom FROM auteur';
  $req = $dbh->prepare($query);
  //Éxecution de la requête.
  $req->execute();

  $auteurs = $req->fetchAll(PDO::FETCH_ASSOC);
  return $auteurs;
}


// NEW FEATURES //
/**
 * Récupération d'un administrateur par son pseudo.
 *
 * @param STRING $pseudo
 *
 * @return mixed array ou FALSE
 */
function get_administrateur($pseudo)
{
  global $dbh;
  $req = $dbh->prepare('SELECT * FROM administrateur
   WHERE pseudo = :pseudo');
  //Éxecution de la requête.
  $req->execute(['pseudo' => $pseudo]);
  return $req->fetch(PDO::FETCH_ASSOC);
}

/**
 * Création de la session admin.
 */
function init_admin_session($admin)
{
  $_SESSION['is_admin'] = TRUE;
  $_SESSION['username'] = $admin['pseudo'];
}


/**
 * Permet de rediriger l'utilisateur vers une page précise du site.
 */
function redirect_if_not_admin()
{
  if (empty($_SESSION['is_admin'])) {
    //On choisit ici de redireiger vers login.php
    $url = 'login.php';
    header("Location: $url");
  }
}

/**
 * On vérifie simplement que l'utilisateur est un admin.
 *
 * @return bool
 */
function is_admin()
{
  if (empty($_SESSION['is_admin'])) {
    return FALSE;
  } else {
    return TRUE;
  }
}

/**
 * Fonction qui retourne l'image par défaut lorsque que $img_url est vide ou NULL.
 *
 * @param string $img_url
 * @return string le chemin relatif vers l'image.
 */
function get_img_src($img_url = ''){
  if(!$img_url){
    return IMAGE_PAR_DEFAUT;
  }
  else{
    return $img_url;
  }
}

/**
 * Création de la miniature de l'image de l'article
 * @param string $img_path
 */

 function img_resize($img_path){

  $path_parts = pathinfo($img_path);
  // var_dump($path_parts);die;
  
  $source = imagecreatefromjpeg($img_path); //la photo est la source
  $destination = imagecreatetruecolor(200, 150); // On crée la miniature vide
  
  //les fonctions imagesx et magesy renvoient la largeur et la hauteur d'une image
  $largeur_source = imagesx($source);
  $hauteur_source = imagesy($source);
  $largeur_destination = imagesx($destination);
  $hauteur_destination = imagesy($destination);
  
  //On crée la miniature
  imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
  
  //on eregistre la miniature sous le nom
  // header('Content-type : image/jpg');
  imagejpeg($destination, 'images/thumbnails/'.$path_parts['basename']);
 }

 function img_watermark($img_path){
    $path_parts = pathinfo($img_path);

    $stamp = imagecreatefrompng(IMAGE_WATERMARK);
    $im = imagecreatefromjpeg($img_path);
    
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    
    $new_scale = imagescale($im,1140);

    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
    
    // header('Content-type: image/png');
    imagejpeg($new_scale, 'images/protected/'.$path_parts['basename']);
    
    imagedestroy($new_scale);
 }

 function lien_hypertext(string $text){
  $regex = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
  return preg_replace($regex, '<a href="$0" target="_blank" title="$0">$0</a>', $text);

}
 