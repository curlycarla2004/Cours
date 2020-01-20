<?php
    require_once 'bdd.php';
    
    if(isset($_GET['id_conducteur']) && !empty($_GET['id_conducteur']))
    {
        $requete = $dbh->prepare("
            SELECT COUNT(id_conducteur) AS is_exist,nom FROM conducteur WHERE id_conducteur = :id_conducteur
        ");
        $requete->bindValue(':id_conducteur', $_GET['id_conducteur'], PDO::PARAM_INT);
        $requete->execute();
        $conducteur = $requete->fetch();

        if($conducteur['is_exist'] == 1){
            $requete = $dbh->prepare("
            DELETE FROM conducteur WHERE id_conducteur = :id_conducteur
        ");
        $requete->bindValue(':id_conducteur', $_GET['id_conducteur'], PDO::PARAM_INT);
        $requete->execute();
        header('Location: conducteur.php');

        }else{
            echo '<div class="alert alert-danger">Erreur! Ce conducteur nexiste pas</div>';
        }
    }else{
        echo '<div class="alert alert-danger">Erreur! Probleme lors de la supression</div>';
    }
?>