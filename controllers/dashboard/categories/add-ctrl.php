<?php

require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

// connexion de la base des données  
// $dsn : data server name 
// host: hébergeur 

// mettre de manière globale
try {
    $title = 'ajouter une catégorie';

    // si le formulaire est envoyé
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];
        // nettoyage des données "ajout du nom de catégorie"
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) { // le champs est obligatoire
            $errors['name'] = 'Le nom est obligatoire.';
        } else {
            // validation des données "name"
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME_CATEGORY . '/')));
            if (!$isOk) {
                $errors['name'] = 'Le nom de la catégorie doit contenir entre 2 à 50 caractères alphabétiques.';
            }
        }

        // si tout est OK 
        if (empty($error)) {
            // objet prêt à être inséré dans la base 
            $category = new Category();
            // objet hydraté
            $category->setName($name);

            $insertResult = $category->insert();

            if ($insertResult) {
                $msg = 'La donnée a bien été insérée.';
            } else {
                $msg = 'Erreur, la donnée n\'a pas été insérée.';
            }
        }
    }
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}


// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';

// operations 
// vider la table (truncate)
// décocher la case
// } else {
//     // selectionner les données entrées 
//     $sql = "SELECT name FROM categories WHERE name = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$name]);
//     $sqlResult = $stmt->fetch();
//     // vérifier des doublons 
//     if (is_array($sqlResult) && count($sqlResult) > 0) {
//         $erros['name'] = 'Cette catégorie existe déjà.';
//     } else {
//         $result = 'Le nom de catégorie a bien été pris en compte.';
//         // on utilise les marqueurs nominatif après : 
//     }
// }