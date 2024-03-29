<div class="card border-2 text-center py-2 d-flex flex-column justify-content-center align-items-center">
    <div class="p-5">
        <h1 class="text-center">Ajouter une catégorie</h1>
        <span class="text-danger fw-bold"><?= $errors['name'] ?? '' ?></span>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <form method="POST">
            <!-- AJOUT CATEGORIE -->
            <div>
                <label for="name" class="form-label fw-bold">Nom de la catégorie</label>
                <input type="text" name="name" value="<?= $name ?? '' ?>" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Ex: une soucoupe volante" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_CATEGORY ?>" required>
            </div>
            <!-- BOUTON VALIDATION -->
            <button type="submit" class="btn btn-dark text-white my-4" value="Ajouter">Ajouter</button>
        </form>
    </div>
</div>