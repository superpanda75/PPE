<?php
/**
 * récupère les 40 formations à venir les plus proche dans le temps à partir d'aujourd'hui
 * @return array
 */
function getAllFormations(){
    $key = connector();
    $query = $key->prepare('SELECT * FROM formation
                            WHERE date_debut > NOW()
                            ORDER BY date_debut ASC
                            LIMIT 40');
    $query->execute();
    $formations = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formations;
}

/**
 * retourne les données formation
 * @param $id
 * @return array
 */
function getFormationById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM formation WHERE id_f=:id_formation');
    $query->bindParam(':id_formation',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}

/**
 * renvoie les formation disponibles auxquelles le salarié n'a jamais participé
 * @param $id
 * @return array
 */
function getAvailableFormationsByUserId($id,$limit)
{
    $key = connector();

    $query = $key->prepare('SELECT * FROM formation fo
                            WHERE fo.id_f NOT IN (
                                                  SELECT id_formation
							                      FROM participer pa
							                      WHERE pa.id_salarie =:id_salarie
							                      AND pa.state != 4
							                      )
							ORDER BY date_debut ASC
                            LIMIT :limit		                      ');
    $query->bindParam(':id_salarie', $id, PDO::PARAM_INT);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->execute();
    $availabeFormations = $query->fetchAll(PDO::FETCH_ASSOC);

    return $availabeFormations;

}

/**
 * retourne les types de formation et son libellé
 * @param $id
 * @return array
 */
function getTypeById($id){
    $key = connector();
    $query = $key->prepare('SELECT * FROM type_formation WHERE id_t=:id_type');
    $query->bindParam(':id_type',$id,PDO::PARAM_INT);
    $query->execute();
    $formation = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formation;
}

/**
 * retourne le type d'une formation en fonction de l'id de la formation
 * @return array
 */
function getFormationTypes(){
    $key = connector();
    $query = $key->prepare('SELECT * FROM type_formation ORDER BY type ');
    $query->execute();
    $formationTypes = $query->fetchAll(PDO::FETCH_ASSOC);

    return $formationTypes;
}

/**
 * modifie une formation en fonction de ses paramètres
 * @param $id
 * @param $titre
 * @param $image
 * @param $cout
 * @param $date
 * @param $duree
 * @param $place
 * @param $type
 * @param $contenu
 * @param $presta
 */
function editFormation($id,$titre,$image,$cout,$date,$duree,$place,$type,$contenu,$presta){
    $key= connector();
    $query = $key->prepare('UPDATE formation
                                SET titre =:new_titre,
                                    image =:new_image,
                                    duree=:new_duree,
                                    cout =:new_cout,
                                    date_debut=:new_date,
                                    nb_place=:new_nb,
                                    contenu=:new_contenu,
                                    prestataire_f=:new_presta,
                                    type_f =:new_type
                            WHERE id_f=:idFormation ');
    $query->bindParam(':idFormation', $id, PDO::PARAM_INT);
    $query->bindParam(':new_titre', $titre, PDO::PARAM_STR);
    $query->bindParam(':new_image', $image, PDO::PARAM_STR);
    $query->bindParam(':new_duree', $duree, PDO::PARAM_INT);
    $query->bindParam(':new_cout', $cout, PDO::PARAM_INT);
    $query->bindParam(':new_date', $date);
    $query->bindParam(':new_nb', $place, PDO::PARAM_INT);
    $query->bindParam(':new_contenu', $contenu, PDO::PARAM_STR);
    $query->bindParam(':new_presta', $presta, PDO::PARAM_INT);
    $query->bindParam(':new_type', $type, PDO::PARAM_INT);
    $query->execute();
}
if (!function_exists('search')) {
    /**
     * fonction de recherche de formations dans la bdd
     * @param $string
     * @return array
     */
    function search($string)
    {
        $link = connector();
//recherche des résultats dans la base de données
        $result = $link->query('SELECT *
                          FROM formation
                          WHERE titre LIKE \'%' . $string . '%\'
                          LIMIT 15');
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>