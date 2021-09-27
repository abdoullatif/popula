//forum Poste/sujet
$(document).ready(function(){
    recupSujet();
    $('.formulaireForum').submit(function(){
        var titre = $('.titre-sujet').val();
        var sujet = $('.sujet').val();
        
        $.post('fonction/send-sujet.php',{titre:titre,sujet:sujet},function(donnees){
            //code exec
            $('.titre-sujet').val('');
            $('.sujet').val('');
            $('.errorpost').html(donnees);
            recupSujet();
        });
    return false;
    });
    
    function recupSujet(){
        $.post('fonction/recup-sujet.php',function(data){
            $('.forum-sujet').html(data);
        });
    }
    setInterval(recupSujet,1000);

});

/*
//forum Commentaire
$(document).ready(function(){
    $('.formulaireForumCommentaire').submit(function(){
        var nom = $('').val();
        var nom = $('').val();

        
    });
});
*/


