$(document).ready(function(){
    //
    badge();

    function badge(){
        $.post('fonction/notifiBadge.php',function(nmbre){
            //
            $('.nmbreNotifi').html(nmbre);
        });
    }
    setInterval(badge,1000);
});