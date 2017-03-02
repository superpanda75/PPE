<?php

function getUserByLogin($login,$password){
    $key = new PDO('mysql:host=localhost;dbname=m2l','root','');
    $query= $key->prepare('SELECT * FROM salarie
                           WHERE (identifiant =:identifiant OR email=:email)
                           AND password=:password');
    $query->bindParam(':email',$login,PDO::PARAM_STR);
    $query->bindParam(':identifiant',$login,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


?>