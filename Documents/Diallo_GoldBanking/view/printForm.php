<?php
    
    // model called
    require_once("./model/add_user.php");
        function insert_user_infos() {    
?>
        <body>
            <div class="maindiv form_div">

                <form method="post" action="">    
                    <!-- method can be set POST for hiding values in URL-->
                    <h2>Form Please Enter New User Infos...</h2>
                    
                    <label>Nom:</label>
                    <br />
                    <input class="input" type="text" name="username"  />
                    <br />
                    <label>Email:</label><br />        
                    <input class="input" type="text" name="emailuser"  />
                    <br />
                    <label>PASSWORD:</label><br />
                    <input class="input" type="password" name="password"  />
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
        </body>  
        </html>  
<?php                   
        }
        
?>