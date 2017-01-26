<?php
//DAOs
require 'model/SalarieDAO.php';
require 'model/AdresseDAO.php';
require 'model/CommentaireDAO.php';
require 'model/FormationDAO.php';
require 'model/PrestataireDAO.php';
//============================================User Functions==================================================//
function connect($login,$password){

    $user = getUserByLogin($login,$password);
    return $user;
}

/*function disconnect (){
    unset($_SESSION['connecte']);
    unset($_SESSION['curr_user']);
}*/

/*function conOrDisc(){
    if ($_SESSION['connecte'] == 'true'){
        echo "<li><a href='index.php?page=loginController.php'>Login</a></li>
                <li><a href='#'>Register</a></li>";
    }*/

?>