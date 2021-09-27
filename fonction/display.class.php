<?php
include_once 'connect-bd.php';

Class display {
    private $bdd;

    public function __construct (){
        $this->bdd = bdd ();
    }

    //////////////////////////////////////////////////////////////////////////////////////

    // recuperation des annonce dans la base de donnee !

    public function getAll_annonce (){
        $requete2 = $this->bdd->query('SELECT * FROM annonce');
        return $requete2;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////
    // on recupere les image de chaque annonce !
    public function getImageAnnonce ($idAnnonce){
        $requete3 = $this->bdd->prepare('SELECT * FROM imageannonce WHERE id_annonce = :id');
        $requete3->execute(array('id' => $idAnnonce));
        $donnee = $requete3->fetch();
        return $donnee;
    }
    //Recuperation des image de projets
    public function getImageProjet ($idprojet){
        $requete4 = $this->bdd->prepare('SELECT * FROM imageprojet WHERE id_projet = :id');
        $requete4->execute(array('id' => $idprojet));
        $data = $requete4->fetch();
        return $data;
    }
    /////////////////////////////////////////////////on recupere l'annonce en fonction des categories !!!!

    public function getAnnonceCat ($immo) {
        // on passssssssssssss
        $requete1 = $this->bdd->query("SELECT * FROM annonce WHERE immobilier = '$immo' ");
        return $requete1;
    }

    /////////////////////////////////////////////////////ici on recupere en fonction de la transact #louer #bailler ...

    public function getAnnonceTransact ($transact){
        //
        $requete8 = $this->bdd->query("SELECT * FROM annonce WHERE transact = '$transact' ");
        return $requete8;
    }

    public function getAnnonceTransactandCat ($transact,$immo){
        //
        $requete8 = $this->bdd->query("SELECT * FROM annonce WHERE transact = '$transact' AND immobilier = '$immo' ");
        return $requete8;
    }

    /////////////////////////////////////////////////////////////////////////////////

    // on recupere l'annonce specifique pour l'afficher en grand !!!!!!!!!!!!

    public function getAnnonce ($id){
        // tout ce passe ici !!!!!!!!!
        $requete4 = $this->bdd->prepare('SELECT * FROM annonce WHERE id = :id');
        $requete4->execute(array('id' => $id));
        $donnees = $requete4->fetch();
        return $donnees;
    }


    // on recupere les image de chaque annonce !
    public function getNbrImg($idAnnonce){
        // on obtient le nomment d'image poster ici !!!!!!
        $requete5 = $this->bdd->prepare('SELECT COUNT(*) as nbrImg FROM imageannonce WHERE id_annonce = :id');
        $requete5->execute(array('id' => $idAnnonce));
        $don = $requete5->fetch();
        return $don['nbrImg'];
    }


    public function getAllImageAnnonce ($idAnnonce){
        $requete6 = $this->bdd->prepare('SELECT * FROM imageannonce WHERE id_annonce = :id');
        $requete6->execute(array('id' => $idAnnonce));
        return $requete6;
    }

    public function getUser($id_user){
        $requete7 = $this->bdd->prepare('SELECT * FROM users WHERE users.id = :id');
        $requete7->execute(array('id' => $id_user));
        $info = $requete7->fetch();
        return $info;
    }

    public function getUserInfo($id_user){
        $requete7 = $this->bdd->prepare('SELECT * FROM usersinfo WHERE usersinfo.id_users = :id');
        $requete7->execute(array('id' => $id_user));
        $info = $requete7->fetch();
        return $info;
    }

    //On recupere le nbre annonce !
    public function getNbrAnnonce($id_users){
        // on obtient le nombre d'annonce poster ici !!!!!!
        $requete8 = $this->bdd->prepare('SELECT COUNT(*) as nbrAnn FROM annonce WHERE id_users = :id_users');
        $requete8->execute(array('id_users' => $id_users));
        $data = $requete8->fetch();
        if(empty($data['nbrAnn'])){
            return 0;
        } else {
            return $data['nbrAnn'];
        }
    }

    //On recupere le nbre projet !
    public function getNbrProjet($id_users){
        // on obtient le nombre de projet ici !!!!!!
        $requete8 = $this->bdd->prepare('SELECT COUNT(*) as nbrPro FROM projet WHERE id_users = :id_users');
        $requete8->execute(array('id_users' => $id_users));
        $data = $requete8->fetch();
        if(empty($data['nbrPro'])){
            return 0;
        } else {
            return $data['nbrPro'];
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////

    public function getComentA ($id_annonce){
        //
        $req = $this->bdd->prepare('SELECT * FROM commentaire_annonce WHERE id_annonce = :id_annonce ORDER By id DESC');
        $req->execute(array('id_annonce' => $id_annonce));
        return $req;
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    /// les annonce poster par l'utilisateur
    public function getAnnonceUser ($id_user){
        //
        $requet = $this->bdd->prepare('SELECT * FROM annonce WHERE id_users = :id_users');
        $requet->execute(array('id_users' => $id_user));
        return $requet;
    }

    /// les projet poster par l'utilisateur
    public function getProjetUser ($id_user){
        //
        $requet = $this->bdd->prepare('SELECT * FROM projet WHERE id_users = :id_users');
        $requet->execute(array('id_users' => $id_user));
        return $requet;
    }


    //////////////////////////////////////////NOTIFICATION//////////////////////////////////////////////////

    public function getNotifi($id_users){
        $Notifi = $this->bdd->prepare('SELECT * FROM commentaire_forum WHERE comment_status = 0 and id_user = :id_users ORDER By id DESC');
        $Notifi->execute(array('id_users'=>$id_users));
        return $Notifi;
    }
    /////////////////////badge
    public function getNotifiBadge($id_usersB){
        $NotifiB = $this->bdd->query('SELECT COUNT(*) AS nmbre FROM commentaire_forum WHERE comment_status = 0 and id_user = \''.$id_usersB.'\'');
        return $NotifiB;
    }

    ////////////////////////// PROFILE ET INFO USER /////////////////////////////////////////////
    ////////////////Mes favories !!!!!!!!!!!!!!!!!!!!!
    public function getFav (){
        $fav = $this->bdd->query('SELECT * FROM favoris_annonce WHERE favoris_status = 1 and id_user = \''.$_SESSION['id'].'\' ');
        return $fav;
    }
    /////les annnce enregistrer en favoris 
    public function getAnnonceFav ($id_annonceFav){
        //
        $annonceFav = $this->bdd->prepare('SELECT * FROM annonce WHERE id = :id_annonceFav');
        $annonceFav->execute(array('id_annonceFav' => $id_annonceFav));
        return $annonceFav;
    }
}