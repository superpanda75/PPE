<div class="wrapper row2">
    <main class="hoc container clear">
        <div class="sidebar one_quarter first">
            <h6>Mon Compte</h6>
            <nav class="sdb_holder">
                <ul>
                    <li><a href="#">Mes formations</a>
                        <ul>
                            <li class="tablinks"  onclick="openCity(event, 'London')" id="defaultOpen"><a>formations en attente</a></li>
                            <li class="tablinks"  onclick="openCity(event, 'Paris')"><a>formations validées</a></li>
                            <li class="tablinks"  onclick="openCity(event, 'Tunis')"><a>formations effectuées</a></li>
                        </ul>
                    </li>
                    <?php
                    if ($_SESSION['curr_user'][0]['status'] > 1){
                        ?>
                        <li><a href="#">Gestion Chef d'équipe</a>
                            <ul>
                                <li id="validation" class="tablinks"  onclick="openCity(event, 'Dublin')"><a>Validation des formations</a></li>
                                <li><a href="<?=BASE_URL?>/myTeamController">Mon équipe</a></li>
                            </ul>
                        </li>
                    <?php }
                    if ($_SESSION['curr_user'][0]['status'] > 2){

                        ?>
                        <li><a href="#">Gestion Administrateur</a>
                            <ul>
                                <li class="tablinks"  ><a href="<?=BASE_URL?>/adminSalarieController"> Gestion des SALARIÉS ADMIN</a></li>
                                <li class="tablinks"  ><a href="<?=BASE_URL?>/adminFormController">Gestion des FROMATIONS ADMIN</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </nav>
            <div class="sdb_holder">
                <h6>Maison des Ligues de la Lorraine</h6>
                <address>
                    M.2.L<br>
                    13 rue Jean Moulin<br>
                    - BP 70001<br>
                    TOMBLAINE<br>
                    54510<br>
                    <br>
                    Tél. : 03.83.18.87.02<br>
                    Email: contact@m2l.fr
                </address>
            </div>
        </div>
        <div class="content three_quarter">
            <img class="imgr borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgr.gif" alt="">
            <p>Bienvenue dnas votre espace, d'ici vous pouvez consulter vos formations et ainsi consulter l'avancement de votre inscription.</p>
            <p>De plus, vous pouvez contacter <a href="#">un prestatire</a> responsable d'une formation mais aussi contacter un référent dans le cadre d'une inscription à formation</p>
            <img class="imgl borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgl.gif" alt="">
            <p>Vos formations sont dans un premier temps en attente de validation par le referent choisi. Puis, quand celles-ci sont validées ou refusées, elles sont placés dans vos formations validées/refusées,<strong><a class="validated"> les formations validées sont sur fond Bleu</a></strong> et <strong><a class="canceled">les formation refusées sont
                        sur fond Orange</a></strong>. Le lieu et la date seront renseignés dans le tableau ci-dessous.
            <p>Vous pouvez consulter les commentaires au sujet de ces formations en cliquant sur le titre de la formation. Une fois la formation effectuée vous pourrez à votre tour commenter la formation et donner votre avis sur les locaux, la pédagogie...</p>

            <div id="London" class="tabcontent">
                <h1>VOS FORMATIONS EN ATTENTE DE VALIDATION :</h1>
                <div class="scrollable">
                    <table>
                        <?php
                        $i=0;
                        if ($formatedDatesPFD) {
                            echo "
                        <thead>
                        <tr>
                            <th class='center'>Formation</th>
                            <th class='center'>Référent</th>
                            <th class='center'>date demande</th>
                            <th class='center'>Annuler</th>
                        </tr>
                        </thead>
                        <tbody>";

                            foreach ($formatedDatesPFD as $key) {

                                echo "
                                <tr id=" . $key['id_participation'] . ">
                                    <td class='center'>" . $key['titre'] . "</td>
                                    <td class='center'>" . $key['id_validateur'] . "</td>
                                    <td class='center'>" . $key['date_demande'] . "</td>
                                    <td class='del center'
                                        id='" . $key['id_participation'] . "'
                                        document.getElementById('id')>
                                        <span id='myBtn' style='cursor:pointer; color:#F08714;'>X</span>
                                    </td>
                                </tr>
                                ";
                            }
                        }else{
                            echo " <h1 class='invalid'>Vous n'avez aucune formation en attente de Validation</h1> ";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="Paris" class="tabcontent">
            <div class="content three_quarter">
                <h1>Vos Formations validées :</h1>
                <div class="scrollable">
                    <?php
                    $i=0;
                    if ($formatedDatesVFD) {
                        echo "
                    <table>
                        <thead>
                        <tr>
                            <th class='center'>Formation</th>
                            <th class='center'>Contenu</th>
                            <th class='center'>Adresse</th>
                            <th class='center'>Validée / Refusée le</th>
                        </tr>
                        </thead>
                        <tbody>";

                        foreach ($formatedDatesVFD as $key) {
                            if ($key['state'] == 4) {
                                echo "
                                <tr class='canceled' id=" . $key['id_participation'] . ">
                                    <td class='center'>" . $key['titre'] . "</td>
                                    <td class='center'>" . $key['contenu'] . "</td>
                                    <td class='center'>" . $key['adresse_f'] . "</td>
                                    <td class='center'>" . $key['date_validation'] . "</td>
                                </tr>
                                ";

                            } else {
                                echo "
                                    <tr class='validated' id=" . $key['id_participation'] . ">
                                        <td class='center'>" . $key['titre'] . "</td>
                                        <td class='center'>" . $key['contenu'] . "</td>
                                        <td class='center'>" . $key['adresse_f'] . "</td>
                                        <td class='center'>" . $key['date_validation'] . "</td>
                                    </tr>
                                    ";
                            }
                        }
                    }else{
                        echo " <h1 class='invalid'>Aucune formation validées à afficher</h1> ";

                    }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="Tunis" class="tabcontent">
            <div class="content three_quarter">
                <h1>VOS FORMATIONS TERMINEES :</h1>
                <h1>Table(s)</h1>
                <div class="scrollable">
                    <?php
                    $i=0;
                    if ($formatedDateDFD) {
                        echo "
                    <table>
                        <thead>
                        <tr>
                            <th class='center'>Formation</th>
                            <th class='center'>Contenu</th>
                            <th class='center'>Date de Participation</th>
                            <th class='center'>Adresse</th>
                        </tr>
                        </thead>
                        <tbody>";

                        foreach ($formatedDateDFD as $key) {

                            echo "
                                    <tr id=" . $key['id_participation'] . ">
                                        <td class='center'>" . $key['titre'] . "</td>
                                        <td class='center'>" . $key['contenu'] . "</td>
                                        <td class='center'>" . $key['date_participation'] . "</td>
                                        <td class='center'>" . $key['adresse_f'] . "</td>
                                    </tr>
                                    ";
                        }
                    }else{
                        echo " <h1 class='invalid'>Vous n'avez encore participé à aucune formation</h1> ";

                    }

                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="Dublin" class="tabcontent">
            <div class="content three_quarter">
                <h1>VALIDATION DES FORMATIONS :</h1>
                <div class="scrollable">
                    <?php
                    $i=0;
                    if ($demandeurs) {
                        echo "
                        <table>
                            <thead>
                            <tr>
                                <th class='center'>Formation</th>
                                <th class='center'>Demandeur</th>
                                <th class='center'>Date de la Formation</th>
                                <th class='center'>Validation</th>
                            </tr>
                            </thead>
                            <tbody>";

                        foreach ($demandeurs as $key) {

                            echo "
                                    <tr id=" . $key['id_participation'] . ">
                                        <td class='center'>" . $key['titre'] . "</td>
                                        <td class='center'>" . $key['nom'] . " " . $key['prenom'] . "</td>
                                        <td class='center'>" . $key['date_debut'] . "</td>
                                        <td class='rep center'
                                            id='" . $key['id_participation'] . "'
                                            document.getElementById('id')>
                                            <ul class='nospace inline pushright'>
                                                <li class='oui' id='true'><a class='btn'>valider</a></li>
                                                <li class='non' id='false'><a class='btn'>refuser</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    ";
                        }
                    }else{
                        echo " <h1 class='invalid'>Vous n'avez aucune demande de validation d'inscription en attente</h1> ";
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>





<!--FENETRE ALERTE -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Annulation de demande de formation</h2>
        </div>
        <div class="modal-body">
            <p>Vous êtes sur le point d'annuler la demande à cette formation.</p>
            <p>En êtes-vous sûr ?</p>

            <div>
                <ul class="nospace inline pushright center">
                    <li class="check" id="true"><a class="btn inverse">Oui</a></li>
                    <li class="checkn" id="false"><a class="btn inverse">Non</a></li>
                </ul>
            </div>
            <br>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<!-- JAVASCRIPTS -->
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="<?=BASE_URL?>/View/js/jquery-3.2.0.min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>
<script src="<?=BASE_URL?>/View/js/deleteFormations.js"></script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";


    }
    document.getElementById("defaultOpen").click();
    // Get the element with id="defaultOpen" and click on it


    //REPONSE
    $('.check').click(function(){
        var id = $(this).attr('id');
        return id;
    });
    //Annulation demande
    $(".del").click(function (e) {
        $idA = ($(this).attr('id'));

        $(".check").click(function (e) {
            $reponse = ($(this).attr('id'));
            if ($reponse=="true") {

                $.post(
                    "<?= BASE_URL ?>/AccountController",//url adresse
                    {idA: $idA},
                    function (data) {
                        console.log(data)
                    })
                $.ajax({
                    type: 'POST',
                    url: '<?= BASE_URL ?>/AccountController',
                    timeout: 4000,
                    data: {
                        idA: $idA
                    }
                }).done(function (data) {
                    $('#' + $idA).slideUp()
                }).fail(function (error) {

                });
            }
        })
    })

    //validation demande
    $(".oui").click(function (e) {
        $reponse = ($(this).attr('id'));
        $idV = ($(this).closest('td').attr('id'));

        $.ajax({
            type: 'POST',
            url: '<?= BASE_URL ?>/AccountController',
            timeout: 4000,
            data: {
                idV: $idV,
                reponse : $reponse
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

        });
    })

    //validation demande
    $(".non").click(function (e) {
        $reponse = ($(this).attr('id'));
        $idV = ($(this).closest('td').attr('id'));
        $.ajax({
            type: 'POST',
            url: '<?= BASE_URL ?>/AccountController',
            timeout: 4000,
            data: {
                idV: $idV,
                reponse : $reponse
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

        });
    })

</script>

<?php
if (isset($_GET['City']) == 'a'){
    $_GET['City'] = "London";
    echo "<script>
            jQuery(function(){
   jQuery('#validation').click();
});
           </script>";
}elseif(isset($_GET['City']) == 'b'){
    $_GET['City'] = "Paris";
    echo "<script>
            jQuery(function(){
   jQuery('#"."Paris"."').click();
});
           </script>";
}elseif(isset($_GET['City']) == 'c'){
    $_GET['City'] = "Tunis";
    echo "<script>
            jQuery(function(){
   jQuery('#"."Tunis"."').click();
});
           </script>";
}
elseif(isset($_GET['City']) == 'd'){
    $_GET['City'] = "Dublin";
    echo "<script>
            jQuery(function(){
   jQuery('#validation').click();
});
           </script>";
}

?>