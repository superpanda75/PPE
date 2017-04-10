<div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Dolor</a></li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
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
                    <h1 class="center">Résultats de la recherche :</h1>
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
                    <figcaption>Les formations affichées sont les formations auxquelles vous n'avez kamais participé</figcaption>
                </figure>
            </div>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <nav class="pagination">
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
            </nav>
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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>