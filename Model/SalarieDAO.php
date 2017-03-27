<?php

/**
 * @param $login
 * @param $password
 * @return array
 */
function getUserById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM salarie WHERE id_s=:id_salarie');
    $query->bindParam(':id_salarie',$id,PDO::PARAM_INT);
    $query->execute();
    $salarie = $query->fetchAll(PDO::FETCH_ASSOC);

    return $salarie;
}

function getUserByLogin($login,$password){
    $key = connector();
    $query= $key->prepare('SELECT * FROM salarie
                           WHERE (identifiant =:identifiant OR email=:email)
                           AND password=:password');
    $query->bindParam(':email',$login,PDO::PARAM_STR);
    $query->bindParam(':identifiant',$login,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function  updateCredit($idUser,$amount){
    $key = connector();
    $query= $key->prepare('UPDATE Salarie
                           SET credit = :amount
                           WHERE id_s= :idUser');
    $query->bindParam(':amount',$amount,PDO::PARAM_INT);
    $query->bindParam(':idUser',$idUser,PDO::PARAM_INT);
    $query->execute();
}




?>