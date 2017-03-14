<?php
function getPrestatireById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM prestataire WHERE id_p=:id_prestataire');
    $query->bindParam(':id_prestataire',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}





?>