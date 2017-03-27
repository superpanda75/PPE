<?php
// Appel d'une variable globale pour utiliser dans les fonctions
global $key;
try {
    $key = new PDO("mysql:host=haithemboq123456.mysql.db;dbname=haithemboq123456;","haithemboq123456","Shaco1994");
}
catch(Exception $e){
    die('Erreur de connection � la base de donn�e');
}
?>