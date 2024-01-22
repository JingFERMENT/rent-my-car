<div class="card border-2 text-center">
    <div class="p-5">
        <h1>Liste des véhicules <?= ($archived==true)  ? 'archivés': '' ?></h1>
        <span class="text-success fw-bold"><?= $msg ?? '' ?></span>
        <span class="text-danger fw-bold"><?= $error ?? '' ?></span>
        <div class="d-flex justify-content-end">
            <?php if($archived == false) {
                echo '<a href="/controllers/dashboard/vehicles/addVehicles-ctrl.php" class="btn btn-dark text-white m-4"> Ajouter un véhicule</a>';
                echo '<a href="/controllers/dashboard/vehicles/archiveVehicles-ctrl.php" class="btn btn-dark text-white m-4">Liste des véhicules archivés</a>';
            } else {
                echo '<a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php" class="btn btn-dark text-white m-4">Liste des véhicules</a>';       
            } ?>
                 
        </div>
        <!-- LISTE DES VEHICULES -->
        <div class="d-flex justify-content-end gap-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php if ($sortByAsc) { ?>
                            <th scope="col"><a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php?sort=false">Catégorie</a></th>
                        <?php ;} else { ?>
                            <th scope="col"><a href="/controllers/dashboard/vehicles/listVehicles-ctrl.php?sort=true">Catégorie</a></th>
                        <?php ;} ?>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Image</th>
                        <!-- <th scope="col">Créé le</th> -->
                        <th scope="col"><?= ($archived==true)  ? 'Déarchiver': 'Modifier' ?></th>
                        <th scope="col"><?= ($archived==true)  ? 'Supprimer': 'Archiver' ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($vehicles as $vehicle) { ?>

                        <tr>
                            <th scope="row" class="fw-normal"><?= $vehicle->name ?></th>
                            <td><?= $vehicle->brand ?></td>
                            <td><?= $vehicle->model ?></td>
                            <td>
                                <?php
                                if ($vehicle->picture !== NULL) { ?>
                                    <img class="img-fluid vehcilePicture" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" />
                                <?php }
                                ?>
                            </td>
                            <!-- <td><?= (new DateTime($vehicle->created_at))->format('d-m-Y') ?></td> -->
                            <td>
                                <a class="text-dark" href="/controllers/dashboard/vehicles/updateVehicles-ctrl.php?id_vehicle=<?= $vehicle->id_vehicle ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <!-- Button trigger modal -->
                            <td><a type="button" data-id="<?= $vehicle->id_vehicle ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-dark modalOpenVehicleBtn"><i class="fa-solid fa-box-archive"></i></a></td>
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
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Supprimer un véhicule</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Pouvez-vous confirmer votre choix ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger archiveVehicleBtn" data-bs-dismiss="modal">Oui</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark">Non</button>
            </div>
        </div>
    </div>
</div>