<?php
session_start();
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

        // vérifier s'il y a des doublons de catégorie
        $isExistDuplicate = Category::isExist($name);
        if ($isExistDuplicate) {
            $errors['name'] = 'Cette catégorie existe déjà.';
        }

        // colate SQL: majuscule sensibilité

        // si tout est OK 
        if (empty($errors)) {
            // objet prêt à être inséré dans la base 
            $category = new Category();
            // objet hydraté
            $category->setName($name);

            $insertResult = $category->insert();
            if ($insertResult) {
                $msg = 'La catégorie a bien été prise en compte.';
                // header('location: /controllers/dashboard/categories/list-ctrl.php');
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

// how to vider la table manuelle dans le SQL 
// aller sur le rubrique "operations" -> vider la table (truncate) -> décocher la case
