<div class="card border-2 text-center py-2 d-flex flex-column justify-content-center align-items-center">
    <div class="p-5">
        <h1 class="text-center">Modifier une catégorie</h1>
        <span class="text-danger fw-bold"><?= $errors['name'] ?? '' ?></span>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <form method="POST">
            <!-- MODIFICATION CATEGORIE -->
            <div>
                <label for="name" class="form-label fw-bold">Nom de la catégorie</label>
                <input type="text" name="name" id="name" value="<?= $category->name?>" class="form-control" aria-describedby="nameHelp" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_CATEGORY ?>" required>
            </div>
            <!-- BOUTON VALIDATION -->
            <button type="submit" class="btn text-white my-4" value="Envoyer">Modifier</button>
        </form>
    </div>
</div>