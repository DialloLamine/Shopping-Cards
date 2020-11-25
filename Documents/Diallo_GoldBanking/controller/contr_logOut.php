<?php 

include_once("./model/Model.php");
include_once("./view/loggin.php");


class LogoutControlleur{

	public function __construct() {
	
	}
		
	public function invoke(){	
		
		$_SESSION = array();
		
		
		session_destroy();

		
		//header("Location: index.php?action=login"); 
		//die();
	}
	
} 
?>