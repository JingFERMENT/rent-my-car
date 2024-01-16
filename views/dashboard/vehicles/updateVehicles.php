<div class="card border-2">
    <div class="py-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center pt-5 pb-3">Modifier un véhicule</h1>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <form class="col-12 col-lg-6" method="POST" enctype='multipart/form-data' novalidate>
            <div class="d-flex flex-wrap">
                <!-- categorie -->
                <div class="col-12 p-2">
                    <label for="id_category" class="form-label fw-bold">Catégorie de véhicule<span class="text-danger">
                            *<span></label>
                    <select name="id_category" class="form-select" aria-label="Default select example">
                        <option selected disabled>--Sélectionnez votre catégorie--</option>
                        <?php foreach ($vehicles as $vehicle) {
                            $isSelected = ($vehicle->id_category == $theVehicle->id_category) ? "selected" : '';
                            echo "<option value=\"$vehicle->id_category\" $isSelected>$vehicle->name</option>";
                        } ?>
                    </select>
                    <span class="text-danger"><?= $errors['name'] ?? '' ?></span>
                </div>
                <!-- marque -->
                <div class="col-12 col-lg-6 p-2">
                    <label for="brand" class="form-label fw-bold">Marque<span class="text-danger">
                            *<span></label>
                    <input type="text" name="brand" value="<?= $theVehicle->brand ?? '' ?>" class="form-control" id="brand" aria-describedby="brandHelp" placeholder="Citroën" minlength="2" maxlength="50" pattern="<?= REGEX_BRAND ?>" required>
                    <span class="text-danger"><?= $errors['brand'] ?? '' ?></span>
                </div>
                <!-- modèle -->
                <div class="col-12 col-lg-6 p-2">
                    <label for="model" class="form-label fw-bold">Modèle<span class="text-danger">
                            *<span></label>
                    <input type="text" name="model" value="<?= $theVehicle->model ?? '' ?>" class="form-control" id="model" aria-describedby="modelHelp" placeholder="C3" minlength="2" maxlength="50" pattern="<?= REGEX_MODEL ?>" required>
                    <span class="text-danger"><?= $errors['model'] ?? '' ?></span>
                </div>
                <!-- registration -->
                <div class="col-12 col-lg-6 p-2">
                    <label for="registration" class="form-label fw-bold">Plaques d'immatriculation<span class="text-danger">
                            *<span></label>
                    <input type="text" name="registration" value="<?= $theVehicle->registration ?? '' ?>" class="form-control" id="registration" aria-describedby="registrationHelp" placeholder="AA-229-AA" minlength="2" maxlength="50" pattern="<?= REGEX_REGISTRATION ?>" required>
                    <span class="text-danger"><?= $errors['registration'] ?? '' ?></span>
                </div>
                <!-- mileage-->
                <div class="col-12 col-lg-6 p-2">
                    <label for="mileage" class="form-label fw-bold">Kilométrage<span class="text-danger">
                            *<span></label>
                    <input type="int" name="mileage" value="<?= $theVehicle->mileage ?? '' ?>" class="form-control" id="mileage" placeholder="1234" minlength="2" maxlength="50" pattern="<?= REGEX_MILEAGE ?>">
                    <span class="text-danger"><?= $errors['mileage'] ?? '' ?></span>
                </div>
                <!-- photo-->
                <div class="col-12 p-2">
                    <label for="picture" class="form-label fw-bold">Photo de véhicule</label>
                    <input type="file" name="picture" value="<? $theVehicle->picture ?>" class="form-control" id="picture" accept=".png, image/jpeg">
                    <span class="text-danger"><?= $errors['picture'] ?? '' ?></span>
                    <?php

                    if ($theVehicle->picture !== NULL) {
                        echo "<img class=\"img-fluid m-auto mt-3\" src=\"/public/uploads/vehicles/$theVehicle->picture\">";
                    }
                    ?>

                </div>
                <!-- bouton -->
                <div class="col-12 p-2 text-center">
                    <button type="submit" class="btn btn-dark text-white" value="Ajouter">Valider</button>
                </div>
                <small class="text-danger fw-lighter fst-italic"><span class="text-danger">*</span> champs obligatoires</small>
            </div>
            <!-- BOUTON VALIDATION -->
        </form>
    </div>
</div>