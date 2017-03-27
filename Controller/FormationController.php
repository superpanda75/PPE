<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';
require 'Model/ParticiperDAO.php';

/**
 * @return array
 */
function openFormations()
{
    $openFormations = getAvailableFormationsByUserId($_SESSION['curr_user'][0]['id_s']);
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



if (isset($_POST['x']) && $_POST['x']=="checkRegister"){
    $result = checkRegister(
        intval($_POST['salarie']),
        intval($_POST['validateur']),
        intval($_POST['formation'])
    );
}

$openFormations = openFormations();








require ('View/pages/formation.php')
?>
