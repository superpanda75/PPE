<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';
require 'Model/PrestataireDAO.php';
require 'Model/AdresseDAO.php';
require 'Model/SuperieurDAO.php';


/**
 * @param $id
 * @return array
 */
function getFromationDetail($id){
    return getFormationById($id);
}

/**
 * @param $id
 * @return array
 */
function getPrestataire($id){
    return getPrestatireById($id);
}

/**
 * @param $id
 * @return array
 */
function getAdresse($id){
    return getAdresseById($id);
}

/**
 * @param $id
 * @return array
 */
function getTypeF($id){
    return getTypeById($id);
}

/**
 * @param $id
 * @return array
 */
function selectLeader($id){
    return getLeaders($id);
}

if(isset($_GET['f'])){
    $formationDetails = getFromationDetail($_GET['f']);
    $formation = new Formation(
        $formationDetails[0]['id_f'],
        $formationDetails[0]['titre'],
        $formationDetails[0]['cout'],
        $formationDetails[0]['date_debut'],
        $formationDetails[0]['duree'],
        $formationDetails[0]['image'],
        $formationDetails[0]['nb_place'],
        $formationDetails[0]['type_f'],
        $formationDetails[0]['prestataire_f'],
        $formationDetails[0]['adresse_f'],
        $formationDetails[0]['contenu']
    );

    setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
    $frenchDate = strftime("%A %d %B %Y",strtotime($formation->getDateDebut()));
    $prestataire = getPrestataire($formation->getPrestataire());
    $adresse = getAdresse($formation->getAdresse());
    $adressString = $adresse[0]['numero_rue']." "
        .$adresse[0]['rue'].", "
        .$adresse[0]['ville']." "
        .$adresse[0]['code_postal'];
    $type = getTypeF($formation->getTypeFormation());
    $listeChefs = selectLeader($_SESSION['curr_user'][0]['id_s']);



    $data=json_encode(
        array(
            "salarie" => $_SESSION['curr_user'][0]['id_s'],
            "formationId" => $formation->getId()
        )
    );

    require ('View/pages/formationDetail.php');
}else{
    echo " F n'existe pas";
}






















?>