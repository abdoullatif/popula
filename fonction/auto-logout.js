$(document).ready(function(){
    //une fois connecter le compte a rebout commence
    logout();
    function logout(){
        $.post('fonction/auto-logout.php',function(data){
            //
            $('.msg').html(data);
        });
    }

    setInterval(logout,600000);
});