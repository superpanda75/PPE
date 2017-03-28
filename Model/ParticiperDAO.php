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

function getValidatedFormationsDatas($idSalarie){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM formation f
                            JOIN participer p on p.id_formation = f.id_f
                            JOIN salarie s on s.id_s = p.id_validateur
                            WHERE id_salarie =:salarie
                            AND state = 2 OR state = 4
                            ORDER BY date_demande ASC');
    $query->bindParam(':salarie', $idSalarie, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getDoneFormationsDatas($idSalarie){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM formation f
                            JOIN participer p on p.id_formation = f.id_f
                            JOIN salarie s on s.id_s = p.id_validateur
                            WHERE id_salarie =:salarie
                            AND state = 3
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

function  validateFormation($idParticipation, $status = 2){
    $dateIns = date("Y-m-d H:i:s");
    $key = connector();
    $query= $key->prepare('UPDATE participer
                           SET state = :state , date_validation = :dateValidation
                           WHERE id_participation=:idParticipation');
    $query->bindParam(':dateValidation',$dateIns);
    $query->bindParam(':idParticipation',$idParticipation,PDO::PARAM_INT);
    $query->bindParam(':state',$status,PDO::PARAM_INT);
    return $query->execute();
}
/*
 * UPDATE salarie s, participer p
                           SET s.credit = s.credit + (
                                                   SELECT cout
                                                   FROM formation
                                                   WHERE id_f =:idFormation
                                                      )
                           WHERE  s.id_s = p.id_salarie
                           AND p.id_salarie =:idUser
                           AND s.id_s =:idUser
 */
function  declineFormation($idParticiper){
    $key = connector();
    $query= $key->prepare('SELECT f.id_f, f.cout, f.duree, p.id_salarie
                           FROM formation f, participer p
                           WHERE f.id_f = p.id_formation
                           AND p.id_participation = :id
                           ');
    $query->bindParam(':id',$idParticiper,PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    //MODIFICATION DE LA TABLE SALARIE
    var_dump($result);
    $query= $key->prepare('UPDATE salarie s
                           SET s.credit = s.credit +:cout,
                           s.nb_jour = s.nb_jour +:duree
                           WHERE  s.id_s = :demandeur
                           ');
    $query->bindParam(':cout',$result[0]['cout'],PDO::PARAM_INT);
    $query->bindParam(':duree',$result[0]['duree'],PDO::PARAM_INT);
    $query->bindParam(':demandeur',$result[0]['id_salarie'],PDO::PARAM_INT);
    return $query->execute();
}

?>