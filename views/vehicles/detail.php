<!-- GRANDE TITRE -->
<h1 class="text-center">Détail du véhicule</h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-center">
            <img class="img-fluid" src="/public/uploads/vehicles/<?= $theVehicle->picture ?>" alt="Image d'un véhicule">
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <div class="m-5">
                <h3 class="pb-3"><span class="fst-italic text-warning">Catégorie :</span> <?= $theVehicle->name ?></h3>
                <h3 class="pb-3"><?= $theVehicle->brand ?> <?= $theVehicle->model ?></h3>
                <h5 class="pb-3">Plaque d'immatriculation: <?= $theVehicle->registration ?></h5>
                <h5 class="pb-5">Kilométrage: <?= $theVehicle->mileage ?></h5>
            </div>
        </div>
    </div>
</div>