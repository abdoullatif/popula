<?php
include_once 'connect-bd.php';

Class displayProjet {
    private $bdd;

    public function __construct (){
        $this->bdd = bdd ();
    }

    //////////////////////////////////////////////////////////////////////////////////////

    // recuperation des annonce dans la base de donnee !

    public function getAll_projet (){
        $requete2 = $this->bdd->query('SELECT * FROM projet');
        return $requete2;
    }


    // on recupere les image de chaque annonce !

    public function getImageProjet ($idprojet){
        $requete3 = $this->bdd->prepare('SELECT * FROM imageprojet WHERE id_projet = :id');
        $requete3->execute(array('id' => $idprojet));
        $donnee = $requete3->fetch();
        return $donnee;
    }

    /////////////////////////////////////////////////on recupere l'annonce en fonction des categories !!!!

    public function getProjetCat ($immo) {
        // on passe
        $requete1 = $this->bdd->query("SELECT * FROM projet WHERE financement = '$immo' ");
        return $requete1;
    }

    /////////////////////////////////////////////////////ici on recupere en fonction de la transact #louer #bailler ...

    public function getProjetTransact ($transact){
        //
        $requete8 = $this->bdd->query("SELECT * FROM projet WHERE financement = '$transact' ");
        return $requete8;
    }

    public function getProjetTransactandCat ($transact,$immo){
        //
        $requete8 = $this->bdd->query("SELECT * FROM projet WHERE financement = '$transact' AND immobilier = '$immo' ");
        return $requete8;
    }

    /////////////////////////////////////////////////////////////////////////////////

    // on recupere l'annonce specifique pour l'afficher en grand !!!!!!!!!!!!

    public function getProjet ($id){
        // tout ce passe ici !!!!!!!!!
        $requete4 = $this->bdd->prepare('SELECT * FROM projet WHERE id = :id');
        $requete4->execute(array('id' => $id));
        $donnees = $requete4->fetch();
        return $donnees;
    }


    // on recupere les image de chaque annonce !
    public function getNbrImg($idprojet){
        // on obtient le nomment d'image poster ici !!!!!!
        $requete5 = $this->bdd->prepare('SELECT COUNT(*) as nbrImg FROM imageprojet WHERE id_projet = :id');
        $requete5->execute(array('id' => $idprojet));
        $don = $requete5->fetch();
        return $don['nbrImg'];
    }


    public function getAllImageProjet ($idprojet){
        $requete6 = $this->bdd->prepare('SELECT * FROM imageprojet WHERE id_projet = :id');
        $requete6->execute(array('id' => $idprojet));
        return $requete6;
    }

    public function getlistinvestP ($idprojet){
        $requete10 = $this->bdd->prepare('SELECT * FROM investisseur_projet WHERE id_projet = :id');
        $requete10->execute(array('id' => $idprojet));
        return $requete10;
    }

    public function getFichierProjet ($idprojet){
        $requete9 = $this->bdd->prepare('SELECT * FROM fichierprojet WHERE id_projet = :id ORDER BY id DESC LIMIT 1');
        $requete9->execute(array('id' => $idprojet));
        return $requete9;
    }

    public function getTotalInvest ($idprojet){
        $requete9 = $this->bdd->prepare('SELECT SUM(montant) AS montant_total FROM investisseur_projet WHERE id_projet = :id');
        $requete9->execute(array('id' => $idprojet));
        return $requete9;
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

    ////////////////////////////////////
    
    public function getComentP ($id_projet){
        //
        $req = $this->bdd->prepare('SELECT * FROM commentaire_projet WHERE id_projet = :id_projet ORDER By id DESC');
        $req->execute(array('id_projet' => $id_projet));
        return $req;
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    /// les annonce poster par l'utilisateur
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
        $fav = $this->bdd->query('SELECT * FROM favoris_projet WHERE favoris_status = 1 and id_user = \''.$_SESSION['id'].'\' ');
        return $fav;
    }
    /////les annnce enregistrer en favoris 
    public function getProjetFav ($id_projetFav){
        //
        $projetFav = $this->bdd->prepare('SELECT * FROM projet WHERE id = :id_projetFav');
        $projetFav->execute(array('id_projetFav' => $id_projetFav));
        return $projetFav;
    }
}