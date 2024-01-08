<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    Rent my car - <?= $title ?? ''?>
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
  <header></header>

  <main>
    <!-- sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="pb-5">
          <h2 class="pt-3 text-center text-white">Dashboard</h2>
          <hr class="m-auto">
        </li>
        <li>
          <a href="http://rent-my-car.localhost/controllers/dashboard/categories/list-ctrl.php"><i class="fa-solid fa-layer-group"></i>Categories</a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-car"></i>Véicules</a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-calendar-days"></i>Réservation</a>
        </li>
      </ul>
    </div>