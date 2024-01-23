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
                        <?php if ($archived==false) { ?>
                            <th scope="col">Modifier</th>
                            <th scope="col">Archiver</th>
                        <?php } else { ?>
                            <th scope="col">Déarchiver</th>
                            <th scope="col">Supprimer</th>
                        <?php } ?>
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
                            <?php if ($archived==false) { ?>
                            <td>
                                <a class="text-dark" href="/controllers/dashboard/vehicles/updateVehicles-ctrl.php?id_vehicle=<?= $vehicle->id_vehicle ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <!-- Button trigger modal to archive -->
                            <td><a type="button" data-id="<?= $vehicle->id_vehicle ?>" data-bs-toggle="modal" data-bs-target="#archiveModal" class="text-dark modalOpenVehicleArchiveBtn"><i class="fa-solid fa-box-archive"></i></a></td>
                            <?php } else { ?>
                            <!-- Button trigger modal to un-archive -->
                            <td><a type="button" data-id="<?= $vehicle->id_vehicle ?>" data-bs-toggle="modal" data-bs-target="#unarchiveModal" class="text-dark modalOpenVehicleUnarchiveBtn"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <!-- Button trigger modal to trully delete -->
                            <td><a type="button" data-id="<?= $vehicle->id_vehicle ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-dark modalOpenVehicleDeleteBtn"><i class="fa-solid fa-box-archive"></i></a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals -->
<!-- Archive modal -->
<div class="modal fade" id="archiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Archiver un véhicule</h1>
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
<!-- Un-archive modal -->
<div class="modal fade" id="unarchiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Réactiver un véhicule</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Pouvez-vous confirmer votre choix ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger unarchiveVehicleBtn" data-bs-dismiss="modal">Oui</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark">Non</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
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
                <button type="button" class="btn btn-danger deleteVehicleBtn" data-bs-dismiss="modal">Oui</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark">Non</button>
            </div>
        </div>
    </div>
</div>