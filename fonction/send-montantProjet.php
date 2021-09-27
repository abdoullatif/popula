<?php session_start ();
include_once 'connect-bd.php';
include_once 'insert-data.class.php';
$bdd = bdd ();
$id_projet = (int) htmlspecialchars($_POST['id_projet']);
if (isset($id_projet,$_POST['montant']) && !empty($id_projet) && !empty($_POST['montant'])){
    // si tout est bon !
    $comment = new insertData ();
    $comment->insertMontantInvest($_POST['montant'], $id_projet);
    ////
    echo '<span class="text-success">Effectuer !</span>';
} else {
    ////
    echo '<span class="text-danger">Probleme veuiller ressayer !</span>';
}