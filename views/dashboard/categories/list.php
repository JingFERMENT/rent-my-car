<section class="container">

    <div class="row">
        <div class="py-5 ">
            <h1 class="text-center pt-5">Liste des catégories</h1>
            <div class="d-flex justify-content-end">
                <a href="http://rent-my-car.localhost/controllers/dashboard/categories/add-ctrl.php"><button type="submit" class="btn btn-dark text-white my-4" value="Envoyer">Ajouter une catégorie</button></a>
            </div>
            <!-- LISTE DES CATEGORIES -->
            <div class="d-flex justify-content-center gap-5">
                <table>
                    <tr>
                        <th>Catégorie ID</th>
                        <th>Nom de catégorie</th>
                    </tr>

                    <?php forEach($displayResult as $key => $value) { ?>
                    <tr>
                        <td><?=$value['id_category']?></td>
                        <td><?=$value['name']?></td>
                    </tr>
               <?php }?>
                </table>
            </div>
        </div>
    </div>
</section>