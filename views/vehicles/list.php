<div class="row d-flex flex-wrap gap-5 py-5">
    <!-- Une carte  -->

    <?php foreach ($vehicles as $vehicle) { ?>
        <div class="card p-0">
            <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="...">
            <div class="card-img-overlay px-0 text-end">
                <span class="badge text-bg-warning rounded-0 px-3"><?= $vehicle->name ?></span>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title"><?= $vehicle->brand ?><?= ' ' . $vehicle->model ?></h5>
                <p class="card-text"><?= $vehicle->mileage ?></p>
                <a href="#" class="btn btn-dark">Réserver</a>
            </div>

        </div>
    <?php } ?>


</div>