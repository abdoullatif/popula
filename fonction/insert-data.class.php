<?php
include_once 'connect-bd.php';

class insertData {
    private $bdd;

    public function __construct (){
        $this->bdd = bdd ();
    }

    public function insertComent ($commentaire,$id_annonce){
        $req = $this->bdd->prepare('INSERT INTO commentaire_annonce(auteur,commentaire,date_creation,id_annonce,id_users) VALUES (:auteur,:commentaire,NOW(),:id_annonce,:id_users)');
        $req->execute(array('auteur' => $_SESSION['nom'], 'commentaire' => $commentaire, 'id_annonce' => $id_annonce, 'id_users' => $_SESSION['id']));
        //
    }

    public function insertComentProjet ($commentaire,$id_projet){
        $req = $this->bdd->prepare('INSERT INTO commentaire_projet(auteur,commentaire,date_creation,id_projet,id_users) VALUES (:auteur,:commentaire,NOW(),:id_projet,:id_users)');
        $req->execute(array('auteur' => $_SESSION['nom'], 'commentaire' => $commentaire, 'id_projet' => $id_projet, 'id_users' => $_SESSION['id']));
        //
    }

    public function insertMontantInvest ($montant,$id_projet){
        $req = $this->bdd->prepare('INSERT INTO investisseur_projet(profession,nom,prenom,montant,date_creation,id_projet,id_users) VALUES (:profession,:nom,:prenom,:montant,NOW(),:id_projet,:id_users)');
        $req->execute(array('profession' => $_SESSION['profession'], 'nom' => $_SESSION['nom'], 'prenom' => $_SESSION['prenom'], 'montant' => $montant, 'id_projet' => $id_projet, 'id_users' => $_SESSION['id']));
        //
    }


}