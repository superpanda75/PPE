<div class="wrapper row2" xmlns="http://www.w3.org/1999/html">
    <div class="content">
        <div class="group demo_grid">
            <div class="one_quarter first"></div>
            <div class="one_third">
                <h1>Salarié : <?php echo $salarie->getNom()." ".$salarie->getPrenom(); ?></h1>
                <ul>
                    <li>Nom : <?php echo $salarie->getNom() ?></li>
                    <li>Prenom : <?php echo $salarie->getPrenom() ?></li>
                    <li>Email :<?php echo $salarie->getEmail(); ?></li>
                    <li>Identifiant : <?php echo $salarie->getIdentifiant(); ?></li>
                    <li>Password : <?php echo $salarie->getPassword(); ?></li>
                    <li>Hauter des droits : <?php echo $salarie->getStatus(); ?></li>
                    <li>Crédits : <?php echo $salarie->getCredit(); ?></li>
                    <li>Jours de formation : <?php echo $salarie->getNbJour(); ?></li>
                    <li>Adresse : <?php echo $adressString?> </li>
                </ul>
                <h1>Effectuer une modification :</h1>

                <input id="edit" class="btn inverse edit" type="submit" value="Modifier l'utilisateur">

            </div>
            <div class = "one_half right">
                <img src="View/image_formation/grande_image.png">
            </div>

        </div>
    </div>

    <!--MODAL-->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Modification de l'utilisateur :  <?php echo $salarie->getNom()." ".$salarie->getPrenom(); ?> </h2>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=BASE_URL?>/editSalarieController" enctype="multipart/form-data">
                    <ul>
                        <li style="display: none">
                            <input type="number" name="id" value="<?php echo $salarie->getId(); ?>">

                        </li>
                        <li>
                            <label for="nom">Nom :</label>
                            <input pattern="[#^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$#iu]" class="btn" type="text" name="nom" id="nom" value="<?php echo $salarie->getNom(); ?>" placeholder="<?php echo $salarie->getNom(); ?>">
                        </li>
                        <li>
                            <label for="prenom">Prenom :</label>
                            <input pattern="^[#^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$#iu]" class="btn" type="text" name="prenom" id="prenom" value="<?php echo $salarie->getPrenom(); ?>" placeholder="<?php echo $salarie->getPrenom(); ?>">
                        </li>
                        <li>
                            <label for="mail">Email :</label>
                            <input pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})"
                                   class="btn" type="email" name="mail" id="mail" value="<?php echo $salarie->getEmail(); ?>" placeholder="<?php echo $salarie->getEmail(); ?>">
                        </li>
                        <li>
                            <label for="identifiant">Identifiant :</label>
                            <input pattern=" \^[a-zA-Z0-9_]{3,20}$\ " class="btn" type="text" name="identity" id="identity" value="<?php echo $salarie->getIdentifiant(); ?>" placeholder="<?php echo $salarie->getIdentifiant(); ?>">
                        </li>
                        <li>
                            <label for="password">Mot de passe :</label>
                            <input pattern="\^[a-zA-Z0-9_]{3,20}$\" class="btn" type="text" name="pass" id="pass" value="<?php echo $salarie->getPassword(); ?>" placeholder="<?php echo $salarie->getPassword(); ?>">
                        </li>
                        <li>
                            <label for="rights">Hauteur des droits :</label>
                            <select  class="btn" name="rights" id="rights" required>
                                <option selected disabled>droits :</option>
                                <option value='1'>1 user</option>";
                                <option value='2'>2 chef</option>";
                                <option value='3'>3 admin</option>";
                            </select>
                            <p>Hauteur initiale : <?php echo $salarie->getStatus(); ?></p>
                        </li>
                        <li>
                            <label for="credit">Crédits :</label>
                            <input pattern="[0-9]" class="btn" type="number" name="credit" id="credit" value="<?php echo $salarie->getCredit(); ?>" placeholder="<?php echo $salarie->getCredit(); ?>">
                        </li>
                        <li>
                            <label for="nbJour">Temp de formtaion :</label>
                            <input pattern="[0-9]" class="btn" type="number" name="nbJour" id="nbJour" value="<?php echo $salarie->getNbJour(); ?>" placeholder="<?php echo $salarie->getNbJour(); ?>">
                        </li>
                        <li>
                            <label for="fileToUpload">Photo : </label>
                            <input type="file" name="fileToUpload" id="fileToUpload">

                        </li>
                        <br>
                        <hr>
                        <h1 id="<?php echo $adresse[0]['id_a']  ?>">adresse du user :</h1>
                        <p>Adresse initiale : <?php echo $adressString ?></p>
                        <li>
                            <label for="adresse_ville">ville :</label>
                            <input class="btn" type="text" name="adresse_ville" id="adresse_ville" value="<?php echo $adresse[0]['ville']; ?>" placeholder="<?php echo $adresse[0]['ville']; ?>">
                        </li>
                        <li>
                            <label for="adresse_rue">rue :</label>
                            <input class="btn" type="text" name="adresse_rue" id="adresse_rue" value="<?php echo $adresse[0]['rue']; ?>" placeholder="<?php echo $adresse[0]['rue']; ?>">
                        </li>
                        <li>
                            <label for="adresse_numero">numero :</label>
                            <input class="btn" type="number" name="adresse_numero" id="adresse_numero" value="<?php echo $adresse[0]['numero_rue']; ?>" placeholder="<?php echo $adresse[0]['numero_rue']; ?>">
                        </li>
                        <li>
                            <label for="adr_cp">code postal :</label>
                            <input class="btn" type="text" name="adr_cp" id="adr_cp" value="<?php echo $adresse[0]['code_postal']; ?>" placeholder="<?php echo $adresse[0]['code_postal']; ?>">
                        </li>
                    </ul>
                    <br>
                    <hr>
                    <div class="center">
                        <p class="center">ATTENTION ! Les nouvelles informations effaceront définitevement les informations initiales de l'utilisateur.</p>
                        <button class="btn inverse center" type="submit" name="submit" value="submit">valider les modifications</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <h1 class="center"> M2L </h1>
            </div>
        </div>
    </div>
</div>
<!--MODAL -->
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="<?=BASE_URL?>/View/js/jquery-3.2.0.min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>
<script>
    $(".edit").click(function (e) {
        var modal = document.getElementById('myModal');
// Get the button that opens the modal
        var btn = document.getElementById("edit");
// Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var reponse = document.getElementsByClassName("check")[0];

// When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }
// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        reponse.onclick = function() {
            modal.style.display = "none";
        }
        reponsen.onclick = function() {
            modal.style.display = "none";
        }

// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        $reponse = ($(this).attr('id'));
        $idV = ($(this).closest('td').attr('id'));

        $.ajax({
            type: 'POST',
            url: '<?= BASE_URL ?>/editSalarieController',
            timeout: 4000,
            data: {
                idV: $idV,
                reponse : $reponse,
                charge : 'true'
            }
        }).done(function (data) {

            if ($reponse =='true') {
                document.getElementById($reponse).innerHTML = "validée";
                document.getElementById('false').style.display='none';

            }else{
                document.getElementById($reponse).innerHTML = "refusée";
                document.getElementById('true').style.display='none';
            }
        }).fail(function (error) {
            alert('une erreur est survenue lors de la modification, merci de contacter l\'assistance');
        });
    })
</script>