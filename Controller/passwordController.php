<?php

require 'Model/SalarieDAO';

if(isset($_POST['email'])){
    $mail = $_POST['email'];
        if(EmailExist($mail)){
            //génération du token
            $token = str_random(60);
            //envoir de l'email
            mail($mail, 'Bonjour, une demande de mot de passe oublié a été effectuée',
                "Afin de modifier votre mot de passe, merci de copier/coller ceci dans le champ code sécu :    $token");
            insertToken($mail,$token);
        }


    }elseif($_POST['token']){
        if(TokenExists($mail,$_POST['token'])) {
            header('Location : '.BASE_URL.'/ChangePassword');

    }
}
/**
 * vérifie si l'email entré par l'utilisateur existe et protège l'entrée utilisateur
 * @param $mail
 * @return bool|string
 */
function EmailExist($mail){
    if (preg_match(FILTER_VALIDATE_EMAIL,$mail)) {
        $ifEmail = getEmail($mail);
        return (sizeof($ifEmail) > 0);
    }else{
        return "Format Email invalide";
    }
}

/**
 * vérifie que le jeton existe et protège l'entrée utilisateur
 * @param $email
 * @param $token
 * @return bool|string
 */
function TokenExists($email,$token){
    if (preg_match("^[a-zA-Z0-9_]{3,16}^",$token)) {
        $tok = checkToken($email, $token);
        return (sizeof($tok) > 0);
    }else{
        return "Erreur Token";
    }
}

/**
 * génère une chaine de caractère aléatoire, soit un jeton de modif mdp
 * @param $length
 * @return string
 */
function str_random($length){

    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)),0,$length);

}


if(isset($_POST['token'])) {


    require('View/pages/login.php');
}