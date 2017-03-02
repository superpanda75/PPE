<?php
require "model/key.php";
session_start();

define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));


if(isset($_SESSION['connecte'])){

	if(!isset($_GET['page']) || $_GET['page'] == "") {
		$_GET['page'] = "accueil";
		echo "test1";
	}
	else {
		echo "test2";
		if(!file_exists("controller/".$_GET['page'].".php")) {
			$_GET['page'] = '404';
			echo "test3";
		}
	}
}

else{
	$_GET['page']='loginController';
	echo "test4";
}
ob_start();
	include "Controller/".$_GET['page'].".php";
	$contenu = ob_get_contents();
ob_end_clean();
require "view/pages/layout.php";


?>
