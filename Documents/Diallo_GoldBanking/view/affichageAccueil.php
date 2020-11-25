<?php

    // model file call
    require_once("./model/ajout_new_cli.php");
 
    // create add_newCli function
    function add_newCli() {
?>
        <body>
        <div class="maindiv form_div">

                <form method="post" action="">    
                    <!-- method can be set POST for hiding values in URL-->
                    <h2>Form "Insert New Client"</h2>
                    
                    <label>Nom:</label>
                    <br />
                    <input class="input" type="text" name="name"  />
                    <br />
                    <label>Email:</label><br />        
                    <input class="input" type="text" name="email"  />
                    <br />
                    <label>Address:</label><br />
                    <input class="input" type="text" name="address"  />
                    <br />
                
                    <br />
                    <input class="submit" type="submit" name="submit" value="Ajouter" />	
                </form>
                
                <?php
                    if( ! empty($message) )
                    {
                        echo "<p>$message</p>";
                    }
                ?>
            </div>
         
<?php           
    }  // end of function add_new_cli() 
?>
	

