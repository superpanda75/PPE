<?php
if (!function_exists('getAllSalariesContact')) {
    /**
     * récupère tout les salariés excepté le salarié en question et l'admin
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

if (!function_exists('getUserById')) {

    /**
     * récupère les infos salarié depuis un id
     * @param $login
     * @param $password
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
     * récupère plusieurs users à partir d'un tableau d'id
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
     * récupère un user à partir d'un identifiant et un mot de pass // CONNEXION
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
     * Met à jour les crédits salariés
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
     * fonction de recherche salarié
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
     * Récupère tout les salarié
     * TODO:FONCTION A PROTEGER !!!!!!!
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
     * modifie un salarié
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


    if (!function_exists("getEmail")){
        /**
         * vérifie l'existence d'une adresse email dans la bdd
         * @param $mail
         * @return array
         */
        function getEmail($mail) {
            $pdo = connector();
            $requete = $pdo->prepare('SELECT email FROM salarie WHERE email =:mail');
            $requete->bindParam(":mail",$mail,PDO::PARAM_STR);
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    if (!function_exists("insertToken")){
        /**
         * insert le jeton de changement de mdp dans la bdd
         * @param $mail
         * @return array
         */
        function insertToken($mail,$token) {
            $pdo = connector();
            $requete = $pdo->prepare('INSERT INTO salarie (token) VALUES(:tok) WHERE email =:mail');
            $requete->bindParam(":tok",$token,PDO::PARAM_STR);
            $requete->bindParam(":mail",$mail,PDO::PARAM_STR);
            $requete->execute();
        }
    }

    if (!function_exists("checkToken")){
        /**
         * vérifie si un jeton est associé à une adresse email
         * @param $mail
         * @return array
         */
        function checkToken($mail,$token) {
            $pdo = connector();
            $requete = $pdo->prepare('SELECT :tok FROM salarie WHERE email =:mail');
            $requete->bindParam(":tok",$token,PDO::PARAM_STR);
            $requete->bindParam(":mail",$mail,PDO::PARAM_STR);
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
    }



    if (!function_exists("getTokenByUserId")){
        /**
         * @param $userId
         * @return array
         */
        function getTokenByUserId($userId) {
            $pdo = connector();
            $requete = $pdo->prepare('SELECT token FROM salarie WHERE id =:UserId');
            $requete->bindParam(":UserId",$userId,PDO::PARAM_INT);
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}


?>