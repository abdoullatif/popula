<?php session_start();
include_once 'connect-bd.php';
$bdd = bdd ();

if (isset($_POST['commentaire'],$_POST['id_post']) && !empty($_POST['commentaire']) && !empty($_POST['id_post'])){
    if (isset($_SESSION['id']) && $_SESSION['id'] != ""){
        $coment = htmlspecialchars($_POST['commentaire']);
        $today = date('d-M-Y H:i:s');
        $id = htmlspecialchars($_POST['id_post']);
        $req = $bdd->prepare('INSERT INTO commentaire_forum (id_user,id_sujet,auteur,commentaire,comment_status,date_coment) VALUES (:id_user,:id_sujet,:auteur,:commentaire,:comment_status,:date_coment)');
        $req->execute(array('id_user'=>$_SESSION['id'], 'id_sujet'=>$id, 'auteur'=>$_SESSION['nom'], 'commentaire'=>$coment, 'comment_status'=>0, 'date_coment'=>$today));
        echo '<span class="text-success">Effectuer avec succes !</span>';
    }else {
        echo '<span class="text-danger">Desole vous n\'est pas connecter, Veuiller  vous connecter pour discuter !</span>';
    }
    
}else {
    echo '<span class="text-danger">Probleme veuiller ré-éssayer !</span>';
}