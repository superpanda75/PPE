<?php

function checkInscription($idSalarie,$idValidateur,$idFormation){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM participer
                            WHERE id_salarie =:salarie
                            AND id_validateur =:validateur
                            AND id_formation =:formation');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->bindParam(':validateur', $idValidateur, PDO::PARAM_INT);
    $query->bindParam(':formation', $idFormation, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

}


function addDemande($idSalarie,$idValidateur,$idFormation){
    $key = connector();
    $dateIns = date("Y-m-d H:i:s");
    $state = 1;


    $query = $key->prepare("INSERT INTO participer (id_formation,id_salarie,id_validateur,state,date_demande)
                                      VALUES (:formation,:salarie,:validateur,:state, :dateIns)");
    $query->bindValue(':formation', $idFormation, PDO::PARAM_INT);
    $query->bindValue(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->bindValue(':validateur', $idValidateur, PDO::PARAM_INT);
    $query->bindValue(':state', $state, PDO::PARAM_INT);
    $query->bindValue(':dateIns', $dateIns);
    $query->execute();

    $query->fetchAll(PDO::FETCH_ASSOC);
}
?>