// commentaire annonce !!!!!!!!
$(document).ready(function(){
    var id_annonce = $('.id_annonce').val();
    //
    recupComentA();
    $('.coment').submit(function(){
       var id_annonce = $('.id_annonce').val();
       var commentaire = $('.commentaire').val();

       // Ajax
       $.post('fonction/send-comentAnnonce.php', {id_annonce:id_annonce,commentaire:commentaire},function(donnee){
           //retour vue !
           $('.commentaire').val('');
           $('.error').html(donnee);
           recupComentA();
           //
       });
       return false;

    });

    // recupere les commentaire !
    function recupComentA(){
        $.post('fonction/recup-comentAnnonce.php',{id_annonce:id_annonce},function(data){
            //
            $('.commentaireAnnonce').html(data);
        });
    }
    // recharge automatique setInterval
    setInterval(recupComentA,1000);
});