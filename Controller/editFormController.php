<?php
if (!isset($_POST['charge'])) {
    require 'Model/connect.php';
    require 'Model/PrestataireDAO.php';
    require 'Model/AdresseDAO.php';
    require 'Model/FormationDAO.php';
    require 'corps/formation.php';
}

if (!function_exists('upload')) {
    /**
     * @param $file
     * @return string
     *
     */
    function upload($file)
    {
        $dossier = 'View/image_formation/';
        if (file_exists($dossier . $_POST['id'] . '.jpeg')) {
            unlink($dossier . $_POST['id'] . '.jpeg');
        }
        $taille_maxi = 250000000;
        $taille = filesize($file['tmp_name']);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($file['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg';
        }
        if ($taille > $taille_maxi) {
            $erreur = 'Le fichier est trop gros...';
        }
        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strval($_POST['id']).'.jpeg';

            return (move_uploaded_file($file['tmp_name'], $dossier . $fichier)); //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        } else {
            return $erreur;
        }
    }
}

if (!function_exists('makeFormationById')) {
    /**
     * @param $id
     * @return Formation|null
     *
     * retourne un onjet de type formation à partir d'un id;
     */
    function makeFormationById($id)
    {
        if ($datas = getFormationById($id)) {
            foreach ($datas as $index) {
                $formation = new Formation(
                    $index['id_f'],
                    $index['titre'],
                    $index['cout'],
                    $index['date_debut']= date( 'd-m-Y H:i', strtotime( $index['date_debut'] )),
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

//SI un fichier est uploadé on s'en occupe ici
if (isset($_FILES['fileToUpload'])) {
    upload($_FILES['fileToUpload']);
}

//SI des données ont été insérées
if (isset($_POST['submit'])){
    $image = 'View/image_formation/'.$_POST['id'].'.jpeg';
    $dateForDb = date('Y-m-d H:i:00',strtotime($_POST['date']));
    var_dump($dateForDb);
    //ON GERE LES ADRESSES AVANT
    editFormationAdress($_POST['id'],$_POST['adresse_ville'],$_POST['adresse_rue'],$_POST['adresse_numero'],$_POST['adresse_cp']);
    //ON MODIFIE LA FORMATION
    editFormation($_POST['id'],$_POST['titre'],$image,$_POST['cout'],$dateForDb,
                  $_POST['duree'],$_POST['place'],$_POST['type'],
                  $_POST['contenu'],$_POST['presta']);
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
    //listes déroulantes
    $formationTypes = getFormationTypes();
    $presta = getAllPrestataire();


    require('View/pages/formationDetailAdmin.php');
}else{

}


?>