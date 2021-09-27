<?php session_start();
include_once 'display.class.php';

$notifi = new display ();
$List_notifi = $notifi->getNotifiBadge($_SESSION['id']);
$nmbre = $List_notifi->fetch();
// cherche et afficher les notification du sujet poster par l'auteur
if (!empty($List_notifi)){
    // si tout les commentaire n'ont pas ete vu !
    if($nmbre['nmbre'] > 0){
        //
        echo $nmbre['nmbre'];
    }
} else {
    // script html (pas de notification)
}
?>