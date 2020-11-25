<?php

    include_once("./model/Connect_DB.php");
    class Model {
        public function getlogin()
        {
            // here goes some hardcoded values to simulate the database
            if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                if($_REQUEST['username']=='admin' && $_REQUEST['password']=='admin'){

                    $_SESSION['login']=$_POST['username'];
                    echo "Bienvenue ".$_REQUEST['username'];
                return $_REQUEST['username'];
                }
                else{
                return 'invalid user';
                }
            }
        }
    }
?>