<?php

require_once(__DIR__ . '/../models/Vehicle.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/dd.php');

$maxDate = date('Y-m-d');
$minDate = (date('Y') - 120) . '-01-01';
$date = new DateTime();
$currentdate = $date -> format ('Y-m-d');


try {

    $title = 'Réservation';

    // filtre input permet de ne pas mettre isset, car cela renvoit une valeur null
    $id_vehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    $vehicle = Vehicle::get($id_vehicle);
  



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // LASTNAME
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        
        // filtrer les données provenant d'un tableau
        // $datas= filter_input_array(INPUT_POST, [
        //     'lastname' => [
        //         'filter'=> FILTER_VALIDATE_REGEXP,
        //         'options'=> ['regexp' => '/' . REGEX_NAME . '/']
        //     ],
        // ]);

        // foreach ($datas as $key => $data) {
        //     if($data === false) {
        //         $errors[$key] = ' Cette donnée n\'est pas valide.';
        //     }
          
        // }

        if (empty($lastname)) { // pour les champs obligatoires
            $errors['lastname'] = 'Le nom est obligatoire.';
        } else {
            // 2) validation des données "lastname"
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $errors['lastname'] = 'Le nom est invalide.';
            }
        }

        // FIRSTNAME
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstname)) { // pour les champs obligatoires
            $errors['firstname'] = 'Le prénom est obligatoire.';
        } else {
            // 2) validation des données "lastname"
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $errors['firstname'] = 'Le prénom est invalide.';
            }
        }

        // EMAIL
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email'] = 'L\'email est obligatoire.';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errors['email'] = 'L\'email est invalide.';
            }
        }

        // BIRTHDAY
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
        if (empty($birthday)) {
            $errors['birthday'] = 'La date de naissance est obligatoire.';
        } else {
            $isOk = filter_var($birthday, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
            if (!$isOk || $birthday > $maxDate || $birthday < $minDate) {
                $errors['birthday'] = 'La date de naissance est invalide.';
            }
        }

        // PHONE
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $errors['phone'] = 'Le téléphone est obligatoire.';
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
            if (!$isOk) {
                $errors['phone'] = 'Le téléphone est invalide.';
            }
        }

        // CITY
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $errors['city'] = 'La ville est obligatoire.';
        } else {
            $isOk = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CITY . '/')));
            if (!$isOk) {
                $errors['city'] = 'La ville est invalide.';
            }
        }

        // ZIPCODE
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Les codes postaux sont obligatoires.';
        } else {
            $isOk = filter_var($zipcode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
            if (!$isOk) {
                $errors['zipcode'] = 'Les codes postaux sont invalides.';
            }
        }

        // STARTDATE
        $startdate = filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($startdate)) {
            $errors['startdate'] = 'La date de début est obligatoire.';
        } else {
            $isOk = filter_var($startdate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
            if (!$isOk || $startdate < $currentdate ) {
                $errors['startdate'] = 'La date de début est invalide.';
            }
        }


        // ENDDATE
        $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($enddate)) {
            $errors['enddate'] = 'La date de fin est obligatoire.';
        } else {
            $isOk = filter_var($birthday, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
            if (!$isOk || $enddate < $currentdate) {
                $errors['enddate'] = 'La date de fin est invalide.';
            }
        }


        // insérer deux fois les données 
        
    }
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}


// views
include __DIR__ . '../../views/templates/header.php';
include __DIR__ . '../../views/vehicles/form.php';
include __DIR__ . '../../views/templates/footer.php';
