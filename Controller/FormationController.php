<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';
require 'Model/ParticiperDAO.php';


/**
 * fonction de recherche de formation
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
 * @return array
 */
function openFormations()
{
    $openFormations = getAvailableFormationsByUserId($_SESSION['curr_user'][0]['id_s'],20);
    $i=0;
    $objArrayFormations = array();
    foreach ($openFormations as $index){
        $formation = new Formation($index['id_f'],
            $index['titre'],
            $index['cout'],
            $index['date_debut'],
            $index['duree'],
            $index['image'],
            $index['nb_place'],
            $index['type_f'],
            $index['prestataire_f'],
            $index['adresse_f'],
            $index['contenu']
        );
        array_push($objArrayFormations,$formation);
    }
    return $objArrayFormations;
}


/**
 * @param $idSalarie
 * @param $idFormation
 * @return bool
 */
function debitUser($idSalarie, $idFormation){
    $formationData = getFormationById($idFormation);
    $formation = new Formation(
        $formationData[0]['id_f'],
        $formationData[0]['titre'],
        $formationData[0]['cout'],
        $formationData[0]['date_debut'],
        $formationData[0]['duree'],
        $formationData[0]['image'],
        $formationData[0]['nb_place'],
        $formationData[0]['type_f'],
        $formationData[0]['prestataire_f'],
        $formationData[0]['adresse_f'],
        $formationData[0]['contenu']
    );

    $credit = $_SESSION['curr_user'][0]['credit'];
    $cout = intval($formation->getCout());

    if ($credit >= $cout){
        $amount = $_SESSION['curr_user'][0]['credit'] -= $cout;
        updateCredit($idSalarie,$amount);
        return true;
    }
    else{
        return false;
    }
}

/**
 * @param $idSalarie
 * @param $idChef
 * @param $idFormation
 * @return string
 */
function checkRegister($idSalarie,$idChef,$idFormation){
    $message = 'La demande d\'inscription a bien été envoyée !';
    if (empty(checkInscription($idSalarie,$idChef,$idFormation))){
        if (debitUser($idSalarie,$idFormation)) {
            addDemande($idSalarie, $idChef, $idFormation);
        }
        else {
            $message = "votre solde est insuffisant pour vous inscrire à cette formation";
        }
    }
    else {
        $message = "Une erreur est survenue lors de l'inscription !";
    }

    return $message;
}

$Formations = makeFormations();

if (isset($_POST['x']) && $_POST['x']=="checkRegister"){
    $result = checkRegister(
        intval($_POST['salarie']),
        intval($_POST['validateur']),
        intval($_POST['formation'])
    );
}

/**
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
$openFormations = openFormations();

if (isset ($_GET['q'])) {
    $formationsToShow = findFormation($_GET['q']);
    die();
}


require ('View/pages/formation.php')
?>
