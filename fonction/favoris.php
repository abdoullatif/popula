<?php session_start();
include_once 'connect-bd.php';
$bdd = bdd();

if (isset($_POST['id_annonce']) and !empty($_POST['id_annonce'])){
    //
    if (isset($_SESSION['id'])){
        //
        $req1 = $bdd->prepare('SELECT * FROM favoris_annonce WHERE id_annonce = :id_annonce and id_user = :id_user');
        $req1->execute(array('id_annonce'=>$_POST['id_annonce'],'id_user'=>$_SESSION['id']));
        $donnee = $req1->fetch();
        if (!empty($donnee)){
            //
            if ($donnee['favoris_status'] == 0){
                //on fait un update
                $req2 = $bdd->prepare('UPDATE favoris_annonce SET favoris_status = 1 WHERE id_annonce = :id_annonce and id_user = :id_user');
                $req2->execute(array('id_annonce'=>$_POST['id_annonce'],'id_user'=>$_SESSION['id']));
                ?>
                <p>favoris ajouter ! </p>
                <?php
            } else if ($donnee['favoris_status'] == 1){
                //on fait encore un update pour enlever le favoris
                $req2 = $bdd->prepare('UPDATE favoris_annonce SET favoris_status = 0 WHERE id_annonce = :id_annonce and id_user = :id_user');
                $req2->execute(array('id_annonce'=>$_POST['id_annonce'],'id_user'=>$_SESSION['id']));
                ?>
                <p>favoris retirer ! </p>
                <?php
            }
        } else {
            //
            $req = $bdd->prepare('INSERT INTO favoris_annonce (id_annonce,id_user,favoris_status) VALUES (:id_annonce,:id_user,1)');
            $req->execute(array('id_annonce'=>$_POST['id_annonce'],'id_user'=>$_SESSION['id']));
            return "Ajouter aux favoris !";
        }
        
    }else {
        ?>
        <p>veuiller vous connecter pour ajouter a vos favoris !</p>
        <?php
    }
} else {
    ?>
    <p>Probleme veuiller ressaiyer !</p>
    <?php
}