<?php


?>
<script>
    var London = 'London';
    var Paris = 'Paris';
    var Tunis = 'Tunis';
</script>
<div class="wrapper row2">
    <main class="hoc container clear">
            <h1>ADAPTER LE TEXTE PR DIRE QU IL S AGIT DE L ESPACE EQUIPE ET DECRIRE POSSIBILIT2S PR CHEF</h1>
            <img class="imgr borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgr.gif" alt="">
            <p>Bienvenue dnas votre espace, d'ici vous pouvez consulter vos formations et ainsi consulter l'avancement de votre inscription.</p>
            <p>De plus, vous pouvez contacter <a href="#">un prestatire</a> responsable d'une formation mais aussi contacter un référent dans le cadre d'une inscription à formation</p>
            <img class="imgl borderedbox inspace-5" src="<?=BASE_URL?>/View/images/demo/imgl.gif" alt="">
            <p>Vos formations sont dans un premier temps en attente de validation par le referent choisi. Puis, quand celles-ci sont validées ou refusées, elles sont placés dans vos formations validées/refusées,<strong><a class="validated"> les formations validées sont sur fond Bleu</a></strong> et <strong><a class="canceled">les formation refusées sont
                        sur fond Orange</a></strong>. Le lieu et la date seront renseignés dans le tableau ci-dessous.
            <p>Vous pouvez consulter les commentaires au sujet de ces formations en cliquant sur le titre de la formation. Une fois la formation effectuée vous pourrez à votre tour commenter la formation et donner votre avis sur les locaux, la pédagogie...</p>
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
                    <h1 class="center">Utilisateurs :</h1>
                        <ul class="nospace clear">
                            <?php
                            $i=0;
                            foreach ($teamInfos as $salarie) {
                                if ($i%4 == 0){
                                    echo " <li  id='".(intval($salarie->getId())*999)."' class='del one_quarter first tablinks' onclick='openCity(event,".$i.");'><img src='".BASE_URL."/".$salarie->getPhoto()."' width='600' height='400'/><p class='center'>".$salarie->getNom()." ".$salarie->getPrenom()."</p></li>";
                                }else {
                                    echo " <li  id='".(intval($salarie->getId())*999)."' class='del one_quarter tablinks' onclick='openCity(event,".$i.");'><img src='".BASE_URL."/".$salarie->getPhoto()."' width='600' height='400'/><p class='center'>".$salarie->getNom()." ".$salarie->getPrenom()."</p></li>";
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
$c = 0;
foreach ($teamInfos as $salarie) {

    echo "
<div id='" .$c."' class='tabcontent'>
            <table>
                <thead>
                    <tr>
                        <th>".strtoupper($salarie->getNom())." ".strtoupper($salarie->getPrenom())."</th>
                    </tr>
                    <tr>
                        <th>Demande de formations</th>
                    </tr>
                    <tr>
                        <th>formations validées</th>
                    </tr>
                    <tr>
                        <th>formations effectuées</th>
                    </tr>
                </thead>
            </table>
</div>";
    $c++;
}

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
</script>