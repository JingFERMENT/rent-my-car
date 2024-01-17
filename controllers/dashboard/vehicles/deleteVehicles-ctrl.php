<?php
session_start();
require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    // Récupération de l'ID du véhicule et nettoyage
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations du véhicule
    $vehicle = Vehicle::get($idVehicle);

    // Archivage du véhicule
    $isArchived = Vehicle::archive($idVehicle);

    if ($isArchived) {
        // Assurer le bon chemin du fichier en ajoutant $_SERVER['DOCUMENT_ROOT']
        if ($vehicle->picture !== NULL) {

            $path = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/vehicles/$vehicle->picture";

            // vérifier si le fichier existe avant de supprimer
            if (file_exists($path)) {
                // supprimer le fichier. UNLINK retourner une valeur booléenne
                if (unlink($path)) {
                    $msg = 'Véhicule supprimé avec succès.';
                } else {
                    $msg = 'Erreur lors de la suppression de l\'image';
                }
            } else {
                $msg = 'L\'image n\'existe pas';
            }
        } else {
            $msg = 'Véhicule supprimé avec succès.';
        }
    } else {
        $msg = 'Erreur, la donnée n\'a pas été supprimée.';
    }

    $_SESSION['msg'] = $msg;

    header('location:/controllers/dashboard/vehicles/listVehicles-ctrl.php');

    die;
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}
