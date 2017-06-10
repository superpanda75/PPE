<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/AdresseDAO.php';
require 'Model/SuperieurDAO.php';
require 'Model/ParticiperDAO.php';


function getTeamIds($userId){
    return getTeam($userId);
}

function deleteParticiper($idParticipation){
    deleteParticipation($idParticipation);
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

function getMateInfo($mateId){
    $mateFormationInfo = array();
    $pendingFormations = array();
    $validatedFormations = array();
    $doneFormations = array();

        //demandes de validation
        $pFormations = getPendingFormationsDatas($mateId);
        array_push($pendingFormations, $pFormations);

        //validées
        $vFormations = getValidatedFormationsDatas($mateId);
        array_push($validatedFormations, $vFormations);

        //effectuées
        $dFormations = getDoneFormationsDatas($mateId);
        array_push($doneFormations, $dFormations);

    array_push($mateFormationInfo, $pendingFormations, $validatedFormations, $doneFormations);

    return $mateFormationInfo;
}



//contient les objets salariés concernés
$teamInfos = makeTeamInfos($_SESSION['curr_user'][0]['id_s']);

//contient les id de l'equipe
$teamIds = array();
foreach ($teamInfos as $mateInfo){
    array_push($teamIds,$mateInfo->getId());
}

//Contient les différents noms des div
$myDivs = ['Paris','Tunis','Dublin','Pekin','Mexico','LosAngeles','Washington','Moscou'];
var_dump($myDivs);



//réponse ajax
if (isset($_POST['mate'])) {
    $id = (intval($_POST['mate']) / 999);

    //infos contient les détails de formation du salarié cliqué
    echo "<pre>";
    print_r($infos = getMateInfo($id));
    echo "<pre>";
    //liste d'objets salariés
    $teamInfos = makeTeamInfos($_SESSION['curr_user'][0]['id_s']);

    for ($i = 0; $i < count($teamInfos); $i++) {
        $equipier = $teamInfos[$i];

        if (intval($equipier->getId()) == $id) {
            $sal = $teamInfos[$i];
            var_dump($sal);
        }
    }
}


    require('View/pages/myTeam.php');

