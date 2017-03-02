<?php

require 'Model/connect.php';


function getAllFormations(){
    $key = new PDO('mysql:host=localhost;dbname=m2l','root','password');
    $query = $key->prepare('SELECT * FROM formation');
    $query->execute();
    $formations = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formations;
}

function getFormationById($id){
    $key = new PDO('mysql:host=localhost;dbname=m2l','root','password');
    $query = $key->prepare('SELECT * FROM formation WHERE id_f=:id_formation');
    $query->bindParam(':id_formation',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}
function getAvailableFormationsByUserId($id)
{
    $key = connector();

    $query = $key->prepare('SELECT * FROM formation fo
                            WHERE fo.id_f NOT IN (
                                                  SELECT id_formation
							                      FROM participer pa
							                      WHERE pa.id_salarie =:id_salarie
							                      )
							ORDER BY date_debut ASC
                            LIMIT 20		                      ');
    $query->bindParam(':id_salarie', $id, PDO::PARAM_INT);
    $query->execute();
    $availabeFormations = $query->fetchAll(PDO::FETCH_ASSOC);

        return $availabeFormations;

}
?>