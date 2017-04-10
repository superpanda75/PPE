<?php
ini_set('display_errors',1);
session_start();

define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));


if(isset($_SESSION['connecte'])){

	if(!isset($_GET['page']) || $_GET['page'] == "") {
		$_GET['page'] = "accueil";
	}
	else {
		if(!file_exists("Controller/".$_GET['page'].".php")) {
			$_GET['page'] = '404';
		}
	}
}
else{
	$_GET['page']='loginController';
}

if($_GET['page']!='adminFormController') {
	ob_start();
	include "Controller/" . $_GET['page'] . ".php";
	$contenu = ob_get_contents();
	ob_end_clean();
}


elseif($_GET['page']=='adminFormController'){
	require "Controller/adminFormController.php";
}
elseif($_GET['page']!='contactController' && $_GET['page']!='adminFormController'){
	require "View/pages/layout.php";
}

?>
