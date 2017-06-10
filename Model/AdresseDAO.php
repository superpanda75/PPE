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

/**
 * @param $idFormation
 * @param $adr_v
 * @param $adr_r
 * @param $adr_n
 * @param $adr_cp
 */
function editFormationAdress($idFormation,$adr_v,$adr_r,$adr_n,$adr_cp){
    $key = connector();
    //check if new adress already exists :
    $query = $key->prepare('SELECT id_a
                            FROM adresse
                            WHERE ville=:ville
                            AND rue=:rue
                            AND numero_rue=:num_rue
                            AND code_postal=:cp');
    $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
    $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
    $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
    $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
   $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount()>0) {
        $id = $result[0]['id_a'];
    }

    //SI ADRESSE N'EXISTE PAS

    if ($query->rowCount() == 0) {
        $query = $key->prepare('INSERT INTO adresse
                            (ville,rue,numero_rue,code_postal)
                            VALUES
                             (:ville,:rue,:num_rue,:cp)');
        $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
        $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
        $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
        $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
        $query->execute();

        //RECUPERATION DE L ID DE LA DERNIERE ADRESSE INSEREE
        $query = $key->prepare('SELECT id_a
                                FROM adresse
                                WHERE ville=:ville
                                AND rue=:rue
                                AND numero_rue=:num_rue
                                AND code_postal=:cp');
        $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
        $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
        $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
        $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $newAdressId = $result[0]['id_a'];


        //MISE A JOUR DANS LA TABLE FORMATION
        $query = $key->prepare('UPDATE formation
                               SET adresse_f=:new_adress
                               WHERE id_f =:idFormation');
        $query->bindParam(':new_adress', $newAdressId, PDO::PARAM_INT);
        $query->bindParam(':idFormation', $idFormation, PDO::PARAM_INT);
        $query->execute();
    } else {
        //SINON ON MODIFIE SEULEMENT LES INFOS DE L'ADRESSE
        $query = $key->prepare('UPDATE adresse
                                SET ville =:ville, rue =:rue, numero_rue =:num_rue, code_postal =:cp
                                WHERE id_a=:idAdresse
                                (:ville,:rue,:num_rue,:cp)
                                ');
        $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
        $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
        $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
        $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
        $query->bindParam(':idAdresse', $id, PDO::PARAM_INT);
        $query->execute();
    }

}

/**
 * @param $idSalarie
 * @param $adr_v
 * @param $adr_r
 * @param $adr_n
 * @param $adr_cp
 */
function editSalarieAdress($idSalarie,$adr_v,$adr_r,$adr_n,$adr_cp){
    $key = connector();
    //check if new adress already exists :
    $query = $key->prepare('SELECT id_a
                            FROM adresse
                            WHERE ville=:ville
                            AND rue=:rue
                            AND numero_rue=:num_rue
                            AND code_postal=:cp');
    $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
    $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
    $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
    $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount()>0) {
        $id = $result[0]['id_a'];
    }

    //SI ADRESSE N'EXISTE PAS
    if ($query->rowCount() == 0) {
        $query = $key->prepare('INSERT INTO adresse
                                (ville,rue,numero_rue,code_postal)
                                VALUES
                                (:ville,:rue,:num_rue,:cp)');
        $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
        $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
        $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
        $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
        $query->execute();

        //RECUPERATION DE L ID DE LA DERNIERE ADRESSE INSEREE
        $query = $key->prepare('SELECT id_a
                                FROM adresse
                                WHERE ville=:ville
                                AND rue=:rue
                                AND numero_rue=:num_rue
                                AND code_postal=:cp');
        $query->bindParam(':ville', $adr_v, PDO::PARAM_STR);
        $query->bindParam(':rue', $adr_r, PDO::PARAM_STR);
        $query->bindParam(':num_rue', $adr_n, PDO::PARAM_INT);
        $query->bindParam(':cp', $adr_cp, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $newAdressId = $result[0]['id_a'];


        //MISE A JOUR DANS LA TABLE Salarie
        $query = $key->prepare('UPDATE salarie
                                SET adresse_s=:new_adress
                                WHERE id_s =:idSalarie');
        $query->bindParam(':new_adress', $newAdressId, PDO::PARAM_INT);
        $query->bindParam(':idSalarie', $idSalarie, PDO::PARAM_INT);
        var_dump($query->execute());
    }
}
?>