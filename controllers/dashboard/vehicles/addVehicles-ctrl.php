<?php
session_start();
require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Vehicles.php');
require_once(__DIR__ . '/../../../models/Category.php');

// extraite des noms de catégories 
function extractCategoryNames($categories)
{
    $names = [];

    foreach ($categories as $category) {
        $names[] = $category->name;
    }

    return $names;
}

try {
    $title = 'ajouter un véhicule';
    $categories = Category::getAll();
    $categoryNames = extractCategoryNames($categories);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // Catégorie
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) { // pour les champs obligatoires
            $errors['name'] = 'La catégorie est obligatoire.';
        } else { // validation des données
            $isOk = in_array($name, $categoryNames);
            if (!$isOk) {
                $errors['name'] = 'Votre choix est invalide.';
            }
        }

        // Marque
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($brand)) { // pour les champs obligatoires
            $errors['brand'] = 'La marque est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_BRAND . '/')));
            if (!$isOk) {
                $errors['brand'] = 'La marque est invalide.';
            }
        }

        // Modèle
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($model)) { // pour les champs obligatoires
            $errors['model'] = 'La modèle est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MODEL . '/')));
            if (!$isOk) {
                $errors['model'] = 'La modèle est invalide.';
            }
        }

        // Immatriculation
        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($registration)) { // pour les champs obligatoires
            $errors['registration'] = 'Le numéro d\'immatriculation est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_REGISTRATION . '/')));
            if (!$isOk) {
                $errors['model'] = 'Le numéro d\'immatriculation est invalide.';
            }
        }

        // Kilométrage
        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));

        if (!empty($mileage)) { // pour les champs non-obligatoires
            // validation des données
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MILEAGE . '/')));
            if (!$isOk) {
                $errors['model'] = 'Le kilométrage est invalide.';
            }
        }

        // // FILE: 
        if (!empty($_FILES)) {
            if ($_FILES['photo']['error'] !== 4) {
                try {
                    if (!empty($_FILES['photo']['error'])) {
                        throw new Exception("Une erreur s'est produite.");
                    }

                    if (!in_array($_FILES['photo']['type'], ARRAY_TYPES_MIMES)) {
                        throw new Exception("Le format de l'image n'est pas correct.");
                    }

                    if ($_FILES['photo']['size'] > UPLOAD_MAX_SIZE) {
                        throw new Exception("Le fichier est trop lourd");
                    }

                    $filename = uniqid('img_');
                    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    $from = $_FILES['photo']['tmp_name'];
                    $toBack = __DIR__ . '/../public/uploads/users/' . $filename . '.' . $extension;
                    $toFront = '/public/uploads/users/' . $filename . '.' . $extension;
                    move_uploaded_file($from, $toBack);
                } catch (\Throwable $th) {
                    $error['photo'] = $th->getMessage();
                }
            }
        }
    }
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/addVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
