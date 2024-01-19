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
  <link rel="stylesheet" href="/public/assets/css/dashboard.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
  <header></header>

  <div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="pb-3">
          <a href="/index.php">
            <h2 class="pt-3 text-center text-white">Dashboard</h2>
          </a>
          <hr class="m-auto">
        </li>
        <li>
          <a href="/controllers/dashboard/categories/list-ctrl.php"><i class="fa-solid fa-layer-group"></i>Categories</a>
        </li>
        <li>
          <a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php"><i class="fa-solid fa-car"></i>Véhicules</a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-user"></i>Clients</a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-calendar-days"></i>Réservation</a>
        </li>
      </ul>
      <div class="text-center">
      <a href="/controllers/vehicles_list_ctrl.php"class="btn text-white fw-bold px-4 text-uppercase" id="btnQuit">Quitter</a>
      </div>
    </div>
    <div id="page-content-wrapper" class="mx-auto">


      <a href="/index.php" class="d-md-none btn btn-warning text-white my-4" value="Retour">
        << Retour</a>