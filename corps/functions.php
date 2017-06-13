<?php

/**
 * @param $value
 * @param $type
 * @return int
 *
 * vérifie chaque valeur entrée en POST avant d'accéder aux requêtes
 */
function checkRegex($post)
{
    $email = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
    $identifiant = "^[a-zA-Z0-9_]{3,16}^";
    $password = "^[a-zA-Z0-9_\]\[?\/<~#`!@$%\^&*()+=}|:\";\',>{ -]{4,20}^";
    $nombres = "^[0-9]{1,10}^";
    $cp = "^[0-9A-Za-z]^";
    $alphabetique = "^([a-z]+[,.]?[ ]?|[a-z]+['-]?)+$^";
    $file = "/\b(\.jpg|\.JPG|\.png|\.PNG|\.gif|\.GIF)\b/";
    extract($post);



    if (preg_match($nombres, $id)) {
        if (preg_match($alphabetique, $nom)) {
            if (preg_match($alphabetique, $prenom)) {
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    if (preg_match($identifiant, $identity)) {
                        if (preg_match($password, $pass)) {
                            if (preg_match($nombres, $rights)) {
                                if (preg_match($nombres, $credit)) {
                                    if (preg_match($nombres, $nbJour)) {
                                        if (preg_match($alphabetique, $adresse_ville)) {
                                            if (preg_match($alphabetique, $adresse_rue)) {
                                                if (preg_match($nombres, $adresse_numero)) {
                                                    if (preg_match($cp, $adr_cp)) {
                                                        $erreur = false;
                                                    } else {
                                                        $erreur = 'Le champ code postal n\'est pas valide';
                                                    }
                                                }else{
                                                    $erreur = 'Le champ numéro de rue n\'est pas valide';
                                                }
                                            } else {
                                                $erreur = 'Le champ de l\'adresse n\'est pas valide';
                                            }
                                        } else {
                                            $erreur = 'Le champ de la ville n\'est pas valide';
                                        }
                                    } else {
                                        $erreur = 'Le champ du nom de jour n\'est pas valideé';
                                    }
                                } else {
                                    $erreur = 'Le champ credit n\'est pas valide';
                                }
                            } else {
                                $erreur = 'Le champ lié aux droits n\'est pas valide';
                            }
                        } else {
                            $erreur = 'Le champ mot de passe n\'est pas valide';
                        }
                    } else {
                        $erreur = 'Le champ identifiant n\'est pas valide';
                    }
                } else {
                    $erreur = 'Le champ e-mail n\'est pas valide';
                }
            } else {
                $erreur = 'Le champ prénom n\'est pas valide';
            }
        } else {
            $erreur = 'Le champ nom n\'est pas valide';
        }
    } else {
        $erreur = 'Le champ Id n\'est pas valide';
    }
    return $erreur;
}





?>