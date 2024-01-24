<!-- GRANDE TITRE -->
<h1 class="text-center">Listes véhicles disponibles</h1>

<!-- FILTRER PAR CATEGORIE  -->
<form class="d-flex justify-content-start my-5">
    <select name="id_category" class="form-select" aria-label="Default select example">
        <option selected disabled>Par catégorie</option>
        <?php foreach ($categories as $category) {
            $isSelected = ($id_category == $category->id_category) ? "selected" : '';
            echo "<option value=\"$category->id_category\" $isSelected >$category->name</option>";
        } ?>
    </select>
    <div class="px-2">
        <button type="submit" class="btn btn-dark text-white" value="Ajouter">Filtrer</button>
    </div>
</form>

<!-- FONCTION RECHERCHE  -->
<form class="d-flex justify-content-start my-5">
    <select name="id_category" class="form-select" aria-label="Default select example">
        <option selected disabled>Par catégorie</option>
    </select>
    <div class="px-2">
        <button type="submit" class="btn btn-dark text-white" value="Ajouter">rE</button>
    </div>
</form>

<div class="row d-flex justify-content-center">
    <!-- Une carte  -->
    <?php foreach ($vehicles as $vehicle) { ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 m-auto">
                <div class="h-50">
                    <?php if (!is_null($vehicle->picture)) {
                        echo "<img src=\"/public/uploads/vehicles/$vehicle->picture\" class=\"h-100 card-img-top img-fluid\" alt=\"\$vehicle->brand - $vehicle->model\">";
                    } else {
                        echo 'image par défaut';
                    } ?>

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
            <a href="?page=<?=$previousPage?>&id_category=<?=$id_category?>">&laquo;</a>
            <!-- détail des pages -->
            <?php
            for ($counter = 1; $counter <= $nbOfPages; $counter++) {
                if($counter == $page) {
                    echo "<a class=\"active\" href=\"?page=$counter&id_category=$id_category\">$counter</a>";
                } else {
                    echo "<a href=\"?page=$counter&id_category=$id_category\">$counter</a>";
                }
               
            } ?>
            <!-- page suivante -->
            <a href="?page=<?=$nextPage?>&id_category=<?=$id_category?>">&raquo;</a>
        </div>
    </div>

<?php include __DIR__ . '/card.php';
