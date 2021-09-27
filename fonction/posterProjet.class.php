<?php session_start ();
include_once 'fonction/connect-bd.php';

class posterProjet {

    private $pays;
    private $ville;
    private $immobilier;
    private $cout;
    private $devise;
    private $financement;
    private $nom;
    private $descrp;
    private $delai;
    private $businessPlan;
    private $image;
    private $porteur;
    private $id_projet;
    private $id_rapport;
    private $bdd;

    public function __construct ($pays,$ville,$immobilier,$cout,$devise,$financement,$nom,$descrp,$delai,$businessPlan,$image,$porteur){

        $pays=htmlspecialchars($pays);
        $ville=htmlspecialchars($ville);
        $immobilier=htmlspecialchars($immobilier);
        $cout=htmlspecialchars($cout);
        $devise=htmlspecialchars($devise);
        $financement=htmlspecialchars($financement);
        $nom=htmlspecialchars($nom);
        $descrp=htmlspecialchars($descrp);
        $delai=htmlspecialchars($delai);
        $porteur=htmlspecialchars($porteur);

        $this->pays=$pays;
        $this->ville=$ville;
        $this->immobilier=$immobilier;
        $this->cout=$cout;
        $this->devise=$devise;
        $this->financement=$financement;
        $this->nom=$nom;
        $this->descrp=$descrp;
        $this->delai=$delai;
        $this->businessPlan=$businessPlan;
        $this->image=$image;
        $this->porteur=$porteur;
        $this->bdd=bdd ();
        
    }

    public function verif_Files (){
        //
        for ($i=0;$i<count($this->businessPlan['tmp_name']);$i++){
            if ($this->businessPlan['error'][$i] == 0){
                if ($this->businessPlan['size'][$i] <= 10000000){
                    $extension_A = array('pdf','doc');
                    $infoFichier = pathinfo($this->businessPlan['name'][$i]);
                    $extension_R = $infoFichier['extension'];
                    if (in_array($extension_R,$extension_A)){
                        //ok la photo est dans les normes
                        if ($i == count($this->businessPlan['tmp_name']) - 1){
                            return 'ok';
                        }
                        
                    } else {
                        $erreur = 'Veuillez selectionnez une image';
                        return $erreur;
                        break;
                    }
                }else {
                    $erreur = 'La taille de chaque photo ne dois pas depassé 10Mb';
                    return $erreur;
                    break;
                }
            }else {
                $erreur = 'Une erreur est subvenue lors du telechargement des photos';
                return $erreur;
                break;
            }
        }//
        
    }

    public function verifImages (){
        //
        for ($i=0;$i<count($this->image['tmp_name']);$i++){
            if ($this->image['error'][$i] == 0){
                if ($this->image['size'][$i] <= 10000000){
                    $extension_A = array('jpg','JPG','jpeg','JPEG','png','GIF','gif');
                    $infoFichier = pathinfo($this->image['name'][$i]);
                    $extension_R = $infoFichier['extension'];
                    if (in_array($extension_R,$extension_A)){
                        //ok la photo est dans les normes
                        if ($i == count($this->image['tmp_name']) - 1){
                            return 'ok';
                        }
                        
                    } else {
                        $erreur = 'Veuillez selectionnez une image';
                        return $erreur;
                        break;
                    }
                }else {
                    $erreur = 'La taille de chaque photo ne dois pas depassé 10Mb';
                    return $erreur;
                    break;
                }
            }else {
                $erreur = 'Une erreur est subvenue lors du telechargement des photos';
                return $erreur;
                break;
            }
        }//
        
    }

    public function saveProjet (){
        //Appel de la fonction
        $requete = $this->bdd->prepare('INSERT INTO projet (pays,ville,immobilier,cout,devise,financement,nom,descrp,delai,porteur,id_users) VALUES (:pays,:ville,:immobilier,:cout,:devise,:financement,:nom,:descrp,:delai,:porteur,:id_users)');
        $requete->execute(array('pays'=>$this->pays,'ville'=>$this->ville,'immobilier'=>$this->immobilier,'cout'=>$this->cout,'devise'=>$this->devise,'financement'=>$this->financement,'nom'=>$this->nom,'descrp'=>$this->descrp,'delai'=>$this->delai,'porteur'=>$this->porteur,'id_users'=>$_SESSION['id']));
        $this->id_projet = $this->bdd->lastInsertId();
        return 'ok';
        //
    }

    ////////////////////////////////////////////////////////////
    public function idProjet (){
        //
        $requete1 = $this->bdd->prepare('SELECT id FROM projet WHERE pays=:pays AND ville=:ville AND immobilier=:immobilier AND cout=:cout AND devise=:devise AND financement=:financement AND nom=:nom AND descrp=:descrp AND delai=:delai AND porteur=:porteur AND id_users=:id_users');
        $requete1->execute(array('pays'=>$this->pays,'ville'=>$this->ville,'immobilier'=>$this->immobilier,'cout'=>$this->cout,'devise'=>$this->devise,'financement'=>$this->financement,'nom'=>$this->nom,'descrp'=>$this->descrp,'delai'=>$this->delai,'porteur'=>$this->porteur,'id_users'=>$_SESSION['id']));
        $repons = $requete1->fetch();
        $this->id_projet = $repons['id'];
        return 'ok';
    }
    ///////////////////////////////////////////////////////////

    public function saveFiles (){
        //
        for ($i=0;$i<count($this->businessPlan['tmp_name']);$i++){
            //j'acepte le fichier, le transfere
            $this->chemin = 'upload/fichier/fichier-projet/'.basename($this->businessPlan['name'][$i]);
            $this->nom = basename($this->businessPlan['name'][$i]);
            move_uploaded_file($this->businessPlan['tmp_name'][$i],$this->chemin);
            $req=$this->bdd->prepare('INSERT INTO fichierprojet(nom,chemin,id_projet) VALUES (:nom,:chemin,:id_projet)');
            $req->execute(array('nom'=>$this->nom,'chemin'=>$this->chemin,'id_projet'=>$this->id_projet));

        }
    }

    public function saveImages (){
        //
        for ($i=0;$i<count($this->image['tmp_name']);$i++){
            //j'acepte le fichier, le transfere
            $this->chemin = 'upload/image/image-projet/'.basename($this->image['name'][$i]);
            $this->nom = basename($this->image['name'][$i]);
            move_uploaded_file($this->image['tmp_name'][$i],$this->chemin);
            $req=$this->bdd->prepare('INSERT INTO imageprojet(nom,chemin,id_projet) VALUES (:nom,:chemin,:id_projet)');
            $req->execute(array('nom'=>$this->nom,'chemin'=>$this->chemin,'id_projet'=>$this->id_projet));

        }
    }


}