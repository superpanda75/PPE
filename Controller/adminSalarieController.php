<?php
require 'Model/connect.php';
require 'Model/FormationDAO.php';
require 'Model/SalarieDAO.php';
require 'corps/formation.php';
require 'corps/salarie.php';

/**
 * @param $var
 * @return string
 */
function safe($var)
{
    $var = addcslashes($var, '%_');
    $var = trim($var);
    $var = htmlspecialchars($var);
    return $var;
}

/**
 * @param $chaine
 * @return array|null
 */
function findSalarie($chaine)
{
    var_dump(safe($chaine));
    $result = searchSalarie(safe($chaine));
    var_dump($result);
// affichage d'un message "pas de résultats"
    if (count($result) == 0) {
        ?>
        <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
        <?php
    } else {
        $_SESSION['resultsSalarie'] = 'true';
        // parcours et affichage des résultats
        $salaries = array();
        foreach ($result as $salarieDetails) {
            $salarie = new Salarie(
                $salarieDetails['id_s'],
                $salarieDetails['nom'],
                $salarieDetails['prenom'],
                $salarieDetails['email'],
                $image = '/View/image_salarie/'.$salarieDetails['id_s'],
                $salarieDetails['identifiant'],
                $salarieDetails['password'],
                $salarieDetails['status'],
                $salarieDetails['credit'],
                $salarieDetails['nb_jour']
            );
            array_push($salaries, $salarie);
        }

        $i = 0;
        foreach ($salaries as $leSalarie) {
            if ($i % 4 == 0) {
                echo "<li class='one_quarter first'><a href='" . BASE_URL . "/editSalarieController&s=" . $leSalarie->getId() . "'><img src='" . BASE_URL . "/" . $leSalarie->getPhoto() . "' alt=''><p class='center'>" . $leSalarie->getNom() . " ".$leSalarie->getPrenom()."</p></a></li>";
            } else {
                echo "<li class='one_quarter'><a href='" . BASE_URL . "/editSalarieController&s=" . $leSalarie->getId() . "'><img src='" . BASE_URL . "/" . $leSalarie->getPhoto() . "' alt=''><p class='center'>" . $leSalarie->getNom() . " ".$leSalarie->getPrenom() . "</p></a></li>";
            }
            $i++;

        }
        return $salaries;
    }
    return null;
}
// appel à la fonction si q est bien envoyé en ajax (q étant la chaine tapée par l'utilisateur dans le champ
// de recherche
/**
 * @return array|null
 */
function makeSalaries()
{
    if ($datas = getAllSalaries()) {
        $Salaries = array();
        foreach ($datas as $index) {
            $salarie = new Salarie(
                $index['id_s'],
                $index['nom'],
                $index['prenom'],
                $index['email'],
                $image = '/View/image_salarie/'.$index['id_s'],
                $index['identifiant'],
                $index['password'],
                $index['status'],
                $index['credit'],
                $index['nb_jour']
            );
            array_push($Salaries,$salarie);
        }
        return $Salaries;
    } else {
        return null;
    }
}


$Salaries = makeSalaries();




if (isset ($_GET['q'])) {
    var_dump($_GET['q']);
    $salarieToShow = findSalarie($_GET['q']);
}

if (!isset($_GET['vue'])) {
    header( 'content-type: text/html; charset=utf-8' );
    require('View/pages/adminS.php');
}
?>
