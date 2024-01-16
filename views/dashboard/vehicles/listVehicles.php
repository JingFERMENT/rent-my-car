<div class="card border-2 text-center">
    <div class="p-5">
        <h1 class="pt-5">Liste des véhicules</h1>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <span class="text-danger fw-bold"><?= $error ?? '' ?></span>
        <div class="d-flex justify-content-end">
            <a href="/controllers/dashboard/vehicles/addVehicles-ctrl.php"><button type="submit" class="btn btn-dark text-white my-4" value="Envoyer">Ajouter un véhicule</button></a>
        </div>
        <!-- LISTE DES CATEGORIES -->
        <div class="d-flex justify-content-end gap-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Photo</th>
                        <!-- <th scope="col">Créé le</th> -->
                        <th scope="col">Modifer</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($vehicles as $vehicle) { ?>

                        <tr >
                            <th scope="row" class="fw-normal"><?= $vehicle->name ?></th>
                            <td><?= $vehicle->brand ?></td>
                            <td><?= $vehicle->model ?></td>
                            <td>
                                <?php
                                if($vehicle->picture == NULL) {
                                
                            } else {
                                echo "<img class=\"img-fluid vehcilePicture\" src=\"/public/uploads/vehicles/$vehicle->picture\"/>";
                            }
                                ?>
                            </td>
                            <!-- <td><?= (new DateTime($vehicle->created_at))->format('d-m-Y') ?></td> -->
                            <td>
                                <a class="text-dark" href="/controllers/dashboard/vehicles/updateVehicles-ctrl.php?id_vehicle=<?= $vehicle->id_vehicle ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <!-- Button trigger modal -->
                            <td><a type="button" data-category="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-dark modalOpenBtn"><i class="fa-solid fa-trash-can"></i></a></td>
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
                Confirmez-vous de cette suppression de véhicule?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger deleteBtn" data-bs-dismiss="modal">Oui</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark noDeleteBtn">Non</button>
            </div>
        </div>
    </div>
</div>