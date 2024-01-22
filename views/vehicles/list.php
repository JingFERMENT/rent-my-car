<h1 class="text-center mb-5">Toutes les véhicles disponibles</h1>

<div class="row d-flex justify-content-center">
    <!-- Une carte  -->

    <?php foreach ($vehicles as $vehicle) { ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 m-auto">
                <div class="h-50">
                    <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="h-100 card-img-top img-fluid" alt="...">
                </div>
                <div class="card-img-overlay p-0 text-end">
                    <span class="badge text-bg-warning rounded-0"><?= $vehicle->name ?></span>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $vehicle->brand ?></h5>
                    <p class="card-text fst-italic"><?= $vehicle->model ?></p>
                    <a href="#" class="btn btn-dark">Réserver</a>
                </div>

            </div>
        </div>
    <?php } ?>


    <div class="center">
        <div class="pagination"> 
            <!-- page précédente -->
            <a href="/controllers/vehicles_list_ctrl.php?page=<?= $previousPage ?>">&laquo;</a>
            <!-- détail des pages -->
            <?php
            for ($counter = 1; $counter <= $nbOfPages; $counter++) { ?>
                <a href="/controllers/vehicles_list_ctrl.php?page=<?= $counter ?>"><?= $counter ?></a>
            <?php } ?>
            <!-- page suivante -->
            <a href="/controllers/vehicles_list_ctrl.php?page=<?= $nextPage ?>">&raquo;</a>
        </div>
    </div>