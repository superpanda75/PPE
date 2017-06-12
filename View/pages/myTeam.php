<div class="wrapper row2">
    <main class="hoc container clear">
        <img class="imgr borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgr.gif" alt="">
        <h2>Bienvenue dans votre espace Chef d'équipe, </h2>d'ici vous pouvez consulter les formations de vos salriés et ainsi en consulter l'avancement.
        <img class="imgl borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgl.gif" alt="">
        <p>Les formations de vos salariés sont dans un premier temps en attente de validation.
            Puis, quand celles-ci sont validées ou refusées, elles sont placés dans les formations
            validées,
            La date est renseignée dans le tableau ci-dessous.
        <p>Vous pouvez consulter les commentaires au sujet de ces formations en cliquant sur le titre de la formation. </p>
    </main>
</div>
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <div id="gallery">
                <figure>
                    <h1 class="center">Votre Équipe :</h1>
                    <ul class="nospace clear">
                        <?php
                        $i=0;
                        foreach ($teamInfos as $salarie) {
                            if ($i%4 == 0){
                                echo " <li  id='".(intval($salarie->getId())*999)."' class='del one_quarter first tablinks' onclick='openCity(event,".$i.")'><img src='".BASE_URL."/".$salarie->getPhoto()."' width='600' height='400'/><p class='center'>".$salarie->getNom()." ".$salarie->getPrenom()."</p></li>";
                            }else {
                                echo " <li  id='".(intval($salarie->getId())*999)."' class='del one_quarter tablinks' onclick='openCity(event,".$i.")'><img src='".BASE_URL."/".$salarie->getPhoto()."' width='600' height='400'/><p class='center'>".$salarie->getNom()." ".$salarie->getPrenom()."</p></li>";
                            }
                            $i++;
                        }
                        ?>
                    </ul>
                </figure>
            </div>
        </div>
    </main>
</div>
<?php
/*var_dump($teamInfos);*/
$c = 0;
foreach ($teamInfos as $salarie) {
    $adresse = getAdressebyId($salarie->getAdresse());
    $adressString = $adresse[0]['numero_rue'] . " "
        . $adresse[0]['rue'] . ", "
        . $adresse[0]['ville'] . " "
        . $adresse[0]['code_postal'];
    echo "
    <div class='tabcontent' id='card".$c."' style='display:none;'>


                <h1>Salarié :".$salarie->getNom()." ".$salarie->getPrenom()."</h1>
                <ul>
                    <li>Nom : ".$salarie->getNom()."</li>
                    <li>Prenom : ".$salarie->getPrenom()."</li>
                    <li>Email :".$salarie->getEmail()."</li>
                    <li>Identifiant : ".$salarie->getIdentifiant()."</li>
                    <li>Password : ".$salarie->getPassword()."</li>
                    <li>Hauter des droits : ".$salarie->getStatus()."</li>
                    <li>Crédits : ".$salarie->getCredit()."</li>
                    <li>Jours de formation : ".$salarie->getNbJour()."</li>
                    <li>Adresse : ".$adressString."</li>
                </ul>

            <div class = 'one_half right'>
                <img src='View/image_formation/grande_image.png'>
            </div>
    </div>";
    echo "
<div id='".$c."' class='tabcontent'>
            <table>
                <thead>
                    <tr>
                        <th class='NomEquipier'>".strtoupper($salarie->getNom())." ".strtoupper($salarie->getPrenom())."</th>
                    </tr>
                </thead>
         ";
    if (sizeof($formationsInfos[$salarie->getId()]['pending'])> 0) {
        echo "
                <table style='margin-bottom: 0px;'>
                    <thead>
                        <tr>
                            <th onclick='afficherCacher(\"demande".$c."\")' class='enteteAValider' style='cursor : pointer;'>Demande de formations</th>
                        </tr>
                    </thead>
                </table>
            <div id='demande".$c."' style='display : none;'>
                <table style='margin-bottom: 0px;'>
                        <thead>
                            <tr>
                                <th class='center' style='width: 20%'>titre</thclass>
                                <th class='center' style='width: 30%'>contenu</thclass>
                                <th class='center' style='width: 14%'>duree</thclass>
                                <th class='center' style='width: 14%'>date de début</thclass>
                                <th class='center' style='width: 14%'>date de demande</thclass>
                                <th class='center' style='width: 8%'>Valider</thclass>
                            </tr>
                        </thead>";
        foreach ($formationsInfos[$salarie->getId()]['pending'] as $formation) {
            echo "
                        <table style='margin-bottom: 0px;'>
                        <thead>
                        <tbody>
                            <tr>
                                <td class=center style='width: 20%'><a target='_blank' href='".BASE_URL."/maFormationPDF?F=".$formation['id_f']."'>" . $formation['titre'] . "</a></td>
                                <td class=center style='width: 30%'>" . $formation['contenu'] . "</td>
                                <td class=center style='width: 14%'>" . $formation['duree'] . " jours</td>
                                <td class=center style='width: 14%'>" . $formation['date_debut'] . "</td>
                                <td class=center style='width: 14%'>" . $formation['date_demande'] . "</td>
                                <td class=center style='width: 8%'><a href='".BASE_URL."/accountController?City=Dublin'>Valider</a></td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>

         ";
        }
        echo "</div>";
    }

    if (sizeof($formationsInfos[$salarie->getId()]['validated'])> 0) {

        echo "
                <table style='margin-bottom: 0px;'>
                    <thead>
                        <tr>
                            <th onclick='afficherCacher(\"valide".$c."\")' class='enteteValide' style='cursor : pointer;'>Formations validées</th>
                        </tr>
                    </thead>
                </table>
            <div id='valide".$c."' style='display : none;'>
                    <table style='margin-bottom: 0px;'>
                        <thead>
                            <tr>
                                <th class='center' style='width: 20%'>titre</thclass>
                                <th class='center' style='width: 30%'>contenu</thclass>
                                <th class='center' style='width: 14%'>durée</thclass>
                                <th class='center' style='width: 14%'>date de début</thclass>
                                <th class='center' style='width: 14%'>validée le :</thclass>
                                <th class='center' style='width: 8%'>Annuler</thclass>
                            </tr>
                        </thead>";
        foreach ($formationsInfos[$salarie->getId()]['validated'] as $formation) {
            echo "                         <table style='margin-bottom: 0px;'>
                            <thead>
                                <tbody>
                                    <tr>
                                        <td class=center style='width: 20%'><a target='_blank' href='".BASE_URL."/maFormationPDF?F=".$formation['id_f']."'>" . $formation['titre'] . "</a></td>
                                        <td class=center style='width: 30%'>" . $formation['contenu'] . "</td>
                                        <td class=center style='width: 14%'>" . $formation['duree'] . " jours</td>
                                        <td class=center style='width: 14%'>" . $formation['date_debut'] . "</td>
                                        <td class=center style='width: 14%'>" . $formation['date_validation'] . "</td>
                                        <td class=center style='width: 8%'><a href='".BASE_URL."/accountController?City=Dublin' style='color:red;'>X</a></td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                    </table>
                ";
        }
        echo "</div>";
    }
;

    if (sizeof($formationsInfos[$salarie->getId()]['done'])> 0) {

        echo "
                <table style='margin-bottom: 0px;'>
                    <thead>
                        <tr>
                            <th onclick='afficherCacher(\"effectuee".$c."\")' class='enteteEffectuee' style='cursor : pointer;'>Formations effectuées</th>
                        </tr>
                    </thead>
                </table>
         ";

        echo "<div id='effectuee".$c."' style='display : none;'>
                    <table style='margin-bottom: 0;'>
                        <thead>
                            <tr>
                                <th class='center' style='width: 20%'>titre</thclass>
                                <th class='center' style='width: 30%'>contenu</thclass>
                                <th class='center' style='width: 14%'>durée</thclass>
                                <th class='center' style='width: 14%'>date de début</thclass>
                                <th class='center' style='width: 14%'>effectuée le :</thclass>
                                <th class='center' style='width: 8%'>cout</thclass>
                            </tr>
                        </thead>";
        foreach ($formationsInfos[$salarie->getId()]['done'] as $formation) {
            echo"
                    <table style='margin-bottom: 0px;'>
                        <thead>
                            <tbody>
                                <tr>
                                    <td class=center style='width: 20%'><a target='_blank' href='".BASE_URL."/maFormationPDF?F=".$formation['id_f']."'>" . $formation['titre'] . "</a></td>
                                    <td class=center style='width: 30%'>" . $formation['contenu'] . "</td>
                                    <td class=center style='width: 14%'>" . $formation['duree'] . " jours</td>
                                    <td class=center style='width: 14%'>" . $formation['date_debut'] . "</td>
                                    <td class=center style='width: 14%'>" . $formation['date_participation'] . "</td>
                                    <td class=center style='width: 8%'>".$formation['cout']." crédits</td>
                                </tr>
                            </tbody>
                        </thead>
                    </table>
                </table>
                ";
        }
        echo "</div>";

    }
    $c++;
    echo "</div>";


}


//var_dump($formationsInfos[44]['done']);



?>


<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script>

<script>
    $(document).ready(function () {
        $(".del").click(function (e) {
            $idA = ($(this).attr('id'));

            $.ajax({
                type:'POST',
                url: '<?= BASE_URL ?>/myTeamController',
                timeout: 4000,
                dataType: 'text',
                data: {
                    mate: $idA
                }
            }).done(function (data) {
                $(".test").html(data);
            }).fail(function (error) {
                alert('fail haha !!');
            });
        })
    });
</script>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function openCity2(evt,cityName){
        var strval = cityName.toString();
        afficherCacher("card"+strval);
        openCity(evt,cityName);
    }
    /**
     *
     * @param type
     */
    function afficherCacher(type){
     if (document.getElementById(type).style.display == 'block') {
     document.getElementById(type).style.display = 'none';
     } else {
     document.getElementById(type).style.display = 'block';
     }
     }
</script>