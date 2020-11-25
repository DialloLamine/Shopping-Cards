<?php

// verifier le message d'erreur en cas d'echec!!!!!
    require_once("Connect_DB.php"); 
    

    function getDataFromForm() { // en @paramm Champ_name
        try{
                // se connecter a la base de donnee
                $connection = mysqli_connect("localhost", "root","", "4ipdw_diallo");
            
            if(isset($_POST['submit'])) {   // dans index
                // recuperation des donnees de la table
                // $ch0 ==> c'est ID auto incremente
                $ch1 = $_POST['name']; // passer en @parammm
                $ch2 = $_POST['email'];
                $ch3 = $_POST['address'];
                
                // chaque client est associe a un email qui doit rester unique dans DB
                $sql = "select email_cli from tclient where email_cli='$ch2'";
                //mysqli_num_rows($sql);
                $client = $_POST['email'];

                if($client != $sql){ // 
                    
                    // insert data
                    
                    $insert = "insert into TClient (name_cli, email_cli, address_cli, add_date) 
                    values('$ch1','$ch2','$ch3', now())";
                
                    // execution
                    $query = mysqli_query($connection, $insert);
                    $b = mysqli_commit($connection);
                    if($query)
                        echo "Data inserted sucessfully";

                    // verification si l'insertion c'est bien passer
                    $b = mysqli_commit($connection);
                    if( ! $b ) throw new Exception("commit failed");
                    $message = "<br/><br/><span>New Costumer '$ch1' inserted successfully...!!</span>";
                }
                else {
                    $message = "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
                    // insert failed       
                    echo "Inserted failed";
                }   
                //Closing Connection with Server
                mysqli_close($connection);
            }    
        }        
        catch (Exception $e) {
            $message = 'Caught exception: ' . $e->getMessage() . "\n";
        } 
    }    
?>       
