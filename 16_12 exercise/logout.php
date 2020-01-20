<?php
//il faut s'assurer que le gestionnaire de session PHP est démarré si on ne mettre pas il ne pourra pas détruire la session de l'utilisateur
session_start();

//destruction de la session
session_destroy();

//redirection vers la page de listing des articles
header('Location: article-list.php')

?>