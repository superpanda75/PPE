<?php

/**
 * @param $login
 * @param $password
 * @return array
 */
function getLeaders($id){
    $key = new PDO('mysql:host=localhost;dbname=m2l','root','');
    $query= $key->prepare('SELECT *
                           FROM salarie sa
                           JOIN superieur su ON sa.id_s = su.id_c
                           AND su.id_s =9'); //remplacer 9 par ":id_salarie"
    $query->bindParam(':id_salarie',$id,PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getDemandeur($idUser){
    $key = connector();

    $query = $key->prepare('SELECT *
                            FROM formation f
                            JOIN participer p on p.id_formation = f.id_f
                            JOIN salarie s on s.id_s = p.id_salarie
                            WHERE id_validateur =:salarie
                            AND state = 1
                            ORDER BY date_demande ASC');
    $query->bindParam(':salarie', $idUser, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>