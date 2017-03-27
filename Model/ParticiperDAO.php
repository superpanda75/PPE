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

function getPendingFormationsDatas($idSalarie){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM formation f
                            JOIN participer p on p.id_formation = f.id_f
                            JOIN salarie s on s.id_s = p.id_validateur
                            WHERE id_salarie =:salarie
                            AND state = 1
                            ORDER BY date_demande ASC');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPendingStatus($idSalarie)
{
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM participer
                            WHERE id_salarie =:salarie
                            AND state = 1
                            ORDER BY date_demande ASC');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPendingFormations($idSalarie)
{
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM formation f
                            JOIN participer p on p.id_formation = f.id_f
                            WHERE id_salarie =:salarie
                            AND state = 1
                            ORDER BY date_demande ASC');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getValidators($idSalarie){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM salarie s
                            JOIN participer p ON p.id_validateur = s.id_s
                            AND p.id_salarie =:salarie
                            ORDER BY id_participation');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function deleteParticipation($idParticipation){
    $key = connector();

    $query = $key->prepare('DELETE FROM participer
                            WHERE id_participation=:participation');
    $query->bindParam(':participation', $idParticipation, PDO::PARAM_INT);
    return $query->execute();
}
?>