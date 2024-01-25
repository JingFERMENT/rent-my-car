<!----------------------FORM ---------------------->
                <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                    <h1 class="text-center" id="form-title">Formulaire de réservation</h1>
                    <form class="row" method="POST" enctype='multipart/form-data' novalidate>
                        <!-- LASTNAME -->
                        <div class="col-12 col-lg-4 p-2">
                            <label for="lastname" class="form-label">Nom<span>*</span></label>
                            <input type="text" name="lastname" value="<?= $lastname ?? '' ?>" class="form-control" id="lastname" aria-describedby="lastnameHelp" placeholder="ex: Jean Dupont" minlength="2" maxlength="50" pattern="<?= REGEX_LASTNAME ?>" autocomplete="family-name" ; required>
                            <span class="text-danger"><?= $error['lastname'] ?? '' ?></span>
                        </div>
                        <!-- BIRTHDAY-->
                        <div class="col-12 col-lg-4 p-2">
                            <label for="birthday" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" min="<?= $minDate ?>" max="<?= $maxDate ?>" value="<?= $birthday ?? '' ?>" pattern="<?= REGEX_BIRTHDAY ?>" aria-describedby="birthdayHelp">
                            <span class="text-danger"><?= $error['birthday'] ?? '' ?></span>
                        </div>
                        <!-- COUNTRY -->
                        <div class="col-12 col-lg-4 p-2">
                            <label for="country" class="form-label">Pays de naissance</label>
                            <select name="country" class="form-select" aria-label="Default select example">
                                <option selected disabled>--Sélectionnez votre pays--</option>
                                <!-- dynamique display PHP for COUNTRY -->
                                <?php
                                foreach (ARRAY_COUNTRY as $countryName) {
                                    $isSelected = ($country && $country == $countryName) ? 'selected' : '';
                                    echo "<option value=\"$countryName\" $isSelected >$countryName</option>";
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?= $error['country'] ?? '' ?></span>
                        </div>
                        <!-- ZIPCODE -->
                        <div class="col-12 col-lg-4 p-2">
                            <label for="zipcode" class="form-label">Code postal</label>
                            <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="80000" pattern="<?= REGEX_ZIPCODE ?>" autocomplete="postal-code" inputmode="numeric" value="<?= $zipcode ?? '' ?>">
                            <span class="text-danger"><?= $error['zipcode'] ?? '' ?></span>
                        </div>
                        <!-- EMAIL -->
                        <div class="col-12 col-lg-4 p-2">
                            <label for="email" class="form-label">Email<span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email@email.com" value="<?= $email ?? '' ?>" required>
                            <!-- si la variable existe -->
                            <span class="text-danger"><?= $error['email'] ?? '' ?></span>
                        </div>
                        <!-- PASSWORD -->
                        <div class="col-12 col-lg-6 p-2">
                            <label for="password" class="form-label">Mot de passe<span>*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>" required>
                            <span class="text-danger"><?= $error['password'] ?? '' ?></span>
                        </div>
                        <!-- PASSWORD CONFIRMATION -->
                        <div class="col-12 col-lg-6 p-2">
                            <label for="confirmedPassword" class="form-label">Confirmation du mot de passe<span>*</span></label>
                            <input type="password" class="form-control" id="confirmedPassword" value="<?= $confirmedPassword ?? '' ?>" name="confirmedPassword" pattern="<?= REGEX_PASSWORD ?>" required>
                            <span class="text-danger"><?= $error['password'] ?? '' ?></span>
                        </div>
                        <!-- FILE PHOTO-->
                        <div class="col-12 col-lg-6 p-2">
                            <label for="photo" class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" id="photo" name="photo" value="<?= $filename . '.' . $extension ?? '' ?>" accept=".png, image/jpeg">
                            <span class="text-danger"><?= $error['photo'] ?? '' ?></span>
                            <div class="valid-message text-success"><?= $photoUploadHelpMessage ?? '' ?></div>
                        </div>
                        <!-- URL -->
                        <div class="col-12 col-lg-6 p-2">
                            <label for="url" class="form-label">Url compte LinkedIn</label>
                            <input type="url" name="url" value="<?= $url ?? '' ?>" class="form-control" id="url" placeholder="ex: https://www.linkedin.com/in/..." pattern="<? REGEX_URL ?>">
                            <span class="text-danger"><?= $error['url'] ?? '' ?></span>
                        </div>
                        <!-- LANGUAGES -->
                        <label>Connaissance des langages web <small class="small-text">(plusieurs réponses possibles)</small></label>
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-start">
                                <!-- dynamique display PHP for COUNTRY -->
                                <?php
                                foreach (ARRAY_LANGUAGE as $language) {
                                    $isChecked = (isset($selectedLanguages) && in_array($language, $selectedLanguages)) ? 'checked' : '';
                                    echo
                                    "<div class=\"form-check m-3\">
                                            <input class=\"form-check-input\" type=\"checkbox\" name=\"selectedLanguages[]\" value=\"$language\" id=\"$language\" $isChecked>
                                            <label class=\"form-check-label\" for=\"$language\">$language</label>
                                        </div>";
                                }
                                ?>
                            </div>
                            <span class="text-danger"><?= $error['selectedLanguage'] ?? '' ?></span>
                        </div>
                        <!-- EXPERIENCE -->
                        <div class="col-12 mb-2">
                            <label class="form-label" for="experience">Racontez une expérience avec la programmation et/ou l'informatique que vous auriez pu avoir.<small class="small-text">(120 mots maximum)</small></label>
                            <textarea class="form-control" id="experience" rows="5" maxlength="1000" name="experience" placeholder="Préciser votre expérience la plus récente ..."><?= $experience ?? '' ?></textarea>
                            <span class="text-danger"><?= $error['experience'] ?? '' ?></span>
                        </div>
                        <!-- BOUTON VALIDATION -->
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary text-white text-uppercase" value="Envoyer">Envoyer</button>
                        </div>
                        <span class="text-danger"><small class="small-text justify-content-end">*Champs obligatoire</small></span>
                    </form>
                <?php } else { ?>
                    <!-- DISPLAY THE FORM DATA -->
                    <h1 class="text-center p-4" id="form-title">Récapitulatif des informations</h1>
                    <h6 class="m-3">Civilité:
                        <?php
                        if (isset($civility) && $civility == 0) {
                            echo "<span class=\"result\">Mr<span>";
                        } elseif (isset($civility) && $civility == 1) {
                            echo "<span class=\"result\">Mme<span>";
                        } else {
                            echo "<span class=\"result\">Pas renseigné<span>";
                        }
                        ?>
                    </h6>
                    <h6 class="m-3">Nom: <span class="result"><?= $lastname ?><span></h6>
                    <h6 class="m-3">Date de naissace: <span class="result">
                            <?php if (empty($birthday)) {
                                echo "Pas renseigné";
                            } else {
                                echo $birthday;
                            } ?></span></h6>
                    <h6 class="m-3">Pays de naissance: <span class="result"><?= $country ?? 'Pas renseigné' ?></span></h6>
                    <h6 class="m-3">Code postale: <span class="result"><?= (!empty($zipcode)) ? $zipcode : 'Pas renseigné' ?></span></h6>
                    <h6 class="m-3">Email: <span class="result"><?= $email ?></span></h6>
                    <h6 class="m-3">Url compte LinkedIn: <span class="result"><?= !empty($url) ? $url : 'Pas renseigné' ?></span></h6>
                    <h6 class="m-3">Expérience personelle: <span class="result"><?= (!empty($experience)) ? $experience : 'Pas renseigné' ?></span></h6>
                    <h6 class="m-3">Photo de profil: <img class="img-fluid" src="<?= $toFront ?? '' ?>"></h6>
                <?php } ?>