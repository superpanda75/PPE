<?php
$nb_formation = Get_nb_formations();

for ($j=1;$j<=$nb_formation;$j++) {
    ?>

    <div class="row">
        <?php
        for ($i=1;$i<=$nb_formation;$i++){
            Get_formations($i);
            ?>
            <article class='col-xs-3 work'>
                <img src='VIEW/images/<?php$i?>/1.png' alt=''/><br>
                <strong><?php $formations['titre_formation'] ?>/<?php$j?> - <?php$i?></strong><br>
                <em><?php $formations['contenu_formation'] ?></em>
                <div class='work_detail'>
                    <hr/>
                    <div class='row'>


                        <div class='col-xs-8'>
                            <img src='View/images/<?php$i?>/2.png'/>
                            <img src='View/images/<?php$i?>/3.png'/>
                            <img src='View/images/<?php$i?>/4.png'/>
                        </div>

                        <div class='col-xs-4'>
                            <h2>Ma formation </h2>
                            <p><em>Informatique</em></p>
                            <p>Lorem ipsum dolor et pata !</p>
                        </div>

                    </div>
                    <hr/>
                </div>
            </article>

        <?php } ?>

    </div>

    <div class="row row-detail"></div>

<?php } ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="../../../js/m2l.js"></script>
<script src="../../../js/m2l.js"></script>