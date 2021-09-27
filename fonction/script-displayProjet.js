$(document).ready(function(){
    alert("bonjour");
    //displayProjet ();
    var immo = $(this).attr("value");
    displayProjetInvestir (immo);
    displayProjetPret (immo);
    displayProjetDons (immo);

    
    $('.immo').click(function(){
        //
        var immo = $(this).attr("value");
        displayProjetInvestir (immo);
        displayProjetPret (immo);
        displayProjetDons (immo);
        //        
        return false; 
    });

    // bare de recherche !!!!!!!!!!!!!

    //////////////////////////////////louer
    $('.search-louer').submit(function(){
        var adresse = $('.adresseL').val();
        var chambre = $('.chambreL').val();
        var salon = $('.salonL').val();
        var cuisine = $('.cuisineL').val();
        var toilette = $('.toiletteL').val();
        var budget= $('.budgetL').val();
        
        //alert(adresse +' '+ chambre +' '+ salon +' '+ cuisine +' '+toilette+' '+budget);

        $.post('fonction/searchBar.php',{adresse:adresse,chambre:chambre,salon:salon,cuisine:cuisine,toilette:toilette,budget:budget},function(data){
            //
            $('.postAnnonce').html(data);
        });
        return false;
    });


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function displayProjetInvestir (immo){
        $.post('fonction/vuProjetinvestir.php',{immo:immo},function(data){
            //
            $('.postProjetInvestir').html(data);
        });
    }

    function displayProjetPret (immo){
        $.post('fonction/vuProjetpret.php',{immo:immo},function(data){
            //
            $('.postProjetPres').html(data);
        });
    }

    function displayProjetDons (immo){
        $.post('fonction/vuProjetdons.php',{immo:immo},function(data){
            //
            $('.postProjetDons').html(data);
        });
    }
    //setInterval(displayAnnoncevendre,1000);
});