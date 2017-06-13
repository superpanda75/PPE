<div class="wrapper row2">
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
                <h1>S'inscrire pour cette formation :</h1>
                <form name="chefValidation" method="post" action="<?=BASE_URL?>/FormationController" onsubmit="return validateForm()">
                    <?php if (!empty($listeChefs)){?>
                        <select  class="btn" name="validateur" id="validateur">
                            <option value="a">Choisissez un référent</option>
                            <?php foreach($listeChefs as $index){
                                echo "<option value='".$index['id_s']."'>".$index['nom']." ".$index['prenom']."</option>";
                            } ?>
                        </select>
                        <input name="salarie" type="text" style="display: none" value="<?php echo  $_SESSION['curr_user'][0]['id_s'] ?>">
                        <input name="formation" type="text" style="display: none" value="<?php echo $formation->getId(); ?>" >
                        <input name="x" type="text" style="display: none" value="checkRegister" >
                    <?php } ?>

                    <input class="btn inverse" type="submit" value="S'inscrire">
                    <a target="_blank" href="<?=BASE_URL?>/maFormationPDF?F=<?=$formation->getId()?>"><input class="btn inverse" type="button" value="PDF"></a>
                </form>
            </div>
            <div class = "one_half right">
                <img style="width:600px; height:399px" src="<?=BASE_URL."/".$formation->getImage()?>">
            </div>

        </div>
    </div>
</div>
<script>
    function validateForm() {
        var validateur = document.forms["chefValidation"]["validateur"].value;
        var salarie = document.forms["chefValidation"]["salarie"].value;
        var formation = document.forms["chefValidation"]["formation"].value;
        if (validateur == 'a') {
            alert("Vous devez choisir un référent");
            return false;
        }
    }
</script>