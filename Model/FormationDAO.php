<?php
try {
    $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=m2l","root","");;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=m2l","root","");

function Get_formation (){
    global $pdo;
    #Cette requete permet compter le nombre de formations par id
    $requete = $pdo->query('SELECT * FROM formation');
    $formation = $requete->fetch();

    return $formation['COUNT(id_f)'];
}

function Get_nb_formation (){
       global $pdo;
    #Cette requete permet compter le nombre de formations par id
    $requete = $pdo->query('SELECT COUNT(id_f) as nbFormation FROM formation');
    $nb_formation = $requete->fetch();

    return $nb_formation['nbFormation'];
}

function Get_formation_titre ($id){

        global $pdo;
    #Cette requete permet de ressortir le titre des formations
    $req = $pdo->query("SELECT titre  FROM formation WHERE id_f=".$id);
    $titre_formation = $req->fetch();

    return $titre_formation['titre'];
}


function Get_formation_contenu ($id){
        global $pdo;
    #Cette requete permet de ressortir le contenu des formations
    $req = $pdo->query("SELECT contenu  FROM formation WHERE id_f=".$id);
    $contenu_formation = $req->fetch();

    return $contenu_formation['contenu'];
}