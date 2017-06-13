<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/AdresseDAO.php';
require 'Model/SuperieurDAO.php';
require 'Model/ParticiperDAO.php';


/**
 * @param $userId
 * @return array
 */
function getTeamIds($userId){
    return getTeam($userId);
}

/**
 * @param $idParticipation
 */
function deleteParticiper($idParticipation){
    deleteParticipation($idParticipation);
}

/**
 * @param $idUser
 * @return array
 */
function makePendingFormationsInfos($idUser){
    return getPendingFormationsDatas($idUser);
}

/**
 * @param $idUser
 * @return array
 */
function makeValidatedFormationsInfos($idUser){
    return getValidatedFormationsDatas($idUser);
}

/**
 * @param $idUser
 * @return array
 */
function makeDoneFormationsDatas($idUser){
    return getDoneFormationsDatas($idUser);
}

/**
 * @param $userId
 * @return array
 */
function makeTeamInfos($userId){
    $teamIds = getTeamIds($userId);
    $teamInfos = getManyUsersById($teamIds);
    $makedTeam = makeSalarieByList($teamInfos);

    return $makedTeam;
}

/**
 * Cette fonction permet de construire des objets "Salarie" à partir d'un tableau associatif issu de la bdd
 * @param array $matesInfos
 * @return array
 */
function makeSalarieByList(array $matesInfos){
    $salarieMates = array();
    foreach ($matesInfos as $index) {
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
            $index['nb_jour'],
            $index['adresse_s']
        );
        array_push($salarieMates,$salarie);
    }
    return $salarieMates;
}

/**
 * Cette fonction permet de récupérer les formations (et leur états) des salariés du chef d'équipe
 * à partir d'un tableau d'IDs des salariés dont le chef d'équipe est responsable
 * @param array $teamIds
 * @return array
 */
function getMatesFormationsInfos(array $teamIds)
{
    $matesFormationInfo = array();
    $pendingFormations = array();
    $validatedFormations = array();
    $doneFormations = array();

    foreach ($teamIds as $mateId) {

        //demandes de validation
        $pFormations = getPendingFormationsDatas($mateId);
        array_push($pendingFormations, $pFormations);

        //validées
        $vFormations = getValidatedFormationsDatas($mateId);
        array_push($validatedFormations, $vFormations);

        //effectuées
        $dFormations = getDoneFormationsDatas($mateId);
        array_push($doneFormations, $dFormations);
    }
    array_push($matesFormationInfo, $pendingFormations, $validatedFormations, $doneFormations);
    return $matesFormationInfo;
}

/**
 * récupère les différents type de formation des différents membresde m'équipe
 * Méthode bourrin ! à changer !
 *
 * @param $mateId
 * @return array
 */
function getMateInfo($mateId){
    $mateFormationInfo = array();

    foreach ($mateId as $id) {
        $strId = strval($id);
        $mateFormationInfo[$strId] = array();
        $mateFormationInfo[$strId]['pending'] = array();
        $mateFormationInfo[$strId]['validated'] = array();
        $mateFormationInfo[$strId]['done'] = array();


        //demandes de validation
        $pFormations = getPendingFormationsDatas($id);
        foreach($pFormations as $formP) {
            $formP['date_demande'] = date( 'd/m/Y à H:i', strtotime( $formP['date_demande'] ) );
            $formP['date_debut'] = date( 'd/m/Y à H:i', strtotime( $formP['date_debut'] ) );
            array_push($mateFormationInfo[$id]['pending'], $formP);
        }
        //validées
        $vFormations = getValidatedFormationsDatas($id);
        foreach ($vFormations as $formV) {
            $formV['date_validation'] = date('d/m/Y à H:i', strtotime($formV['date_validation']));
            $formV['date_debut'] = date('d/m/Y à H:i', strtotime($formV['date_debut']));
            array_push($mateFormationInfo[$id]['validated'], $formV);
        }
        //effectuées
        $dFormations = getDoneFormationsDatas($id);
        foreach($dFormations as $formE) {
            $formE['date_participation'] = date( 'd/m/Y à H:i', strtotime( $formE['date_participation'] ) );
            $formE['date_debut'] = date( 'd/m/Y à H:i', strtotime( $formE['date_debut'] ) );
            array_push($mateFormationInfo[$id]['done'], $formE);
        }
    }

    return $mateFormationInfo;
}



//contient les objets salariés concernés
$teamInfos = makeTeamInfos($_SESSION['curr_user'][0]['id_s']);

//contient les id de l'equipe
$teamIds = array();
foreach ($teamInfos as $mateInfo){
    array_push($teamIds,$mateInfo->getId());
}
//contient les infos formations
$formationsInfos = getMateInfo($teamIds);



require('View/pages/myTeam.php');

