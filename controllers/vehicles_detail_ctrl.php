<?php

require_once(__DIR__ . '/../models/Vehicle.php');
require_once(__DIR__ . '/../helpers/dd.php');

try {

    $title = 'Détail du véhicule';

    // Récupération de l'ID du véhicule et nettoyage
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));
    
    $theVehicle = Vehicle::get($idVehicle);
    // dd($theVehicle);
    

    


} catch (Throwable $e)  {
    echo "Connection failed: " . $e->getMessage();
}









// views
include __DIR__ . '../../views/templates/header.php';
include __DIR__ . '../../views/vehicles/detail.php';
include __DIR__ . '../../views/templates/footer.php';