<?php
require 'model/SalarieDAO.php';
require 'model/AdresseDAO.php';
require 'model/CommentaireDAO.php';
require 'model/FormationDAO.php';
require 'model/PrestataireDAO.php';

/**
 * @param $login
 * @param $password
 * @return array
 *
 * Cette fonction permet de se connecter, elle prend en parametres le contenu des champs
 * de login (login/password) puis execute la requête dans le model via la fonction getUserByLogin
 */
function connect($login,$password){

    $user = getUserByLogin($login,$password);
    return $user;
}

function disconnect(){
    session_destroy();
    unset($_GET['a']);
    header('location:loginController');
}

if (isset($_GET['a']) && $_GET['a']=="logout"){
    disconnect();
}

/**
 * Dans un premier temps nous verifions si les champs ont bien été remplis
 */
if(isset($_POST['submit'])) {

    $user = connect($_POST['identifiant'], $_POST['password']);

    /**
     * Ici nous verifions le resultat de notre requete connect(), si oui on fixe
     * les variables de session
     */
    if ($user != null) {
        $_SESSION['curr_user'] = $user;
        $_SESSION['connecte'] = true;
        header('location:accueil');
    } else {
        echo
        "<div class='row red'><div class='col-xs-12 col-sm-2 col-sm-offset-6'>Identifiants incorrects</div></div>";
    }
}
require('View/pages/login.php');
?>