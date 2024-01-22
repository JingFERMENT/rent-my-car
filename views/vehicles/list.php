<div class="row d-flex justify-content-center">
    <!-- Une carte  -->

    <?php foreach ($vehicles as $vehicle) { ?>
        <div class="col-12 col-md-6 col-lg-3 mb-4">
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

    <div class="pagination d-flex justify-content-center align-items-center">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&raquo;</a>
    </div>

</div>