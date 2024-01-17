<div class="card border-2 text-center">
    <div class="p-5">
        <h1>Liste des catégories</h1>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <span class="text-danger fw-bold"><?= $error ?? '' ?></span>
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
                    <?php

                    foreach ($categories as $category) { ?>
                        <tr>
                            <th scope="row" class="fst-italic fw-normal"><?= $category->id_category ?></th>
                            <td><?= $category->name ?></td>
                            <td><a class="text-dark" href="/controllers/dashboard/categories/update-ctrl.php?id_category=<?= $category->id_category ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <!-- Button trigger modal -->
                            <td><a type="button" data-category="<?= $category->id_category ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-dark modalOpenBtn"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Supprimer une catégorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Confirmez-vous de cette suppression de catégorie?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger deleteBtn" data-bs-dismiss="modal">Oui</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark noDeleteBtn">Non</button>
            </div>
        </div>
    </div>
</div>