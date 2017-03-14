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


?>