<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>On Line Banking</title>
   

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
    
    <script src="views/js/functions.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


   <link rel="stylesheet" href="./view/style.css">
   
  </head>
  <body style="text-align: -webkit-center">
    
		<nav>
		
			<table>
				<tr>
				<td>
				<a href="index.php"><img src="view/images/logo.jpg" width="100px"/></a>
				</td>
				<td>
					<form method="post" action="?action=index">
						<label>
								<input type="text" placeholder="Rechercher" name="options"/>
								<input type="submit" value="Rechercher" name="recherche"/>
						</label>
					</form>
				</td>
			<?php  
				//var_dump($_SESSION['login']);
				if(empty($_SESSION['login']))
				{
			?>				
			<td>			
				<div id="navbar-cart" class="navbar-collapse collapse">
			      <ul class="nav navbar-nav">



				<!---Ajout client-->
				<li>
						<a href="index.php?action=add_cli" class="btn" data-placement="bottom">
							<span >Add Client</span>
						</a>
					</li>

                     <!---Ajout User-->
                     <li>
					<a href="index.php?action=add_user" class="btn" data-placement="bottom">
						<span >Add User</span>
					</a>
					</li>

                     <!---Fetch Uses DATA-->
                     <li>
					<a href="index.php?action=fetch_data" class="btn" data-placement="bottom">
						<span >Fetch Users Data</span>
					</a>
					</li>

					 <!---get ur table story-->
                     <li>
					<a href="index.php?action=histo" class="btn" data-placement="bottom">
						<span >Historique</span>
					</a>
					</li>



                  <!---Se connecter-->
			       <li>
					<a href="index.php?action=login" class="btn" data-placement="bottom">
						<span class="glyphicon glyphicon-user"></span>
						<span >Se connecter</span>
					</a>
					</li>

					
			      </ul>
			    </div>
			</td>
			<?php } ?>
			<?php  if(!empty($_SESSION['login'] )){ ?>				
			<td>
			


				<div id="navbar-cart" class="navbar-collapse collapse">
			      <ul class="nav navbar-nav">


					



			       <li>
					<a href="index.php?action=logout" class="btn" data-placement="bottom">
						<span class="glyphicon glyphicon-log-out"></span>
						<span >Se deconnecter</span>
					</a>
					</li>
			      </ul>
			    </div>
			</td>

			<?php } ?>


				</tr>
			</table>
		</nav>
		</br>
		 <div id="popover_content_wrapper" style="display: none">
    		<span id="cart_details"></span>
    			<div align="right">
     				<a href="index.php" class="btn btn-primary" id="check_out_cart">
     					<span class="glyphicon glyphicon-shopping-cart"></span> Paiement
     				</a>
     				<a href="#" class="btn btn-default" id="clear_cart">
     					<span class="glyphicon glyphicon-trash"></span> Vider
     				</a>
    			</div>
   		</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel" heigth="100px">
<?php

    /*
    la publicité 
    
    */

    // chemin local vers le fichier XML 
    $xml_file_url = "pub.xml";


    $adv_o = simplexml_load_file($xml_file_url); // objet contenant les données


        $affi ="<ol class='carousel-indicators'>
        <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
        <li data-target='#myCarousel' data-slide-to='1'></li>
        <li data-target='#myCarousel' data-slide-to='2'></li>
    </ol>";

    //Fortnite_Chapter2_Season2.jpg
    //Affichage de la premiere donnee du fichier XML afin de bien construire le carousel 
        $affi .="<div class='carousel-inner'>
                    <div class='item active'>
                    <img src='view/images/".$adv_o->pub->image[0]."' width='600px' onclick=\"location.href='".$adv_o->pub->url[0]."'\" style='cursor: pointer' alt='Belfius Bank'>
                    <p>".$adv_o->pub->texte[0]."</p>
                    </div>";

                    
    //Utilisation d'une boucle afin de parcourir 
    for($i=1;$i<count($adv_o->pub->image);$i++){

        $affi .="<div class='item'>
                    <img src='view/images/".$adv_o ->pub->image[$i]."' width='500px' onclick=\"location.href='".$adv_o->pub->url[$i]."'\" style='cursor: pointer' alt='On Line Banking'>
                    <p>".$adv_o->pub->texte[$i]."</p>
                </div>";
        
    }
    $affi .="</div>";
    echo $affi;	

?>

    <!-- Left and right controls -->
    <!-- Propieté qui permet d'affcher des controls pour la manipulation des publicités -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script> <!-- the jQuery simpletip plugin -->
<script type="text/javascript" src="script.js"></script> <!-- our script.js file -->