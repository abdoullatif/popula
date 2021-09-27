// forum discusion 
$(document).ready(function(){
    //une fois la page charger !!
    /* commentaire et recuperation :) */
    var id_post = $('.id_post').val();
    recupComent();
    $('.discusions').submit(function(){
        var commentaire = $('.commentaire').val();
        var id_post = $('.id_post').val();

        $.post('fonction/send-coment.php',{commentaire:commentaire,id_post:id_post},function(donnee){
            //
            $('.commentaire').val('');
            $('.error').html(donnee);
            recupComent();
        });
        return false;
    });
    

    function recupComent(){
        $.post('fonction/recup-coment.php',{id_post:id_post},function(data){
            //
            $('.commentairePost').html(data);
        });
    }
    setInterval(recupComent,1000);
});