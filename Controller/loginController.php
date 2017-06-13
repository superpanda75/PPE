<?php
require 'Model/connect.php';
require 'Model/SalarieDAO.php';
require 'Model/AdresseDAO.php';
require 'Model/FormationDAO.php';
require 'Model/PrestataireDAO.php';

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

/**
 * @param $id
 * @param $cook
 * @return string
 */
function checkCookieKey($id,$cook){
    $user = getUserById($id);
    if (sizeof($user)< 1){
        return "probleme getUserById";
    }else{
        $key = sha1($user[0]['identifiant']).sha1($user[0]['password']);
        if(($cook != null) && ($cook == $key)) {
            $_SESSION['curr_user'] = $user;
            $_SESSION['connecte'] = true;
            header('location:accueil');
            return "cookie valide";
            die();
        }
    }
}

/**
 *
 */
function disconnect(){
    session_destroy();
    unset($_GET['a']);
    setcookie("rbMe", "", time()-3600);
    header('location:loginController');
}

if (isset($_GET['a']) && $_GET['a']=="logout"){
    disconnect();
}
/**
 * Dans un premier temps nous verifions si les champs ont bien été remplis
 */
if (!isset($_COOKIE['rbMe'])) {
    if (isset($_POST['identifiant']) && isset($_POST['password'])) {

        $identifiant = "^[a-zA-Z0-9_]{3,16}^";
        $password = "^[a-zA-Z0-9_\]\[?\/<~#`!@$%\^&*()+=}|:\";\',>{ -]{4,100}^";

        if (!preg_match($identifiant, $_POST['identifiant'])) {
            if (!preg_match($password, $_POST['password'])) {
                header('location:loginController');
            }
            header('location:loginController');
        }


        $user = connect($_POST['identifiant'], sha1($_POST['password']));

        /**
         * Ici nous verifions le resultat de notre requete connect(), si oui on fixe
         * les variables de session
         */
        if ($user) {
            $_SESSION['curr_user'] = $user;
            $_SESSION['connecte'] = true;
            if (isset($_POST['remember'])) {
                setcookie(
                    'rbMe',
                    $_SESSION['curr_user'][0]['id_s'].'-----'.sha1($_SESSION['curr_user'][0]['identifiant'].$_SESSION['curr_user'][0]['password']),
                    time()+3600*24*2,
                    '/',
                    'localhost',
                    false,
                    true);
            }
            header('location:accueil');
        } else {
            echo
            "<div class='row red'><div class='col-xs-12 col-sm-2 col-sm-offset-6'>Identifiants incorrects</div></div>";
        }
    }
}else{
    $auth = $_COOKIE['rbMe'];
    $auth = explode('-----',$auth);
    checkCookieKey($auth[0],$auth[1]);
}


    require('View/pages/login.php');

?>