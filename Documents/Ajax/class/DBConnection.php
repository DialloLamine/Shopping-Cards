<?php
    /**
     * @package PHP Cart(DBConnection)
     *
     * @author @Diallo
     *
     * @email  diallo.lamine11958@gmail.com
     *   
     */
 
    // Database Connection 
    class DBConnection {
        private $_dbHostname = "localhost";
        private $_dbName = "4ipdw_diallo";
        private $_dbUsername = "root";
        private $_dbPassword = "";
        private $_con;
    
        public function __construct() {
            try {
                $this->_con = new PDO("mysql:host=$this->_dbHostname;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);    
                $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    
        }
        // return Connection
        public function returnConnection() {
            return $this->_con;
        }
    }?>