<div class="py-2 text-center">
    <h1 class="pt-5">Liste des catégories</h1>
    <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
    <div class="d-flex justify-content-end">
        <a href="/controllers/dashboard/categories/add-ctrl.php"><button type="submit" class="btn btn-dark text-white my-4" value="Envoyer">Ajouter une catégorie</button></a>
    </div>
    <!-- LISTE DES CATEGORIES -->
    <div class="d-flex justify-content-end gap-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom de catégorie</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <th scope="row" class="fst-italic"><?= $category->id_category ?></th>
                        <td><?= $category->name ?></td>
                        <td><a class="text-dark" href="/controllers/dashboard/categories/update-ctrl.php?id_category=<?= $category->id_category ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a data-category="<?= $category->id_category ?>" class="text-dark deleteBtn"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>