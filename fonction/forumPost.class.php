<?php
include_once 'connect-bd.php';

class forumPostClass {
    private $id_forum;
    private $bdd;
    private $donnee;

    public function __construct (){
        $this->bdd = bdd ();
    }

    public function getSujet ($id){
        $this->id_forum = htmlspecialchars($id);
        $req = $this->bdd->prepare('SELECT * FROM sujetforum WHERE id = :id');
        $req->execute(array('id' => $this->id_forum));
        $this->donnee = $req->fetch();
        return $this->donnee;
    }

    public function setCommentStat ($id_comment){
        //
        $req1 = $this->bdd->query('UPDATE commentaire_forum SET comment_status = 1 WHERE id = \''.$id_comment.'\'');
        //$req1->execute(array('id_comment'=>$id_comment));
    }
} 