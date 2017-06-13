<?php
require 'Model/connect.php';
require 'Model/FormationDAO.php';
require 'corps/formation.php';


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
 * Outil de la requête ajax, cette fonction permet de rechercher la formation en question
 * d'en creer les objets avant de retourner un tableau de formation
 *
 * @param $chaine
 * @return array|null
 */
function findFormation($chaine)
{
    $result = search(safe($chaine));
// affichage d'un message "pas de résultats"
    if (count($result) == 0) {
        ?>
        <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
        <?php
    } else {
        $_SESSION['results'] = 'true';
        // parcours et affichage des résultats
        $formations = array();
        foreach ($result as $formationDetails) {
            $formation = new Formation(
                $formationDetails['id_f'],
                $formationDetails['titre'],
                $formationDetails['cout'],
                $formationDetails['date_debut'],
                $formationDetails['duree'],
                $formationDetails['image'],
                $formationDetails['nb_place'],
                $formationDetails['type_f'],
                $formationDetails['prestataire_f'],
                $formationDetails['adresse_f'],
                $formationDetails['contenu']);

            array_push($formations, $formation);
        }

        $i = 0;
        foreach ($formations as $laFormation) {
            if ($i % 4 == 0) {
                echo "<li class='one_quarter first'><a href='" . BASE_URL . "/editFormController&f=" . $laFormation->getId() . "'><img src='" . BASE_URL . "/" . $laFormation->getImage() . "' alt=''><p class='center'>" . $laFormation->getTitre() . "</p></a></li>";
            } else {
                echo "<li class='one_quarter'><a href='" . BASE_URL . "/editFormController&f=" . $laFormation->getId() . "'><img src='" . BASE_URL . "/" . $laFormation->getImage() . "' alt=''><p class='center'>" . $laFormation->getTitre() . "</p></a></li>";
            }
            $i++;

        }
        return $formations;
    }
    return null;
}
// appel à la fonction si q est bien envoyé en ajax (q étant la chaine tapée par l'utilisateur dans le champ
// de recherche
/**
 * construit des objets formation à partir d'un tableau de données
 * @return array|null
 */
function makeFormations()
{
    if ($datas = getAllFormations()) {
        $Formations = array();
        foreach ($datas as $index) {
            $formation = new Formation(
                $index['id_f'],
                $index['titre'],
                $index['cout'],
                $index['date_debut']= date( 'd-m-Y H:i', strtotime( $index['date_debut'] )),
                $index['duree'],
                $index['image'],
                $index['nb_place'],
                $index['type_f'],
                $index['prestataire_f'],
                $index['adresse_f'],
                $index['contenu']
            );
            array_push($Formations,$formation);
        }
        return $Formations;
    } else {
        return null;
    }
}

$Formations = makeFormations();

if (isset ($_GET['q'])) {
    $formationsToShow = findFormation($_GET['q']);

}
if (!isset($_GET['vue'])) {
    header( 'content-type: text/html; charset=utf-8' );
    require('View/pages/adminF.php');
}
?>
