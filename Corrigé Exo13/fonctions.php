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

// Retour un tableau HTML contenant les données reçus
function createTable($donnees, $bootstrap = false)
{
    $table_css = $bootstrap ? 'class="table"' : '';
    $theader_css = $bootstrap ? 'class="table-dark"' : '';

    // Ouverture du tableau
    $table = '<table '. $table_css .'>';

    // Header du tableau
    $table .= '<thead '. $theader_css .'>';
    $table .= '<tr>';

    $colonnes = current($donnees);
    foreach($colonnes as $key => $value) {
        $table .= '<th scope="col">'. ucfirst($key) .'</th>';
    }

    $table .= '<th scope="col">Actions</th>';
    $table .= '<tr>';
    $table .= '</thead>';

    // Corps du tableau
    $table .= '<tbody>';


    foreach($donnees as $donnee) {
        $table .= '<tr>';

        foreach($donnee as $key => $item) {
            if($key == 'image') {
                $table .= '<td><img src="'. $item .'" class="w-50"></td>';
            }
            elseif($key == 'description') {
                $table .= '<td>'. mb_strimwidth(strip_tags($item), 0, 50, '...') .'</td>';
            }
            else {
                $table .= '<td>'. strip_tags($item) .'</td>';
            }
        }

        $table .= '<td>';
        $table .= '<p class="m-0"><a href="details.php?id='. current($donnee) .'">Voir le détail</a></p>';
        $table .= '<p class="m-0"><a href="editer.php?id='. current($donnee) .'" class="text-muted">Mettre à jour</a></p>';
        $table .= '<p class="m-0"><a href="index.php?id='. current($donnee) .'&delete=true" class="text-danger">Supprimer</a></p>';
        $table .= '</td>';

        $table .= '<tr>';
    }

    $table .= '</tbody>';

    // Fin du tableau
    $table .= '</table>';

    return $table;
}

// Sélectionne tous les magazines
function getAllMagazines($db)
{
    $requete = $db->query("
        SELECT magazine.id, magazine.nom, magazine.description, magazine.image, magazine.prix, editeur.nom AS editeur FROM magazine 
        INNER JOIN editeur ON editeur.id = magazine.editeur_id
    ");

    $magazines = $requete->fetchAll();

    return $magazines;
}

// Supprime un magazine
function deleteMagazine($id, $image, $db)
{
    $requete = $db->prepare("DELETE FROM magazine WHERE id = :id");
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    unlink($image);
}

// Sélectionne un magazine
function selectOneMagazine($id, $db)
{
    $requete = $db->prepare("
        SELECT magazine.*, editeur.nom AS editeur FROM magazine 
        INNER JOIN editeur ON editeur.id = magazine.editeur_id
        WHERE magazine.id = :id
    ");

    // Paamayim Nekudotayim  =>  ::

    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $magazine = $requete->fetch();

    return $magazine;
}

// Sélectionne tous les éditeurs
function getAllEditeurs($db)
{
    $requete = $db->query("SELECT * FROM editeur");
    $editeurs = $requete->fetchAll();

    return $editeurs;
}

// Vérifier une image
function verifierImage($_files)
{
    // Récupère différentes informations sur l'image
    $nom_image = $_files['name'];
    $type_image = $_files['type'];
    $taille_image = $_files['size'];

    // Diverses infos de vérifications
    $taille_max = 2 * 1024 * 1024; // 8mo
    $type_ok = array(
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png'
    );

    $extension = strtolower(pathinfo($nom_image, PATHINFO_EXTENSION));
    if(array_key_exists($extension, $type_ok)) {

        if($taille_image < $taille_max) {

            if(in_array($type_image, $type_ok)) {
                // png, jpg, jpeg, gif
                return $extension;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    else{
        return false;
    }
}

// "Slugify" une chaine de caractère
function slug($string)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return strtolower($slug);
}

// Insert un magazine en BDD
function insertMagazine($_post, $image, $db)
{
    $requete = $db->prepare("
        INSERT INTO magazine (nom, description, prix, image, editeur_id) 
        VALUES (:nom, :description, :prix, :image, :editeur_id)
    ");
    $requete->bindValue(':nom', $_post['nom'], PDO::PARAM_STR);
    $requete->bindValue(':description', $_post['description'], PDO::PARAM_STR);
    $requete->bindValue(':prix', $_post['prix'], PDO::PARAM_INT);
    $requete->bindValue(':image', 'image/'. $image, PDO::PARAM_STR);
    $requete->bindValue(':editeur_id', $_post['editeur'], PDO::PARAM_INT);
    $requete->execute();

    return $db->lastInsertId();
}

// Upload une image
function uploadImage($_files, $nouveau_nom)
{
    move_uploaded_file($_files['tmp_name'], 'images/'. $nouveau_nom);
}

// Met à jour le nom d'une image en BDD
function updateImageMagazine($id, $nom, $db)
{
    $requete = $db->prepare("UPDATE magazine SET image = :image WHERE id = :id");
    $requete->bindValue(':image', 'images/'. $nom, PDO::PARAM_STR);
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();
}

// Met à jour un magazine
function updateMagazine($id, $_post, $nom_image, $db)
{
    $requete = $db->prepare("
                    UPDATE magazine 
                    SET 
                        nom = :nom, 
                        description = :description, 
                        prix = :prix,
                        image = :image, 
                        editeur_id = :editeur_id 
                    WHERE id = :id
                ");
    $requete->bindValue(':nom', $_post['nom'], PDO::PARAM_STR);
    $requete->bindValue(':description', $_post['description'], PDO::PARAM_STR);
    $requete->bindValue(':prix', $_post['prix'], PDO::PARAM_INT);
    $requete->bindValue(':image', $nom_image, PDO::PARAM_STR);
    $requete->bindValue(':editeur_id', $_post['editeur'], PDO::PARAM_INT);
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();
}

?>