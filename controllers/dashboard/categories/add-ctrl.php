<?php
require_once(__DIR__ . '/../../../models/Category.php');

try {
    $title = 'Ajouter une catégorie';

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
        if ($isExistDuplicate) {
            $errors['name'] = 'Cette catégorie existe déjà.';
        }

        // colate SQL: majuscule sensibilité

        // si tout est OK, enregistrement en base de données
        if (empty($errors)) {

             // Création d'un nouvel objet issu de la classe 'category'
            $categoryObj = new Category();

            // Hydratation de notre objet
            $categoryObj->setName($name);

            // Appel de la méthode insert
            $insertResult = $categoryObj->insert();

            // Si la méthode a retourné "true", on redirige vers la liste
            if ($insertResult) {
                $msg = 'La catégorie a bien été inséré. Vous pouvez en saisir une autre.';
                header("Refresh: 1; url=/controllers/dashboard/categories/list-ctrl.php");
                die;
            } else {
                $msg = 'Erreur, la donnée n\'a pas été insérée. Veuillez réessayer.';
            }
        }
    }
} catch (Throwable $e) {
    //inclure une view pour trainter les messages d'erreur
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}


// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';

// how to vider la table manuelle dans le SQL 
// aller sur le rubrique "operations" -> vider la table (truncate) -> décocher la case
