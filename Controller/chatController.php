<?php
    require 'Model/connect.php';
    require 'Model/SalarieDAO.php';
    require 'Model/chatDAO.php';
    require 'corps/salarie.php';

// appel à la fonction si q est bien envoyé en ajax (q étant la chaine tapée par l'utilisateur dans le champ
// de recherche
function makeSalariesContact($currentUser)
{
    if ($datas = getAllSalariesContact($currentUser)) {
        $Salaries = array();
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
                $index['nb_jour']
            );
            array_push($Salaries,$salarie);
        }
        return $Salaries;
    } else {
        return null;
    }
}


$expediteur = intval($_SESSION['curr_user'][0]['id_s']);
$contacts = makeSalariesContact($expediteur);

if (isset($_POST) && isset($_POST['msg'])){
    $destinataire = $_POST['des'];
    $message = $_POST['msg'];
    $date = date("Y-m-d H:i:s");
    #send($expediteur,$destinataire,$message,$date);

die();
}

    require 'View/pages/chat.php';

?>