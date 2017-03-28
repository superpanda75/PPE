<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/AdresseDAO.php';
require 'Model/FormationDAO.php';
require 'Model/ParticiperDAO.php';
require 'Model/SuperieurDAO.php';

if (isset($_POST['idA'])){
        deleteParticiper($_POST['idA']);
    die();
}


if (isset($_POST['idV']) && isset($_POST['reponse'])){
    if ($_POST['reponse'] == 'true'){
        validateFormation($_POST['idV']);
        die();
    }
    //DANS CE CAS ON RECREDITE LE SALARIE ET ON AFFECTE 4 COMME STATUT A LA FORMATION POUR GARDER UNE TRACE
    elseif($_POST['reponse'] == 'false'){
        echo "decliné";
        declineFormation($_POST['idV']);
        validateFormation($_POST['idV'], 4);
        die();
    }
}

function makePendingFormationsInfos($idUser){
    return getPendingFormationsDatas($idUser);
}

function makeValidatedFormationsInfos($idUser){
    return getValidatedFormationsDatas($idUser);
}

function makeDoneFormationsDatas($idUser){
    return getDoneFormationsDatas($idUser);
}

$pendingFormDatas = makePendingFormationsInfos($_SESSION['curr_user'][0]['id_s']);
$formatedDatesPFD = $pendingFormDatas;
foreach ($formatedDatesPFD as &$index){
    $index['date_demande'] = date( 'd/m/Y à H:i', strtotime( $index['date_demande'] ) );
}

$validatedFormDatas = makeValidatedFormationsInfos($_SESSION['curr_user'][0]['id_s']);
$formatedDatesVFD = $validatedFormDatas;
foreach ($formatedDatesVFD as &$index){
    $adress = getAdresseById($index['adresse_f']);
    $adresse = $adress[0]['numero_rue']." , rue ".$adress[0]['rue'].", ".$adress[0]['ville'].", ".$adress[0]['code_postal'];
    $index['adresse_f'] = $adresse;
    $index['date_validation'] = date( 'd/m/Y à H:i', strtotime( $index['date_validation'] ) );
}

$endedFormDatas = makeDoneFormationsDatas($_SESSION['curr_user'][0]['id_s']);
$formatedDateDFD = $endedFormDatas;
foreach ($formatedDateDFD as &$index){
    $adress = getAdresseById($index['adresse_f']);
    $adresse = $adress[0]['numero_rue']." , rue ".$adress[0]['rue'].", ".$adress[0]['ville'].", ".$adress[0]['code_postal'];
    $index['adresse_f'] = $adresse;
    $index['date_participation'] = date( 'd/m/Y à H:i', strtotime( $index['date_participation'] ) );
}

if ($_SESSION['curr_user'][0]['status']>1){
    $demandeurs = getDemandeur($_SESSION['curr_user'][0]['id_s']);
    foreach ($demandeurs as &$index){
        $adress = getAdresseById($index['adresse_f']);
        $adresse = $adress[0]['numero_rue']." , rue ".$adress[0]['rue'].", ".$adress[0]['ville'].", ".$adress[0]['code_postal'];
        $index['adresse_f'] = $adresse;
        $index['date_demande'] = date( 'd/m/Y à H:i', strtotime( $index['date_demande'] ) );
        $index['date_debut'] = date( 'd/m/Y à H:i', strtotime( $index['date_debut'] ) );
    }
}

function deleteParticiper($idParticipation){
    deleteParticipation($idParticipation);
}
require ('View/pages/account.php')
?>