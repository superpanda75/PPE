<?php
// Appel d'une variable globale pour utiliser dans les fonctions
global $key;
try {
    $key = new PDO('mysql:host=localhost;dbname=m2l;','root','');
}
catch(Exception $e){
    die('Erreur de connection à la base de donnée');
}
?>