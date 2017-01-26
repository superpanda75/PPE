<?php

function getUserByLogin($login,$password){
    $user=array();
    #$key = new PDO('mysql:host=localhost;dbname=m2l','root','');
    $query = $GLOBALS['key']->prepare('SELECT * FROM salarie WHERE identifiant =:identifiant AND password=:password');
    #$query->bindValue(':email',$login,PDO::PARAM_STR);
    $query->bindValue(':identifiant',$login,PDO::PARAM_STR);
    $query->bindValue(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if($query->rowCount() == 1)
    {
        $user = $query->fetch();
    }
    return $user;
}


?>