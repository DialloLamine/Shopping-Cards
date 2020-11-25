<?php
    // model file call
   

    require_once("./view/header.php");
    require_once("pub.xml");



    $action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';
	
		# Ecrire ici le header de toutes pages HTML
		//require_once('./view/header.php');
		
	# Quelle action est demandée ?
	switch($action) {
		case 'login':	
            require_once("./controller/Controller.php");
                $controller = new Controller();
                $controller->invoke();
            break;
            case 'logout':	
                require_once("./controller/contr_logOut.php");
                    $controller = new  LogoutControlleur();
                    $controller->invoke();
                break;
        case 'add_cli':	
            require_once("./view/affichageAccueil.php");
            require_once("./model/ajout_new_Cli.php");
            add_newCli();
            getDataFromForm();
            
            break;
        case 'add_user':	
            require_once("./view/printForm.php");
            require_once("./model/add_user.php");
            insert_user_infos();
            insert_new_user(); 

            break;
        case 'fetch_data':	
            require_once("./model/fetch_clients.php");
                fetch_Cli();
            break;   
        case 'histo':	
            require_once("./model/table_THistorique.php");
            break;       
        default: # Par défaut, le contrôleur de l'accueil est sélectionné
            require_once('controller/Controller.php');
            	
			break;
	}
?>