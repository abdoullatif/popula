<?php session_start ();
include_once 'fonction/connect-bd.php';
$bdd = bdd ();
// verification de L'utilisateur est conneecter !
$verif_connect = $bdd->prepare('SELECT * FROM users WHERE email = :email');
$verif_connect->execute(array('email'=>$_SESSION['email']));
$verif = $verif_connect->fetch();
if ($verif['connect_status'] == 0){
    header('Location: Acceuil.php');
} else {
    $connected = $bdd->query('UPDATE users SET connect_status = 0 WHERE email = \''.$_SESSION['email'].'\'');
}
session_unset();
session_destroy();
header('Location: Acceuil.php');
