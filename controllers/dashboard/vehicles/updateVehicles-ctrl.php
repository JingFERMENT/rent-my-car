<?php
require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Vehicle.php');
require_once(__DIR__ . '/../../../models/Category.php');

try {

    $title = "Modifier un véhicule";

    $categories = Category::getAll(true);
  
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_vehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));
    $theVehicle = Vehicle::get($id_vehicle);

    if (!$theVehicle) {
        header('location: /controllers/dashboard/vehicles/listVehicles-ctrl.php');
        die;
    }

    // Si les données du formulaire ont été transmises
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // Récupération, nettoyage et validation des données
        $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT));
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        $picture = $_FILES['picture'];

         // Catégorie
         if (!$id_category) { // pour les champs obligatoires
             $errors['id_category'] = 'La catégorie est obligatoire.';
         } else { // validation des données
            if(!Category::get($id_category)){
                $error['id_category'] = 'Cette catégorie est inconnue!';
            }
         }

        // Marque 
        if (!$brand) { // le champs est obligatoire
            $errors['brand'] = 'La marque est obligatoire.';
        } else {
            // validation des données "marque"
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_BRAND . '/')));
            if (!$isOk) {
                $errors['name'] = 'Le nom de la marque doit contenir entre 2 à 50 caractères alphabétiques.';
            }
        }

        // Model 
        if (!$model) { // pour les champs obligatoires
            $errors['model'] = 'La modèle est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MODEL . '/')));
            if (!$isOk) {
                $errors['model'] = 'La modèle est invalide.';
            }
        }

        // Immatriculation
        if (!$registration) { // pour les champs obligatoires
            $errors['registration'] = 'Le numéro d\'immatriculation est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_REGISTRATION . '/')));
            if (!$isOk) {
                $errors['registration'] = 'Le numéro d\'immatriculation est invalide.';
            }
        }

        // Kilométrage
        if (!$mileage) { // pour les champs obligatoires
            $errors['mileage'] = 'Le nombre de kilomètre est obligatoire.';
        } else {
            // validation des données
            $isOk = filter_var($mileage, FILTER_VALIDATE_INT);
            if (!($isOk >=0) ) {
                $errors['mileage'] = 'Le nombre de kilomètre est invalide.';
            }
        }

        $pictureToSave = $theVehicle->picture;
       
        // FILE: 
        // if ($picture['error'] != 4) {
        if (!empty($picture['name'])) {
            try {
                // @ signfie que si la suppression du fichier échoue pour une raison quelconque, comme si le fichier n'existe pas, le script continuera à s'exécuter sans générer de message d'erreur
               @unlink(__DIR__. '/../../../public/uploads/vehicles/' .$pictureToSave); // supprimer l'image si on change de l'image
                
                if ($picture['error'] != 0) {
                    throw new Exception("Une erreur s'est produite.");
                }

                // quand le format n'est pas correct
                if (!in_array($picture['type'], ARRAY_TYPES_MIMES)) {
                    throw new Exception("Le format de l'image n'est pas correct.");
                }

                if ($picture['size'] > UPLOAD_MAX_SIZE) {
                    throw new Exception("Le fichier est trop lourd");
                }

                // une chaine de caractère unique 
                $filename = uniqid('img_');
                $extension = pathinfo($picture['name'], PATHINFO_EXTENSION); // récupérer les extensions
                // le fichier venait de dossier tmp_name
                $from = $picture['tmp_name']; 

                $toBack = __DIR__ . '/../../../public/uploads/vehicles/' . $filename . '.' . $extension;
                $pictureToSave =  $filename . '.' . $extension; // enregistrer uniquement le nom du fichier
                move_uploaded_file($from, $toBack);
            } catch (\Throwable $th) {
                $errors['picture'] = $th->getMessage();
            }
        }

        
        $isExist = Vehicle::isExist($registration);
        // si la plaque existe déjà en base ou c'est pareil que celui rentré par l'utilisateur
        if($isExist && $registration != $theVehicle->registration) {
            $errors['isExist'] = 'La plaque d\'immatriculation existe déjà.';
        }

        if (empty($errors)) {

            // mettre à jour les véhicules
            $updatedVehicle = new Vehicle();

            $updatedVehicle->setId_category($id_category);
            $updatedVehicle->setId_vehicle($id_vehicle);
            $updatedVehicle->setBrand($brand);
            $updatedVehicle->setModel($model);
            $updatedVehicle->setRegistration($registration);
            $updatedVehicle->setMileage($mileage);
            $updatedVehicle->setPicture($pictureToSave);

            // Appel de la méthode update
            $updatedResult = $updatedVehicle->updateVehicles();

            if ($updatedResult) {
                $msg = 'La modification a bien été prise en compte.';
                // header('location: /controllers/dashboard/vehicles/listVehicles-ctrl.php');
                // die;
            } else {
                $msg = 'Erreur, le véhicule n\'a pas été modifié.';
            }

            $theVehicle = Vehicle::get($id_vehicle);
        }
    }
   

} catch (Throwable $e) {
    $error = $e->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
    die;
}

// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/updateVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
