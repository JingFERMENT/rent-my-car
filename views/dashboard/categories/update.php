<div class="py-2 d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center p-5">Modification catégorie</h1>
    <span class="text-danger fw-bold"><?= $errors['name'] ?? '' ?></span>
    <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
    <form class="col-12 col-lg-6" method="POST" novalidate>
        <!-- MODIFICATION CATEGORIE -->
        <div>
            <label for="name" class="form-label fw-bold">Nom de la catégorie</label>
            <input type="text" name="name" value="<?= $category->name ?>" class="form-control" id="name" aria-describedby="nameHelp" minlength="2" maxlength="50" pattern="<?= REGEX_NAME_CATEGORY ?>" required>
        </div>
        <!-- BOUTON VALIDATION -->
        <button type="submit" class="btn btn-dark text-white my-4" value="Envoyer">Modifier</button>
    </form>
</div>