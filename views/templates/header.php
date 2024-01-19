<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? '' ?> | Rent my car
    </title>
    <!-- balise open graphe -->
    <!-- css bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- my css file -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
    <header class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            <a href="/controllers/vehicles_list_ctrl.php"><img src="/public/assets/img/Logo_rent_my_car.png" class="img-fluid img_logo" alt="Logo du site"></a>
            <a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php" class="btn btn-dark my-4 text-white text-uppercase fw-bold" value="Dashboard">Dashboard</a>
        </div>
    </header>

    <main class="container">