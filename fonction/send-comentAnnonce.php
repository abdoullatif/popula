<?php session_start ();
include_once 'connect-bd.php';
include_once 'insert-data.class.php';
$bdd = bdd ();
$id_annonce = (int) htmlspecialchars($_POST['id_annonce']);
if (isset($id_annonce,$_POST['commentaire']) && !empty($id_annonce) && !empty($_POST['commentaire'])){
    // si tout est bon !
    $comment = new insertData ();
    $comment->insertComent($_POST['commentaire'], $id_annonce);
    ////
    echo '<span class="text-success">Effectuer !</span>';
} else {
    ////
    echo '<span class="text-danger">Probleme veuiller ressayer !</span>';
}