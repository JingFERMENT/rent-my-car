<!----------------------FORM ---------------------->
<h1 class="text-center" id="form-title">Formulaire de réservation</h1>
<div class="py-5">
    <form class="row" method="POST" novalidate>
        <!-- LASTNAME -->
        <div class="col-12 col-lg-4 p-2">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" name="lastname" value="<?= $lastname ?? '' ?>" class="form-control" id="lastname" aria-describedby="lastnameHelp" placeholder="Dupont" minlength="2" maxlength="50" pattern="<?= REGEX_NAME ?>" autocomplete="family-name" ; required>
            <span class="text-danger"><?= $errors['lastname'] ?? '' ?></span>
        </div>
        <!-- FIRSTNAME -->
        <div class="col-12 col-lg-4 p-2">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" name="firstname" value="<?= $firstname ?? '' ?>" class="form-control" id="firstname" aria-describedby="firstnameHelp" placeholder="Jean" minlength="2" maxlength="50" pattern="<?= REGEX_NAME ?>" autocomplete="family-name" ; required>
            <span class="text-danger"><?= $errors['firstname'] ?? '' ?></span>
        </div>
        <!-- EMAIL -->
        <div class="col-12 col-lg-4 p-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email@email.com" value="<?=$email ?? ''?>" required>
            <!-- si la variable existe -->
            <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
        </div>
        <!-- BIRTHDAY-->
        <div class="col-12 col-lg-4 p-2">
            <label for="birthday" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthday" name="birthday" min="<?= $minDate ?>" max="<?= $maxDate ?>" value="<?= $birthday ?? '' ?>" pattern="<?= REGEX_DATE ?>" aria-describedby="birthdayHelp" required>
            <span class="text-danger"><?= $errors['birthday'] ?? '' ?></span>
        </div>
        <!-- PHONE -->
        <div class="col-12 col-lg-4 p-2">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="06 12 34 56 78" pattern="<?= REGEX_PHONE?>" value ="<?=$phone ?? ''?>">
            <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
        </div>
        <!-- CITY -->
        <div class="col-12 col-lg-4 p-2">
            <label for="city" class="form-label">Ville</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Amiens" pattern="<?= REGEX_CITY?>" value="<?=$city ?? ''?>">
            <span class="text-danger"><?= $errors['city'] ?? '' ?></span>
        </div>
        <!-- ZIPCODE -->
        <div class="col-12 col-lg-4 p-2">
            <label for="zipcode" class="form-label">Code postal</label>
            <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="80000" pattern="<?=REGEX_ZIPCODE?>" autocomplete="postal-code" value="<?=$zipcode ?? ''?>">
            <span class="text-danger"><?= $errors['zipcode'] ?? '' ?></span>
        </div>

        <!-- RESERVATION DATE DE DEBUT -->
        <div class="col-12 col-lg-4 p-2">
            <label for="startdate" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="startdate" name="startdate" min="<?=$currentdate?>" value="<?=$startdate ?? ''?>" pattern="<?=REGEX_DATE?>" aria-describedby="startdateHelp">
            <span class="text-danger"><?= $errors['startdate'] ?? '' ?></span>
        </div>
        <!-- RESERVATION DATE DE FIN-->
        <div class="col-12 col-lg-4 p-2">
            <label for="enddate" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="enddate" name="enddate" min="<?=$currentdate?>" value="<?=$enddate ?? ''?>" pattern="<?=REGEX_DATE?>" aria-describedby="enddateHelp">
            <span class="text-danger"><?= $errors['enddate'] ?? '' ?></span>
        </div>
        <!-- BOUTON VALIDATION -->
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-primary text-white text-uppercase" value="Envoyer">Valider</button>
        </div>
    </form>
</div>