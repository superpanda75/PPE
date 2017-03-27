<?php
require 'Model/connect.php';
require 'corps/formation.php';
require 'corps/salarie.php';
require 'Model/FormationDAO.php';
require 'Model/ParticiperDAO.php';

if (isset($_POST['id'])){
    echo "ON EST BON !!";
    deleteParticiper($_POST['id']);
    die();
}

function makePendingFormationsInfos($idUser){
    return getPendingFormationsDatas($idUser);
}

$pendingFormDatas = makePendingFormationsInfos($_SESSION['curr_user'][0]['id_s']);
$formatedDatesPFD = $pendingFormDatas;

foreach ($formatedDatesPFD as &$index){
    $index['date_demande'] = date( 'd/m/Y à H:i', strtotime( $index['date_demande'] ) );
}

function deleteParticiper($idParticipation){
    deleteParticipation($idParticipation);
}
require ('View/pages/account.php')
?>