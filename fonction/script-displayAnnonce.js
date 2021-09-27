$(document).ready(function(){
    //displayAnnonce ();
    var immo = $(this).attr("value");
    displayAnnoncelouer (immo);
    displayAnnoncevendre (immo);
    displayAnnoncebailler (immo);
    displayAnnoncecolocation (immo);

    
    $('.immo').click(function(){
        //
        var immo = $(this).attr("value");
        displayAnnoncelouer (immo);
        displayAnnoncevendre (immo);
        displayAnnoncebailler (immo);
        displayAnnoncecolocation (immo);
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

    //////////////////////////////////vendre
    $('.search-vendre').submit(function(){
        var adresse = $('.adresseV').val();
        var chambre = $('.chambreV').val();
        var salon = $('.salonV').val();
        var cuisine = $('.cuisineV').val();
        var toilette = $('.toiletteV').val();
        var budget= $('.budgetV').val();
        
        //alert(adresse +' '+ chambre +' '+ salon +' '+ cuisine +' '+toilette+' '+budget);

        $.post('fonction/searchBar.php',{adresse:adresse,chambre:chambre,salon:salon,cuisine:cuisine,toilette:toilette,budget:budget},function(data){
            //
            $('.postAnnonce').html(data);
        });
        return false;
    });

    //////////////////////////////////bailler
    $('.search-bailler').submit(function(){
        var adresse = $('.adresseB').val();
        var chambre = $('.chambreB').val();
        var salon = $('.salonB').val();
        var cuisine = $('.cuisineB').val();
        var toilette = $('.toiletteB').val();
        var budget= $('.budgetB').val();
        
        //alert(adresse +' '+ chambre +' '+ salon +' '+ cuisine +' '+toilette+' '+budget);

        $.post('fonction/searchBar.php',{adresse:adresse,chambre:chambre,salon:salon,cuisine:cuisine,toilette:toilette,budget:budget},function(data){
            //
            $('.postAnnonce').html(data);
        });
        return false;
    });

    //////////////////////////////////colocation
    $('.search-colocation').submit(function(){
        var adresse = $('.adresseC').val();
        var chambre = $('.chambreC').val();
        var salon = $('.salonC').val();
        var cuisine = $('.cuisineC').val();
        var toilette = $('.toiletteC').val();
        var budget= $('.budgetC').val();
        
        //alert(adresse +' '+ chambre +' '+ salon +' '+ cuisine +' '+toilette+' '+budget);

        $.post('fonction/searchBar.php',{adresse:adresse,chambre:chambre,salon:salon,cuisine:cuisine,toilette:toilette,budget:budget},function(data){
            //
            $('.postAnnonce').html(data);
        });
        return false;
    });




    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function displayAnnoncelouer (immo){
        $.post('fonction/vuAnnoncelouer.php',{immo:immo},function(data){
            //
            $('.postAnnoncelouer').html(data);
        });
    }

    function displayAnnoncevendre (immo){
        $.post('fonction/vuAnnoncevendre.php',{immo:immo},function(data){
            //
            $('.postAnnoncevendre').html(data);
        });
    }

    function displayAnnoncebailler (immo){
        $.post('fonction/vuAnnoncebailler.php',{immo:immo},function(data){
            //
            $('.postAnnoncebailler').html(data);
        });
    }
    function displayAnnoncecolocation (immo){
        $.post('fonction/vuAnnoncecolocation.php',{immo:immo},function(data){
            //
            $('.postAnnoncecolocation').html(data);
        });
    }
    //setInterval(displayAnnoncevendre,1000);
});