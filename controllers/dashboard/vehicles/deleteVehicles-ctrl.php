<?php 
session_start();
require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    $errors = [];
    
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));
   
    $isDeleted = Vehicle::archive($idVehicle);
    if ($isDeleted) {
        $msg = 'Véhicule supprimé avec succès.';
    } else {
        $error = 'Erreur, la donnée n\'a pas été modifiée.';
    }

    header('location:/controllers/dashboard/vehicles/listVehicles-ctrl.php');

    die;

} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}
