<?php
if (!isset($_POST['charge'])) {
    require 'Model/connect.php';
    require 'Model/PrestataireDAO.php';
    require 'Model/AdresseDAO.php';
    require 'corps/formation.php';
    require 'corps/salarie.php';
    require 'corps/functions.php';
}

if (!function_exists('upload')) {
    /**
     * Fonction d'upload de fichier image
     * @param $file
     * @return string
     *
     */
    function upload($file){

        $dossier = 'View/image_salarie/';

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
        if (!isset($erreur)){ //S'il n'y a pas d'erreur, on upload

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
    function makeSalarieById($id){
        $salarie = null;
        if ($datas = getUserById($id)) {
            foreach ($datas as $index) {
                $salarie = new Salarie(
                    $index['id_s'],
                    $index['nom'],
                    $index['prenom'],
                    $index['email'],
                    $image = '/View/image_salarie/'.$index['id_s'],
                    $index['identifiant'],
                    $index['password'],
                    $index['status'],
                    $index['credit'],
                    $index['nb_jour'],
                    $index['adresse_s']
                );
            }
            return $salarie;
        } else {
            return null;
        }
    }
}



if (!function_exists('getAdresse')) {
    /**
     * @param $id
     * @return array
     */
    function getAdresse($id){
        return getAdresseById($id);
    }
}


//SI un fichier est uploadé on s'en occupe ici
if (isset($_FILES['fileToUpload'])) {
    if ($_FILES['fileToUpload']['name'] !='')
        var_dump($_FILES['fileToUpload']);
    upload($_FILES['fileToUpload']);
}



//SI des données ont été insérées
if (isset($_POST['submit'])) {
    $erreur = checkRegex($_POST);
    if ($erreur == false) {
        $image = 'View/image_salarie/' . $_POST['id'] . '.jpeg';
        $dateForDb = date('Y-m-d H:i:00',strtotime($_POST['date']));
//ON GERE LES ADRESSES AVANT
        editSalarieAdress($_POST['id'], $_POST['adresse_ville'], $_POST['adresse_rue'], $_POST['adresse_numero'], $_POST['adr_cp']);
//ON MODIFIE LE SALARIE
        editSalarie(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['mail'],
            $_POST['identity'],
            $_POST['pass'],
            $_POST['rights'],
            $_POST['credit'],
            $_POST['nbJour']);

        header('Location: ' . BASE_URL . '/adminSalarieController?status=done');
    }
    else {
        $_SESSION['sEditError'] = $erreur;
        header('Location: ' . BASE_URL . '/adminSalarieController?status=fail');

    }
}
//GERER L4AFFICHAGE RETOUR ERREUR CHECKREGEX ! BONNE NUIT


if (isset($_GET['s'])) {
    $salarie = makeSalarieById($_GET['s']);
    var_dump($salarie);
    $adresse = getAdresse($salarie->getAdresse());
    $adressString = $adresse[0]['numero_rue'] . " "
        . $adresse[0]['rue'] . ", "
        . $adresse[0]['ville'] . " "
        . $adresse[0]['code_postal'];
    require('View/pages/salarieDetailAdmin.php');
}
?>