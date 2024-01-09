<div class="py-2">
    <h1 class="text-center pt-5">Liste des catégories</h1>
    <div class="d-flex justify-content-end">
        <a href="/controllers/dashboard/categories/add-ctrl.php"><button type="submit" class="btn btn-dark text-white my-4" value="Envoyer">Ajouter une catégorie</button></a>
    </div>
    <!-- LISTE DES CATEGORIES -->
    <div class="d-flex justify-content-end gap-5">
        <table class="table">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom de catégorie</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>

            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td scope="row"><?= $category->id_category ?></td>
                    <td><?= $category->name ?></td>
                    <td><a class="text-dark" href="/controllers/dashboard/categories/update-ctrl.php?id_category=<?= $category->id_category ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><i class="fa-solid fa-trash-can"></i></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>