<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Table_THistorique</title>
    
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>

	$(document).ready(function()
	{
		var tr,td,nb_cols, cell_index;
		var nb_td = $("div#editor td").length;
		var nb_rows = $("div#editor tr").length;
		var nb_cols = nb_td/(nb_rows-1); // "-1" à cause des "th"
		console.log("nb cols=" + nb_cols);

		$("div#editor td").keydown(function(e)
		{
			cell_index = $(this).index();
			console.log("cell_index=" + cell_index);
			switch(e.keyCode) {
			case 37 : //left arrow
				if(cell_index==0)
				{
					$(this).parent().prev().children("td:last-child").focus();
				}
				else
				{
					$(this).prev("td").focus();
				}
				break;
			case 39 : //right arrow
				if(cell_index==nb_cols-1)
				{
					$(this).parent().next().children("td").eq(0).focus();
				}
				else
				{
					$(this).next("td").focus();
				}
				break;
			case 40 : //down arrow
				$(this).parent().next().children("td").eq(cell_index).focus();
				break;
			case 38 : //up arrow
				$(this).parent().prev().children("td").eq(cell_index).focus();
				break;
			case 113 : // F2 clicked
				$(this).children().focus();
				break;
			}
		});

		$("div#editor td").focusin(function()
		{
			$(this).css("outline","solid steelblue 3px");
			//animate({'borderWidth': '3px','borderColor': '#f37736'},100);
		});

		$("div#editor td").focusout(function()
		{
			// anim
			$(this).css("outline","");
			
			// total à recalculer à chaque focus out
           // some_each_row()
			compute_total_turnover();
            compte_total_credit();
            compte_total_dedit();
           compute_total_sold_courant();
		});
		
		// à calculer au chargement de la page 
       // some_each_row()
		compute_total_turnover();
        compte_total_credit();
        compte_total_dedit();
        compute_total_sold_courant();
	});
	
	function compute_total_turnover()
	{
		// mettre à jour les additions
		var somme = 0 ;
		$.each( $("input.turnover"), function( k, e ) {
			// alert(k + ":" + e );
			somme += +e.value;
			//console.log(somme);
		});
        
		$("#total_turnover").html(somme);
	}
	
        
	function compute_total_sold_courant()
    {   
        var sold_courant = 0;
        var total_credit = 0;
        var total_debit = 0;
            $.each( $("input.turnover_credit"), function( k, e ) {
                    total_credit += +e.value;
            });
           sold_courant += total_credit;
        
            $.each( $("input.turnover_debit"), function( k, e ) {

				 total_debit += +e.value;
            });
            sold_courant -= total_debit;
            
            $("span#sold_turnover").html(sold_courant);
	}
    
     function compte_total_dedit()
	{
		var somme_debit = 0;
		
		$.each( $("input.turnover_debit"), function( k, e ) {

				somme_debit += +e.value;
		});
        
		$("span#total_dedit").html(somme_debit);
	}
        
        
    function compte_total_credit()
	{
		var somme_credit = 0;
		
		$.each( $("input.turnover_credit"), function( k, e ) {

				somme_credit += +e.value;
		});
        
		$("span#total_credit").html(somme_credit);
	}
    
        
        
	</script>
</head>
<body class="bdy">

	<div id="editor">
        <table id="tab_res" class="tab_histo">
            
            <caption><h1>Table THistoriques</h1></caption>
            
            <tr>
                <th>Date</th>
                <th>D&eacute;bit</th>
                <th>Cr&eacute;dit</th>
                <th class="solden">Solde</th>        
            </tr>
            
            <tr class="lignes">
                <td tabindex="0"><input type="date" value="10-02-2020" /></td>
                <td tabindex="-1">
                    <input type="text" value="50" class="turnover_debit" />&nbsp;€ 
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                 <td tabindex="-1">
                    <input type="text" value="50" class="turnover_credit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                <td tabindex="-1">
                     
                </td>    
            </tr>
            
            <tr class="lignes">
                <td tabindex="0"><input type="date" value="10-02-2020" /></td>
                <td tabindex="-1">
                    <input type="text" value="50" class="turnover_debit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                 <td tabindex="-1">
                    <input type="text" value=" " class="turnover_credit" />&nbsp;€
                    <input type="integer" value=" " class="turnover" />&nbsp;
                </td>
                <td tabindex="-1">
                   
                </td>    
            </tr>
            
            <tr class="lignes">
                <td tabindex="0"><input type="date" value="10-02-2020" /></td>
               <td tabindex="-1">
                    <input type="text" value="50" class="turnover_debit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                 <td tabindex="-1">
                    <input type="text" value="150" class="turnover_credit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                <td tabindex="-1">
                   
                </td>    
            </tr>
            
            <tr class="lignes">
                <td tabindex="0"><input type="date" value="10-02-2020" /></td>
                <td tabindex="-1">
                    <input type="text" value="150" class="turnover_debit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                 <td tabindex="-1">
                    <input type="text" value="50" class="turnover_credit" />&nbsp;€
                    <input type="integer" value="BE70 4058 4576 4839" class="turnover" />&nbsp;
                </td>
                <td tabindex="-1">
                    <div class="pieds_sold"> <span id="sold_turnover">0</span> €.</div>
                </td>    
            </tr>
            
            
	   </table>
    </div>

    </br>
    
    
	<!-- <div class="pieds_debit">Total Débit : <span id="result_pos">0</span> €.</div>  --->
    <div class="pieds_debit">Total Débit de ma methode  : <span id="total_dedit">0</span> €.</div>
    <div class="pieds_credit">Total Crébit de ma methode : <span id="total_credit">0</span> €.</div>
    <div class="pieds_sold">Solde Actuel : <span id="sold_turnover">0</span> €.</div>
    
    

</body>
</html>



































