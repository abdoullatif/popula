$(document).ready(function(){
    // notification
    recupNotif();

    function recupNotif(){
        $.post('fonction/forumNotifi.php',function(note){
            //
            $('.notification').html(note);
        });
    }
    //
    setInterval(recupNotif,1000);
});