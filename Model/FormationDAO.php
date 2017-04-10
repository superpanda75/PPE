<?php
/**
 * @return array
 */
function getAllFormations(){
    $key = connector();
    $query = $key->prepare('SELECT * FROM formation');
    $query->execute();
    $formations = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formations;
}

/**
 * @param $id
 * @return array
 */
function getFormationById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM formation WHERE id_f=:id_formation');
    $query->bindParam(':id_formation',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}

/**
 * @param $id
 * @return array
 */
function getAvailableFormationsByUserId($id)
{
    $key = connector();

    $query = $key->prepare('SELECT * FROM formation fo
                            WHERE fo.id_f NOT IN (
                                                  SELECT id_formation
							                      FROM participer pa
							                      WHERE pa.id_salarie =:id_salarie
							                      AND pa.state != 4
							                      )
							ORDER BY date_debut ASC
                            LIMIT 20		                      ');
    $query->bindParam(':id_salarie', $id, PDO::PARAM_INT);
    $query->execute();
    $availabeFormations = $query->fetchAll(PDO::FETCH_ASSOC);

        return $availabeFormations;

}

/**
 * @param $id
 * @return array
 */
function getTypeById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM type_formation WHERE id_t=:id_type');
    $query->bindParam(':id_type',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}

/**
 * @return array
 */
function getFormationTypes(){
    $key = connector();
    $query = $key->prepare('SELECT * FROM type_formation');
    $query->execute();
    $formationTypes = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formationTypes;
}
?>