<!-- GRANDE TITRE -->
<h1 class="text-center">Détail du véhicule</h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-center">
            <img class="img-fluid" src="/public/uploads/vehicles/<?= $theVehicle->picture ?>" alt="Image d'un véhicule">
        </div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <h4 class="pb-3"><span class="fst-italic text-warning">Catégorie :</span> <?= $theVehicle->name ?></h4>
            <h4 class="pb-3"><?= $theVehicle->brand ?> <?= $theVehicle->model ?></h4>
            <h5 class="pb-3">Immatriculation: <?= $theVehicle->registration ?></h5>
            <h5 class="pb-3">Kilométrage: <?= $theVehicle->mileage ?></h5>
            <div class="pb-5">
                <button class="btn btn-dark text-white" type="submit">Réserver</button>
            </div>
        </div>
    </div>
</div>