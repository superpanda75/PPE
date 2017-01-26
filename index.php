<?php
require_once "Controler/functions.php";
require_once "model/key.php";

define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));

if(isset($_SESSION['connecte']) && ($_SESSION['connecte']) == 'true'){
	if(!isset($_GET['page']) || $_GET['page'] == "") {
		$_GET['page'] = "accueil";
	}
	else {
		if(!file_exists("controler/".$_GET['page'].".php")) {
			$_GET['page'] = '404';
		}
	}
}
else{
	$_GET['page']='loginController';
}
ob_start();
	include "Controler/".$_GET['page'].".php";
	$contenu = ob_get_contents();
ob_end_clean();
require "view/pages/layout.php";


?>
