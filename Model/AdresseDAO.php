<?php
/**
 * @param $id
 * @return array
 */
function getAdresseById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM adresse WHERE id_a=:id_adresse');
    $query->bindParam(':id_adresse',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}





?>