<?php session_start ();
include_once 'connect-bd.php';
include_once 'insert-data.class.php';
$bdd = bdd ();
$id_projet = (int) htmlspecialchars($_POST['id_projet']);
if (isset($id_projet,$_POST['commentaire']) && !empty($id_projet) && !empty($_POST['commentaire'])){
    // si tout est bon !
    $comment = new insertData ();
    $comment->insertComentProjet($_POST['commentaire'], $id_projet);
    ////
    echo '<span class="text-success">Effectuer !</span>';
} else {
    ////
    echo '<span class="text-danger">Probleme veuiller ressayer !</span>';
}