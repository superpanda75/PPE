<?php require 'Model/connect.php'; ?>

<div class="wrapper bgded overlay" style="background-image:url('<?=BASE_URL?>/View/images/natation1.jpeg');">
    <div id="cta" class="hoc clear">
        <article>
            <h2 class="heading">Formations à venir</h2>
            <p>Des formations que vous ne connaissez pas ?</p>
            <p>Voici les formations à venir, cliquez sur l'une d'elles pour voir les détails.</p>
            <p>Découvrez ces formations, celles-ci auront lieu très prochainement.</p>
            <footer><a class="btn inverse" href="<?=BASE_URL?>/FormationController">Toutes les formations</a></footer>
        </article>
    </div>
</div>
<div class="wrapper bgded overlay" style="background-image:url('<?=BASE_URL?>/View/images/natation2.jpeg');">
    <main class="hoc container clear">

        <div class="group latest">
            <?php
            $i=0;
            foreach($formations as $form){
            $dateDay = makeTimeDay($form->getDateDebut());
            $dateMonth = makeTimeMonth($form->getDateDebut());
            if ($i%3 == 0){
                echo "<article class='one_third first'>";
            }else{
                echo "<article class='one_third'>";
                }
                $i++;
                ?>

                <figure><a href="<?=BASE_URL?>/FormationDetailController?f=<?=$form->getId()?>"><img height="220" width="320" src="<?=BASE_URL."/".$form->getImage()?>" alt=""></a>
                    <figcaption>
                        <time datetime="2045-04-06T08:15+00:00"><strong><?=$dateDay?></strong> <em><?=$dateMonth?></em></time>
                    </figcaption>
                </figure>
                <div class="txtwrap">
                    <h4 class="heading">Titre : <?=$form->getTitre()?></h4>
                    <p>Contenu : <?=$form->getContenu()?></p>
                    <footer><a href="<?=BASE_URL?>/FormationDetailController?f=<?=$form->getId()?>">En savoir plus...</a></footer>
                    <footer><a href="<?=BASE_URL?>/maFormationPDF?F=<?=$form->getId()?>">fiche PDF</a></footer>
                </div>
            </article>
            <?php } ?>

        </div>
        <div class="clear"></div>
    </main>
</div>