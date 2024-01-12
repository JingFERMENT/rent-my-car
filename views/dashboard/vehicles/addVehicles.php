<div class="py-2 d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center pt-5 pb-3">Ajouter un véhicule</h1>
    <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
    <form class="col-12 col-lg-6" method="POST" enctype='multipart/form-data' novalidate>
        <div class="d-flex flex-wrap">
            <!-- categorie -->
            <div class="col-12 mb-3 p-2">
                <label for="id_category" class="form-label fw-bold">Catégorie</label>
                <select name="id_category" class="form-select" aria-label="Default select example">
                    <option disabled>Sélectionnez votre catégorie</option>
                    <?php foreach ($categories as $category) {
                         $isSelected = ($id_category == $category->id_category) ? 'selected' : ''; 
                         echo "<option value=\"$category->id_category\" $isSelected>$category->name</option>";
                     } ?>
                </select>
                <span class="text-danger"><?= $errors['name'] ?? '' ?></span>
            </div>
            <!-- marque -->
            <div class="col-12 col-lg-6 mb-3 p-2">
                <label for="brand" class="form-label fw-bold">Marque</label>
                <input type="text" name="brand" value="<?=$brand ?? ''?>" class="form-control" id="brand" aria-describedby="brandHelp" placeholder="Citroën" minlength="2" maxlength="50" pattern="<?=REGEX_BRAND ?>" required>
                <span class="text-danger"><?= $errors['brand'] ?? '' ?></span>
            </div>
            <!-- modèle -->
            <div class="col-12 col-lg-6 mb-3 p-2">
                <label for="model" class="form-label fw-bold">Modèle</label>
                <input type="text" name="model" value="" class="form-control" id="brand" aria-describedby="modelHelp" placeholder="C3" minlength="2" maxlength="50" pattern="<?=REGEX_MODEL?>" required>
                <span class="text-danger"><?= $errors['model'] ?? '' ?></span>
            </div>
            <!-- registration -->
            <div class="col-12 col-lg-6 mb-3 p-2">
                <label for="registration" class="form-label fw-bold">Numéro d'immatriculation</label>
                <input type="text" name="registration" value="" class="form-control" id="registration" aria-describedby="registrationHelp" placeholder="exemple : AA-229-AA" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_CATEGORY ?>" required>
                <span class="text-danger"><?= $errors['registration'] ?? '' ?></span>
            </div>
            <!-- mileage-->
            <div class="col-12 col-lg-6 mb-3 p-2">
                <label for="mileage" class="form-label fw-bold">Kilométrage</label>
                <input type="text" name="mileage" value="" class="form-control" id="mileage" placeholder="1234 kilomètres" minlength="2" maxlength="50" pattern="<?= REGEX_MILEAGE ?>">
                <span class="text-danger"><?= $errors['mileage'] ?? '' ?></span>
            </div>
            <!-- photo-->
            <div class="col-12 mb-3 p-2">
                <label for="photo" class="form-label fw-bold">Photo de véhicule</label>
                <input type="file" name="photo" value="<??>" class="form-control" id="photo" accept=".png, image/jpeg">
                <span class="text-danger"><?= $errors['photo'] ?? '' ?></span>
            </div>
            <!-- bouton -->
            <div class="col-12 mb-3 p-2 text-center">
                <button type="submit" class="btn btn-dark text-white" value="Ajouter">Valider</button>
            </div>
        </div>
        <!-- BOUTON VALIDATION -->

    </form>
</div>