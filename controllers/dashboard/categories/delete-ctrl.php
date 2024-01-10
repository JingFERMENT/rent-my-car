<?php

require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

try {
    $title = 'supprimer une catégorie';

    // $category = new Category();
    $idCategory = $_GET['id_category'];

    if (isset($_GET['id_category'])) {

        $category = new Category();

        $deleteCategoryResult = $category->delete($idCategory);

        if ($deleteCategoryResult) {
            $msg = 'La donnée concernée a bien été supprimée.';
        } else {
            $msg = 'Erreur, la donnée n\'a pas été insérée.';
        }
        
        $categories = Category::getAll();

    } else {
        $msg = 'Erreur, la donnée n\'existe pas.';
    }
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}





// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
