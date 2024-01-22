<?php
session_start();

require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    $title = 'Liste des véhicules archivés';

    $archived = true;

    // Récupération de l'ID du véhicule et nettoyage
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations du véhicule
    // $vehicle = Vehicle::get($idVehicle);

    // Archivage du véhicule
    $isArchived = Vehicle::archive($idVehicle);

    if (isset($_GET['sort']) && $_GET['sort'] == 'true') {
        $sortByAsc = true;
    } else {
        $sortByAsc = false;
    }

    $vehicles = Vehicle::getAllVehicles($sortByAsc, $archived);

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    
} catch (Throwable $e) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}

// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/listVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
