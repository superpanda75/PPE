<div class="wrapper row2" xmlns="http://www.w3.org/1999/html">
    <div class="content">
        <div class="group demo_grid">
            <div class="one_quarter first"></div>
            <div class="one_third">
                <h1>Formation : <?php echo $formation->getTitre(); ?></h1>
                <ul>
                    <li>Type de formation : <?php echo $type[0]['type'] ?></li>
                    <li>Contenu de la formation :<?php echo $formation->getContenu(); ?></li>
                    <li>Date et dur?e de la formation : <?php
                        setlocale (LC_TIME, 'fr_FR.utf8','fra');
                        echo strftime("%A %d %B %Y",strtotime($formation->getDateDebut()))."<li>Dur?e de la formation : ". $formation->getDuree()." jours </li>"; ?></li>
                    <li>Nombre de places : <?php echo $formation->getNbPlace(); ?></li>
                    <li>Cout de la formation : <?php echo $formation->getCout(); ?></li>
                    <li>Prestataire : <?php echo $prestataire[0]['nom']; ?></li>
                    <li>Lieu de la formation : <?php echo $adressString?> </li>
                </ul>
                <h1>Effectuer une modification :</h1>

                    <input id="edit" class="btn inverse edit" type="submit" value="Modifier la formation">

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
            <h2>Modification de la formation :  <?php echo $formation->getTitre(); ?> </h2>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=BASE_URL?>/editFormController" enctype="multipart/form-data">
                <ul>
                    <li style="display: none">
                        <input type="number" name="id" value="<?php echo $formation->getId(); ?>">

                    </li>
                    <li>
                        <label for="titre">titre de la formation :</label>
                        <input class="btn" type="text" name="titre" id="titre" value="<?php echo $formation->getTitre(); ?>" placeholder="<?php echo $formation->getTitre(); ?>">
                    </li>
                    <li>
                        <label for="cout">cout de la formation :</label>
                        <input class="btn" type="number" name="cout" id="cout" value="<?php echo $formation->getCout(); ?>" placeholder="<?php echo $formation->getCout(); ?>">
                    </li>
                    <li>
                        <label for="date">date de la formation :</label>
                        <input class="btn" type="text" name="date" id="date" value="<?php echo $formation->getDateDebut(); ?>" placeholder="<?php echo $formation->getDateDebut(); ?>">
                        <p>(au format jj-mm-aaaa hh:min)</p>
                    </li>
                    <li>
                        <label for="duree">durée de la formation :</label>
                        <input class="btn" type="number" name="duree" id="duree" value="<?php echo $formation->getDuree(); ?>" placeholder="<?php echo $formation->getDuree(); ?>">
                    </li>
                    <li>
                        <label for="place">places pour de la formation :</label>
                        <input class="btn" type="number" name="place" id="place" value="<?php echo $formation->getNbPlace(); ?>" placeholder="<?php echo $formation->getNbPlace(); ?>">
                    </li>
                    <li>
                        <label for="type">type de la formation :</label>
                        <select  class="btn" name="type" id="type" required>
                            <option selected disabled>type de formation :</option>
                            <?php foreach($formationTypes as $index){
                                echo "<option value='".$index['id_t']."'>".$index['type']."</option>";
                            } ?>
                        </select>
                        <p>Type initial : <?php echo $type[0]['type'] ?></p>
                    </li>
                    <li>
                        <label for="contenu">contenu de la formation :</label>
                        <textarea class="ins_cont" name="contenu" id="contenu" cols="40" rows="10" required><?php echo $formation->getContenu(); ?></textarea>
                    </li>
                    <li>
                        <label for="fileToUpload">Image principale de la formation : </label>
                    <input type="file" name="fileToUpload" id="fileToUpload">

                    </li>
                    <li>
                        <label for="presta">prestataire de la formation :</label>
                        <select  class="btn" name="presta" id="presta" required>
                            <option selected disabled>prestataire de la formation :</option>
                            <?php foreach($presta as $index){
                                echo "<option value='".$index['id_p']."'>".$index['nom']."</option>";
                            } ?>
                        </select>
                        <p>Prestataire initiale : <?php echo $prestataire[0]['nom'] ?></p>
                    </li>
                    <br>
                    <hr>
                    <h1 id="<?php echo $adresse[0]['id_a']  ?>">adresse de la formation :</h1>
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
                        <label for="adresse_cp">code postal :</label>
                        <input class="btn" type="number" name="adresse_cp" id="adresse_cp" value="<?php echo $adresse[0]['code_postal']; ?>" placeholder="<?php echo $adresse[0]['code_postal']; ?>">
                    </li>
                </ul>
                <br>
                <hr>
                <div class="center">
                    <p class="center">ATTENTION ! Les nouvelles informations effaceront définitevement les informations initiales de la formation.</p>
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
    <script src="<?=BASE_URL?>/View/js/deleteFormations.js"></script>
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
            url: '<?= BASE_URL ?>/editFormController',
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