
<?php
// !!!! meme vu pour ajouter et modifier 
require_once(__DIR__ . '/../../../models/Category.php');

// mettre de manière globale
try {
    $title = 'Modifier une catégorie';

    // attention c'est en GET 
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    
    $categorytoDisplay = Category::get($id_category);
    
    if (!$categorytoDisplay) {
        header('location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

    // Si les données du formulaire ont été transmises
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];
        // Récupération, nettoyage et validation des données
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
        if ($isExistDuplicate && $name != $categorytoDisplay->name) {
            $errors['name'] = 'Cette catégorie existe déjà.';
        }        

        // si tout est OK, enregistrement en base de données
        if (empty($errors)) {
            // Création d'un nouvel objet issu de la classe 'Type'
            $categoryToSave = new Category();

            // Hydratation de notre objet
            $categoryToSave->setName($name);
            $categoryToSave->setIdCategory($id_category);

             // Appel de la méthode update
            $updateCategoryResult = $categoryToSave->update();

            // Si la méthode a retourné "true"
            if ($updateCategoryResult) {
                $msg = 'Catégorie modifiée avec succés.';
                // header('location: /controllers/dashboard/categories/list-ctrl.php');
            } else {
                $msg = 'Erreur, la catégorie n\'a pas été modifiée.';
            }

            // Récupération de la catégorie selon son id
            $categorytoDisplay = Category::get($id_category);
        }
    }
} catch (Throwable $e) {
    // echo "Connection failed: " . $e->getMessage();
    $error = $e->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}
// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
