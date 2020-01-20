<?php

// Vérifie si un formulaire est bien rempli
function verifierFormulaire($_post, $cles) {
    foreach($cles as $cle) {
        if(!isset($_post[$cle]) OR empty($_post[$cle])) {
            return false;
        }
    }

    return true;
}

// Insert un magazine en BDD
function insertLogement($_post, $image, $dbh)
{
    global $dbh;
    $req = $dbh->prepare("
        INSERT INTO logement (titre, description, prix, photo, ville, adresse, cp, surface, type) 
        VALUES (:titre, :description, :prix, :photo, :ville , :adresse, :cp, :surface, :type)
    ");
    $req->bindParam(':titre', $_post['titre'], PDO::PARAM_STR);
    $req->bindParam(':description', $_post['description'], PDO::PARAM_STR);
    $req->bindParam(':prix', $_post['prix'], PDO::PARAM_INT);
    $req->bindParam(':photo', $image, PDO::PARAM_STR);
    $req->bindParam(':ville', $_post['ville'], PDO::PARAM_STR);
    $req->bindParam(':adresse', $_post['adresse'], PDO::PARAM_STR);
    $req->bindParam(':cp', $_post['cp'], PDO::PARAM_INT);
    $req->bindParam(':surface', $_post['surface'], PDO::PARAM_INT);
    $req->bindParam(':type', $_post['type'], PDO::PARAM_STR);
    $req->execute();

    return $dbh->lastInsertId();
}

// Upload une image
function uploadImage($_files, $nouveau_nom)
{
    move_uploaded_file($_files['tmp_name'], 'images/logement'. $nouveau_nom);
}

// Met à jour le nom d'une image en BDD
function updateImageLogement($id, $nom, $dbh)
{
    global $dbh;
    $req = $dbh->prepare("UPDATE logement SET photo = :photo WHERE id_logement = :id_logement");
    $req->bindParam(':photo', 'images/'. $nom, PDO::PARAM_STR);
    $req->bindParam(':id_logement', $id, PDO::PARAM_INT);
    $req->execute();
}

// Met à jour un Logement
function updateLogement($id, $_post, $nom_photo, $dbh)
{
    global $dbh;
    $req = $dbh->prepare("
                    UPDATE logement 
                    SET 
                        titre = :titre, 
                        description = :description, 
                        prix = :prix,
                        photo = :photo, 
                        adresse = :adresse,
                        ville = :ville,
                        surface = :surface,
                        type = :type,
                        cp = :cp,

                    WHERE id_logement = :id_logement
                ");
    $req->bindParam(':titre', $_post['titre'], PDO::PARAM_STR);
    $req->bindParam(':description', $_post['description'], PDO::PARAM_STR);
    $req->bindParam(':prix', $_post['prix'], PDO::PARAM_INT);
    $req->bindParam(':photo', $nom_photo, PDO::PARAM_STR);
    $req->bindParam(':adresse', $_post['adresse'], PDO::PARAM_STR);
    $req->bindParam(':ville', $_post['ville'], PDO::PARAM_STR);
    $req->bindParam(':surface', $_post['surface'], PDO::PARAM_INT);
    $req->bindParam(':type', $_post['type'], PDO::PARAM_STR);
    $req->bindParam(':cp', $_post['cp'], PDO::PARAM_INT);
    $req->bindParam(':id_logement', $id, PDO::PARAM_INT);
    $req->execute();
}



function get_img_src($img_url = ''){
  if(!$img_url){
    return IMAGE_PAR_DEFAUT;
  }
  else{
    return $img_url;
  }
}


?>