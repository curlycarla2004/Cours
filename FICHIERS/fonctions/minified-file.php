<?php

/**
 * Appel d'un service tiers de mnification de css.
 *
 * @return string notre css minifiée
 */
function minified_this_file($file){

  // Url du service tiers.
  $url = 'https://cssminifier.com/raw';
  // Récupération du contenu de notre fichier css non minifié.
  $css = file_get_contents($file);

  // Initialisation de la commande curl.
  $ch = curl_init();

  // Paramètrage de la requete curl.
  curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
    CURLOPT_POSTFIELDS => http_build_query(["input" => $css])
  ]);

  // Execution de la requete.
  $minified = curl_exec($ch);

  // Cloture de la requete.
  curl_close($ch);

  // Renvoie du css minifié.
  return $minified;
}
