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

// Vérifier une image
// function verifierImage($_files)
// {
//     // Récupère différentes informations sur l'image
//     $nom_image = $_files['name'];
//     $type_image = $_files['type'];
//     $taille_image = $_files['size'];

//     // Diverses infos de vérifications
//     $taille_max = 3 * 1024 * 1024; // 8mo
//     $type_ok = array(
//         'jpg' => 'image/jpeg',
//         'jpeg' => 'image/jpeg',
//         'gif' => 'image/gif',
//         'png' => 'image/png'
//     );

//     // $extension = strtolower(pathinfo($nom_image, PATHINFO_EXTENSION));
//     // if(array_key_exists($extension, $type_ok)) {

//     //     if($taille_image < $taille_max) {

//     //         if(in_array($type_image, $type_ok)) {
//     //             // png, jpg, jpeg, gif
//     //             return $extension;
//     //         }
//     //         else {
//     //             return false;
//     //         }
//     //     }
//     //     else {
//     //         return false;
//     //     }
//     // }
//     // else{
//     //     return false;
//     // }
// }

// "Slugify" une chaine de caractère
function slug($string)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return strtolower($slug);
}

// Insert un magazine en BDD
function insertLogement($_post, $image, $db)
{
    $requete = $db->prepare("
        INSERT INTO logement (titre, description, prix, photo, ville, adresse, cp, surface, type) 
        VALUES (:titre, :description, :prix, :photo, :ville , :adresse, :cp, :surface, :type)
    ");
    $requete->bindValue(':titre', $_post['titre'], PDO::PARAM_STR);
    $requete->bindValue(':description', $_post['description'], PDO::PARAM_STR);
    $requete->bindValue(':prix', $_post['prix'], PDO::PARAM_INT);
    $requete->bindValue(':photo', $image, PDO::PARAM_STR);
    $requete->bindValue(':ville', $_post['ville'], PDO::PARAM_STR);
    $requete->bindValue(':adresse', $_post['adresse'], PDO::PARAM_STR);
    $requete->bindValue(':cp', $_post['cp'], PDO::PARAM_INT);
    $requete->bindValue(':surface', $_post['surface'], PDO::PARAM_INT);
    $requete->bindValue(':type', $_post['type'], PDO::PARAM_STR);
    $requete->execute();

    return $db->lastInsertId();
}

// Upload une image
function uploadImage($_files, $nouveau_nom)
{
    move_uploaded_file($_files['tmp_name'], 'images/logement'. $nouveau_nom);
}

// Met à jour le nom d'une image en BDD
function updateImageLogement($id, $nom, $db)
{
    $requete = $db->prepare("UPDATE logement SET photo = :photo WHERE id_logement = :id_logement");
    $requete->bindValue(':photo', 'images/'. $nom, PDO::PARAM_STR);
    $requete->bindValue(':id_logement', $id, PDO::PARAM_INT);
    $requete->execute();
}

// Met à jour un Logement
function updateLogement($id, $_post, $nom_photo, $db)
{
    $requete = $db->prepare("
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
    $requete->bindValue(':titre', $_post['titre'], PDO::PARAM_STR);
    $requete->bindValue(':description', $_post['description'], PDO::PARAM_STR);
    $requete->bindValue(':prix', $_post['prix'], PDO::PARAM_INT);
    $requete->bindValue(':photo', $nom_photo, PDO::PARAM_STR);
    $requete->bindValue(':adresse', $_post['adresse'], PDO::PARAM_STR);
    $requete->bindValue(':ville', $_post['ville'], PDO::PARAM_STR);
    $requete->bindValue(':surface', $_post['surface'], PDO::PARAM_INT);
    $requete->bindValue(':type', $_post['type'], PDO::PARAM_STR);
    $requete->bindValue(':cp', $_post['cp'], PDO::PARAM_INT);
    $requete->bindValue(':id_logement', $id, PDO::PARAM_INT);
    $requete->execute();
}

?>