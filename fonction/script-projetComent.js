// commentaire projet !!!!!!!!
$(document).ready(function(){
    //alert('bin big bang');
    var id_projet = $('.id_projet').val();
    //alert(id_projet);
    //
    recupComentP();
    recuplistInvestP();
    //
    $('.comment').submit(function(){
        //alert('big bang boum');
       var id_projet = $('.id_projet').val();
       var commentaire = $('.commentaire').val();

       // Ajax
       $.post('fonction/send-comentProjet.php', {id_projet:id_projet,commentaire:commentaire},function(donnee){
           //retour vue !
           $('.commentaire').val('');
           $('.error').html(donnee);
           recupComentP();
           //
       });
       return false;

    });
    //
    $('.investir').submit(function(){
        //alert('big bang boum');
       var id_projet = $('.id_projet').val();
       var montant = $('.montant').val();

       // Ajax
       $.post('fonction/send-montantProjet.php', {id_projet:id_projet,montant:montant},function(donnee){
           //retour vue !
           $('.montant').val('');
           $('.error').html(donnee);
           recuplistInvestP();
           //
       });
       return false;

    });

    // recupere la liste des investissement !
    function recuplistInvestP(){
        $.post('fonction/recup-investProjet.php',{id_projet:id_projet},function(data){
            //
            $('.list-invest').html(data);
        });
    }

    // recupere les commentaire !
    function recupComentP(){
        $.post('fonction/recup-comentProjet.php',{id_projet:id_projet},function(data){
            //
            $('.commentaireProjet').html(data);
        });
    }
    // recharge automatique setInterval
    setInterval(recupComentA,1000);
});