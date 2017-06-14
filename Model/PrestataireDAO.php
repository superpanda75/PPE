<?php
/**
 * récupère un presta depuis son ID
 * @param $id
 * @return array
 */
function getPrestatireById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM prestataire WHERE id_p=:id_prestataire');
    $query->bindParam(':id_prestataire',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}

/**
 * récupère tout les presta
 * @return array
 */
function getAllPrestataire(){
    $key = connector();
    $query = $key->prepare('SELECT * FROM prestataire ORDER BY nom');
    $query->execute();
    $presta = $query->fetchAll(PDO::FETCH_ASSOC);

    return $presta;
}




?>