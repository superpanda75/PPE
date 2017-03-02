<?php
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';


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

$openFormations = openFormations();








require ('View/pages/formation.php')
?>
