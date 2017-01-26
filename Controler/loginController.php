<?php
require('View/pages/login.php');

if(isset($_POST['submit'])){

        $user = connect($_POST['identifiant'],$_POST['password']);

        $_SESSION['curr_user'] = $user;
        $_SESSION['connecte'] = 'true';
    }
    else{
        //TODO : Faire le leveling pour retrouver si l'id ou le mdp est incorrect
        echo
        "<div class='row red'><div class='col-xs-12 col-sm-2 col-sm-offset-6'>Identifiants incorrects</div></div>";
    }


?>