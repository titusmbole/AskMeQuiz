<?php 
include "connection.php";
	function sanitize($data)
	 {
	 	// code...
	 	$data = trim($data);
	 	$data = htmlspecialchars($data);
	 	return $data;
	 } 


 include "admin_class.php";
 $crud = new Action();
 $action = sanitize($_GET['action']);

 switch ($action) {
 	case 'ask_question':

 		$q = $crud->add_question();
 		if ($q){
 			echo $q;
 		}

 	break;


	case 'create_account':

 		$q = $crud->create_account();
 		if ($q){
 			echo $q;
 		}

 	break;
 	case 'login_user':
 		$q = $crud->login_user();
 		if ($q){
 			echo $q;
 		}

 	break;
 	default:
 		// code...

 		break;
 }












?>