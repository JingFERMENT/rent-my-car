
<?php
// !!!! meme vu pour ajouter et modifier 
require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

// mettre de manière globale
try {
    $title = 'modifier une catégorie';

    // attention c'est en GET pour récupérer les données 
    $idCategory = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    $category = Category::get($idCategory);
    

    if (!$category) {
        header('location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // vérifier s'il y a des doublons de catégorie
        $isExistDuplicate = Category::isExist($name);
        if ($isExistDuplicate && $name != $category->getName()) {
            $errors['name'] = 'Cette catégorie existe déjà.';
        }

        // vérifier s'il y a des véhicules qui sont liés à une categorie 
        

        // si tout est OK 
        if (empty($errors)) {
            $category = new Category();

            $category->setName($name);
            $category->setIdCategory($idCategory);

            $updateCategoryResult = $category->update();
            if ($updateCategoryResult) {
                $msg = 'La donnée a bien été modifiée.';
                // header('location: /controllers/dashboard/categories/list-ctrl.php');
            } else {
                $msg = 'Erreur, la donnée n\'a pas été modifiée.';
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
