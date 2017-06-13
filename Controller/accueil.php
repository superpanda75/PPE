<?php

require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';

/**
 * fonction permettant de récupérer les trois formations les plus proches dans le temps
 * (éligibles à une demande de réservation)
 * @param $id
 * @return array
 */
function getNextFormations($id){
    $formations = getAvailableFormationsByUserId($id,3);
    return $formations;
}

/**Construit des objets formation issu de données de la bdd, et le insere dans un table, puis le retourne
 * @param array $formData
 * @return array
 */
function makeFormationsByData(Array $formData){
    $formationObjects = array();
    foreach($formData as $form){
        $formation = new Formation(
            $form['id_f'],
            $form['titre'],
            $form['cout'],
            $form['date_debut'],
            $form['duree'],
            $form['image'],
            $form['nb_place'],
            $form['type_f'],
            $form['prestataire_f'],
            $form['adresse_f'],
            $form['contenu']
        );
        array_push($formationObjects,$formation);
    }
    return $formationObjects;
}

/**Récupère le bon format de la date
 * @param $date
 * @return bool|string
 */
function makeTimeMonth($date){

    setlocale(LC_TIME, "fr_FR");
    $formatedMonth = date( 'M', strtotime( $date ));
    return $formatedMonth;
}

/**Récupère le bon format de la date
 * @param $date
 * @return bool|string
 */
function makeTimeDay($date){

    setlocale(LC_TIME, "fr_FR");
    $formatedDay = date( 'd', strtotime( $date ));
    return $formatedDay;
}

$formations = makeFormationsByData(getNextFormations($_SESSION['curr_user'][0]['id_s']));

require "View/pages/accueil.php";
?>