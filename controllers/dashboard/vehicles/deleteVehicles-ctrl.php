<?php
session_start();
require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    // Récupération de l'ID du véhicule et nettoyage
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations du véhicule
    $vehicle = Vehicle::get($idVehicle);

    // suppression du véhicule
    $isDeleted = Vehicle::delete($idVehicle);

    if ($isDeleted) {
        $path = __DIR__ . "/../../public/uploads/vehicles/$vehicle->picture";
        @unlink($path);
        $msg = 'Véhicule supprimé avec succès.';
    } else {
        $msg = 'Le véhicule n\'a pas été supprimé.';
    }

    $_SESSION['msg'] = $msg;

    header('location:/controllers/dashboard/vehicles/archiveVehicles-ctrl.php');

    die;
} catch (Throwable $e) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}
