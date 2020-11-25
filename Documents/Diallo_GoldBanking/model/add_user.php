
<?php

include ("Connect_DB.php");

function insert_new_user() {
    try 
    {
        //Establishing Connection with Server
        $connection =  mysqli_connect("localhost","root","","4ipdw_diallo");
    
        if(isset($_POST['submit']))
        {
            //Fetching variables of the form which travels in URL
            
            $name = $_POST['username'];
            $email = $_POST['emailuser'];
            $pwd = $_POST['password'];

            // pour checker
            $sql = "select name_user from tuser";
            $user = $_POST['username'];
            
 // verification s'il n'existe pas 
            if($sql != $user)
            {
     //Insert Query of SQL--------------------------------------
                $query = "insert into tuser(name_user, email_user, pwd_user, add_date)
                values ('$name', '$email', '$pwd', now())";
            
                $query = mysqli_query($connection, $query);
                $b = mysqli_commit($connection);
                
                if( ! $b ) throw new Exception("commit failed");
                $message = "<br/><br/><span>New User'sname is: '$name' and inserted successfully...!!</span>";
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
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    catch (Exception $e) 
    {
        $message = 'Caught exception: ' . $e->getMessage() . "\n";
    }   
}          
?>