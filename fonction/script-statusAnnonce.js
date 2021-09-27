$(document).ready(function(){
    //
    $('.statutA').click(function(){
        //
        var statut = $(this).attr("value");
        alert(statut);
    });

    function statusAnnonce (status){
        //
        $.post('fonction/statusAnnonce.php',{status:status},function(data){
            //
            $('.donnee').html(data);
        });
        return false;
    }
});