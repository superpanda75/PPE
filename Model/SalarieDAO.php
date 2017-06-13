<?php
if (!function_exists('getAllSalariesContact')) {
    /**
     * @param $currentUser
     * @return array
     */
    function getAllSalariesContact($currentUser){
        $link = connector();
        $result = $link->prepare('SELECT *
                                FROM salarie
                                WHERE id_s != 3
                                AND id_s !=:currentUser
                                ORDER BY nom ASC');
        $result->bindParam(':currentUser',$currentUser,PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
/**
 * @param $login
 * @param $password
 * @return array
 */
if (!function_exists('getUserById')) {
    /**
     * @param $id
     * @return array
     */
    function getUserById($id)
    {
        $key = connector();
        $query = $key->prepare('SELECT * FROM salarie WHERE id_s=:id_salarie');
        $query->bindParam(':id_salarie', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('getManyUsersById')){
    /**
     * @param array $Users
     * @return array
     */
    function getManyUsersById(array $Users)
    {
        //construction requête => cela évite de multipliquer les accès à la base via connector().
        //on se connecte qu'une seule fois !
        $query = "SELECT * FROM salarie WHERE id_s IN(";
        foreach ($Users as $user){
            $query .= $user['id_s'].",";
        }
        $query = substr($query, 0, -1);
        $query.= ")";

        //Execution de la requete
        $link = connector();
        $result = $link->query($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('getUserByLogin')) {
    /**
     * @param $login
     * @param $password
     * @return array
     */
    function getUserByLogin($login, $password)
    {
        $key = connector();
        $query = $key->prepare('SELECT * FROM salarie
                           WHERE (identifiant =:identifiant OR email=:email)
                           AND password=:password');
        $query->bindParam(':email', $login, PDO::PARAM_STR);
        $query->bindParam(':identifiant', $login, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('updateCredit')) {
    /**
     * @param $idUser
     * @param $amount
     * @return bool
     */
    function  updateCredit($idUser, $amount)
    {
        $key = connector();
        $query = $key->prepare('UPDATE Salarie
                           SET credit = :amount
                           WHERE id_s= :idUser');
        $query->bindParam(':amount', $amount, PDO::PARAM_INT);
        $query->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        return $query->execute();
    }
}

if (!function_exists('searchSalarie')) {
    /**
     * @param $string
     * @return array
     */
    function searchSalarie($string)
    {
        $link = connector();
//recherche des résultats dans la base de données
        $result = $link->query('SELECT *
                                FROM salarie
                                WHERE nom LIKE \'%' . $string . '%\'
                                OR prenom LIKE \'%' . $string . '%\'
                                ');

        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
if (!function_exists('getAllSalaries')) {
    /**
     * @return array
     */
    function getAllSalaries()
    {
        $link = connector();
        $result = $link->query('SELECT *
                            FROM salarie
                            WHERE id_s != 3
                            ORDER BY nom ASC');
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('editSalarie')) {
    /**
     * @param $idSalarie
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $identifiant
     * @param $password
     * @param $status
     * @param $credit
     * @param $nbJour
     * @return bool
     */
    function editSalarie($idSalarie, $nom, $prenom, $mail, $identifiant, $password, $status, $credit, $nbJour)
    {
        $key = connector();
        $query = $key->prepare('UPDATE salarie
                                SET nom =:new_nom,
                                    prenom =:new_prenom,
                                    email=:new_mail,
                                    identifiant =:new_identifiant,
                                    password=:new_password,
                                    status=:new_status,
                                    credit=:new_credit,
                                    nb_jour=:new_nbJour
                            WHERE id_s=:idSalarie
                             ');
        $query->bindParam(':new_nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':new_prenom', $prenom, PDO::PARAM_STR);
        $query->bindParam(':new_mail', $mail, PDO::PARAM_STR);
        $query->bindParam(':new_identifiant', $identifiant, PDO::PARAM_STR);
        $query->bindParam(':new_password', $password, PDO::PARAM_STR);
        $query->bindParam(':new_status', $status, PDO::PARAM_INT);
        $query->bindParam(':new_credit', $credit, PDO::PARAM_INT);
        $query->bindParam(':new_nbJour', $nbJour, PDO::PARAM_INT);
        $query->bindParam(':idSalarie', $idSalarie, PDO::PARAM_INT);
        return $query->execute();
    }


}


?>