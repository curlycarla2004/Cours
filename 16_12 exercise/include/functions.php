<?php

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
  $query = 'SELECT article.id, article.titre, article.corps,  DATE_FORMAT(article.date, "%D %b %Y") AS date, auteur.nom, auteur.prenom
    FROM article
    JOIN auteur ON auteur.id = article.auteur_id';

  $rows = $dbh->query($query);
  $articles = $rows->fetchAll(PDO::FETCH_ASSOC);
  return $articles;
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
  $query = 'SELECT article.titre, article.corps,  DATE_FORMAT(article.date, "%Y-%m-%d") AS date
  FROM article
  WHERE id = :article_id';

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
  $query = 'INSERT INTO article (corps, date, auteur_id, titre)
  VALUES (:corps, :date, :auteur_id, :titre)';

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
  SET titre = :titre, corps = :corps, date = :date
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
