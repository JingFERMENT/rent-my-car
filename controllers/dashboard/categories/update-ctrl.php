<?php

require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

// connexion de la base des données  
// $dsn : data server name 
// host: hébergeur 

// mettre de manière globale
try {
    $title = 'modifier une catégorie';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET Methode: pré-remplir les données 
        $idCategory = $_GET['id_category'];
        $categories = Category::getAll();

        foreach ($categories as $category) {
            if ($idCategory == $category->id_category) {
                $categoryName = $category->name;
                $categoryId = $category->id_category;
            }
        } 

    } else {
        // POST Méthode: modifier les données pré-remplies
        $errors = [];
        // nettoyage des données "modifier du nom de catégorie"
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
        if (empty($errors)) {
            $category = new Category();
            $updateCategoryResult = $category->update($_POST['id_category'], $name);
            
            if ($updateCategoryResult) {
                $msg = 'La donnée a bien été modifiée.';
                $name = '';
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
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
