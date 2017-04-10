<?php
if (!isset($_POST['charge'])) {
    require 'Model/connect.php';
    require 'Model/PrestataireDAO.php';
    require 'Model/AdresseDAO.php';
    require 'Model/FormationDAO.php';
    require 'corps/formation.php';
}

if (isset($_POST['submit'])){
    var_dump($_POST);
    die();
}
/**
 * @param $id
 * @return Formation|null
 *
 * retourne un onjet de type formation à partir d'un id;
 */
if (!function_exists('makeFormationById')) {
    function makeFormationById($id)
    {
        if ($datas = getFormationById($id)) {
            foreach ($datas as $index) {
                $formation = new Formation($index['id_f'],
                    $index['titre'],
                    $index['cout'],
                    $index['date_debut'],
                    $index['duree'],
                    $index['image'],
                    $index['nb_place'],
                    $index['type_f'],
                    $index['prestataire_f'],
                    $index['adresse_f'],
                    $index['contenu']
                );
            }
            return $formation;
        } else {
            return null;
        }
    }
}
if (!function_exists('getTypeF')) {
    /**
     * @param $id
     * @return array
     */
    function getTypeF($id)
    {
        return getTypeById($id);
    }
}
if (!function_exists('getPrestataire')) {
    /**
     * @param $id
     * @return array
     */
    function getPrestataire($id)
    {
        return getPrestatireById($id);
    }
}
if (!function_exists('getAdresse')) {
    /**
     * @param $id
     * @return array
     */
    function getAdresse($id)
    {
        return getAdresseById($id);
    }
}
if (isset($_GET['f'])){
    $formation = makeFormationById($_GET['f']);
    $type = getTypeF($formation->getTypeFormation());
    $prestataire = getPrestataire($formation->getPrestataire());
    $adresse = getAdresse($formation->getAdresse());
    $adressString = $adresse[0]['numero_rue']." "
        .$adresse[0]['rue'].", "
        .$adresse[0]['ville']." "
        .$adresse[0]['code_postal'];
    $formationTypes = getFormationTypes();
    $presta = getAllPrestataire();

    var_dump($formation);

    require('View/pages/formationDetailAdmin.php');
}else{
    ?><script>alert('une erreur est surevenue')</script><?php
}


?>