<?php
    include_once("./model/Model.php");
    include_once("./view/loggin.php");
    
    
    class Controller {
        public $model1;
        public function __construct()
            {
                $this->model = new Model();
            }
        public function invoke()
        {
            // it call the getlogin() function of model class and store the return value of this function
            // into the reslt variable.
            $reslt = $this->model->getlogin();     
            if($reslt == 'login')
            {
                $reslt = $this->model->getlogin();
                require_once("./view/header.php");
                echo "$reslt";
            }

    
        }
    }
?>