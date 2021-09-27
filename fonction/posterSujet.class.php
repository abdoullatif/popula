<?php
session_start();
include_once 'connect-bd.php';
class forumClass {
    private $titre;
    private $sujet;
    private $bdd;

    public function __construct ($titre,$sujet){
        $this->titre = $titre;
        $this->sujet = $sujet;
        $this->bdd = bdd ();
    }

    public function postSujet (){
        $today = date('d-M-Y H:i:s');
        $requet = $this->bdd->prepare('INSERT INTO sujetforum (id_user,auteur,titre,sujet,date_post) VALUES (:id_user,:auteur,:titre,:sujet,:date_post)');
        $requet->execute(array('id_user' => $_SESSION['id'],'auteur' => $_SESSION['nom'],'titre' => $this->titre, 'sujet' => $this->sujet,'date_post'=>$today));
    }
}