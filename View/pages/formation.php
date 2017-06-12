<div class="wrapper row2">

    <?php
    if (isset($result)) {
        if ($result == 'La demande d\'inscription a bien été envoyée !') {
            echo '<div class="alert alert-success">
                    <strong>'.$result.'</strong>
                  </div>';
        } elseif ($result == 'votre solde est insuffisant pour vous inscrire à cette formation') {
            echo '<div class="alert alert-warning">
                    <strong>'.$result.'</strong>
                  </div>';
        } else {
            echo '<div class="alert alert-danger">
                    <strong>'.$result.'</strong>
                  </div>';
        }
    }?>
</div>

<form class="ajax" action="formation.php" method="get">
    <p>
    <h1><label for="q">Rechercher une formation</label></h1>
    <input value="" type="text" name="q" id="q" />
    </p>
</form>

<div style="display: none" id="row2" class="wrapper row2">
    <main class="hoc container clear">
        <div class="content">
            <div id="gallery">
                <h1>résultats de la recherche :</h1>
                <figure>
                    <ul class="nospace clear" id="results">

                    </ul>
                </figure>
            </div>
        </div>
    </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <div id="gallery">
                <figure>
                    <h1>Les formations affichées sont les formations auxquelles vous n'avez jamais participé :</h1>
                    <ul class="nospace clear">
                        <?php
                        $i=0;
                        foreach ($openFormations as $formation) {
                            if ($i%4 == 0){
                                echo "<li class='one_quarter first'><a href='".BASE_URL."/FormationDetailController&f=".$formation->getId()."'><img src='".BASE_URL."/".$formation->getImage()."' alt=''><p class='center'>".$formation->getTitre()."</p></a></li>";
                            }else {
                                echo "<li class='one_quarter'><a href='".BASE_URL."/FormationDetailController&f=".$formation->getId()."'><img src='".BASE_URL."/".$formation->getImage()."' alt=''><p class='center'>".$formation->getTitre()."</p></a></li>";
                            }
                            $i++;
                        }
                        ?>
                    </ul>
                </figure>
            </div>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!--<nav class="pagination">
                <ul>
                    <li><a href="#">&laquo; Previous</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><strong>&hellip;</strong></li>
                    <li><a href="#">6</a></li>
                    <li class="current"><strong>7</strong></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><strong>&hellip;</strong></li>
                    <li><a href="#">14</a></li>
                    <li><a href="#">15</a></li>
                    <li><a href="#">Next &raquo;</a></li>
                </ul>
            </nav>-->
            <!-- ################################################################################################ -->
        </div>
        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- JAVASCRIPTS -->
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script>
<script src="<?=BASE_URL?>/View/js/jquery-3.2.0.min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>

<script>
    $(document).ready( function() {
        // détection de la saisie dans le champ de recherche
        $('#q').keyup( function(){
            $field = $(this);
            $('#results').html(''); // on vide les resultats
            $('#ajax-loader').remove(); // on retire le loader
            if( $field.val().length == 0 ) {
                $('#row2').hide();
            }
            // on commence à traiter à partir du 2ème caractère saisie
            if( $field.val().length > 0 )
            {
                document.getElementById('row2').style.display = 'block';
                // on envoie la valeur recherché en GET au fichier de traitement
                $.ajax({
                    type : 'GET', // envoi des données en GET ou POST
                    url : '<?= BASE_URL ?>/FormationController', // url du fichier de traitement
                    data : { q: $(this).val(),
                        vue: 'true'
                    },// données à envoyer en  GET ou POST

                    beforeSend : function() { // traitements JS à faire AVANT l'envoi
                        $field.after('<img src="<?= BASE_URL ?>View/images/loader.gif" alt="loader" id="ajax-loader" />');
                    },
                    success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
                        $('#ajax-loader').remove(); // on enleve le loader
                        $('#results').html(data); // affichage des résultats dans le bloc
                    }
                });
            }
        });
    });
</script>