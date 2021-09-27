<?php session_start();
include_once 'fonction/connect-bd.php';

class posterAnnonce {
    private $pays;
    private $ville;
    private $commune;
    private $quartier;
    private $adresse;
    private $immobilier;
    private $prix;
    private $devise;
    private $transact;
    private $salon;
    private $chambre;
    private $salManger;
    private $cuisine;
    private $toilette;
    private $piece;
    private $dimension;
    private $garage;
    private $terrase;
    private $annexe;
    private $piscine;
    private $cas;
    private $toiletteExt;
    private $etat;
    private $interieur;
    private $descrp;
    private $image;
    private $proprio;
    private $chemin;
    private $nom;
    private $id_annonce;
    private $bdd;

    public function __construct ($pays,$ville,$commune,$quartier,$adresse,$immobilier,$prix,$devise,$transact,$salon,$chambre,$salManger,$cuisine,$toilette,$piece,$dimension,$garage,$terrase,$annexe,$piscine,$cas,$toiletteExt,$etat,$interieur,$descrp,$image,$proprio){
        $pays=htmlspecialchars($pays);
        $ville=htmlspecialchars($ville);
        $commune=htmlspecialchars($commune);
        $quartier=htmlspecialchars($quartier);
        $adresse=htmlspecialchars($adresse);
        $prix=htmlspecialchars($prix);
        $dimension=htmlspecialchars($dimension);
        $descrp=htmlspecialchars($descrp);

        $this->pays=$pays;
        $this->ville=$ville;
        $this->commune=$commune;
        $this->quartier=$quartier;
        $this->adresse=$adresse;
        $this->immobilier=$immobilier;
        $this->prix=$prix;
        $this->devise=$devise;
        $this->transact=$transact;
        $this->salon=$salon;
        $this->chambre=$chambre;
        $this->salManger=$salManger;
        $this->cuisine=$cuisine;
        $this->toilette=$toilette;
        $this->piece=$piece;
        $this->dimension=$dimension;
        $this->garage=$garage;
        $this->terrase=$terrase;
        $this->annexe=$annexe;
        $this->piscine=$piscine;
        $this->cas=$cas;
        $this->toiletteExt=$toiletteExt;
        $this->etat=$etat;
        $this->interieur=$interieur;
        $this->descrp=$descrp;
        $this->image=$image;
        $this->proprio=$proprio;
        $this->bdd=bdd ();
    }
    
    public function verifImage (){
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

    public function saveAnnonce (){
        //
        $requete = $this->bdd->prepare('INSERT INTO annonce (pays,ville,commune,quartier,adresse,immobilier,prix,devise,transact,salon,chambre,salManger,cuisine,toilette,piece,dimension,garage,terrase,annexe,piscine,cas,toiletteExt,etat,interieur,descrp,proprio,id_users) VALUES (:pays,:ville,:commune,:quartier,:adresse,:immobilier,:prix,:devise,:transact,:salon,:chambre,:salManger,:cuisine,:toilette,:piece,:dimension,:garage,:terrase,:annexe,:piscine,:cas,:toiletteExt,:etat,:interieur,:descrp,:proprio,:id_users)');
        $requete->execute(array('pays'=>$this->pays,'ville'=>$this->ville,'commune'=>$this->commune,'quartier'=>$this->quartier,'adresse'=>$this->adresse,'immobilier'=>$this->immobilier,'prix'=>$this->prix,'devise'=>$this->devise,'transact'=>$this->transact,'salon'=>$this->salon,'chambre'=>$this->chambre,'salManger'=>$this->salManger,'cuisine'=>$this->cuisine,'toilette'=>$this->toilette,'piece'=>$this->piece,'dimension'=>$this->dimension,'garage'=>$this->garage,'terrase'=>$this->terrase,'annexe'=>$this->annexe,'piscine'=>$this->piscine,'cas'=>$this->cas,'toiletteExt'=>$this->toiletteExt,'etat'=>$this->etat,'interieur'=>$this->interieur,'descrp'=>$this->descrp,'proprio'=>$this->proprio,'id_users'=>$_SESSION['id']));
        return 'ok';
        //
    }

    public function idAnnonce (){
        //
        $requete1 = $this->bdd->prepare('SELECT id FROM annonce WHERE pays=:pays AND ville=:ville AND commune=:commune AND quartier=:quartier AND adresse=:adresse AND immobilier=:immobilier AND prix=:prix AND devise=:devise AND transact=:transact AND salon=:salon AND chambre=:chambre AND salManger=:salManger AND cuisine=:cuisine AND toilette=:toilette AND piece=:piece AND dimension=:dimension AND garage=:garage AND terrase=:terrase AND annexe=:annexe AND piscine=:piscine AND cas=:cas AND toiletteExt=:toiletteExt AND etat=:etat AND interieur=:interieur AND descrp=:descrp AND proprio=:proprio AND id_users=:id_users');
        $requete1->execute(array('pays'=>$this->pays,'ville'=>$this->ville,'commune'=>$this->commune,'quartier'=>$this->quartier,'adresse'=>$this->adresse,'immobilier'=>$this->immobilier,'prix'=>$this->prix,'devise'=>$this->devise,'transact'=>$this->transact,'salon'=>$this->salon,'chambre'=>$this->chambre,'salManger'=>$this->salManger,'cuisine'=>$this->cuisine,'toilette'=>$this->toilette,'piece'=>$this->piece,'dimension'=>$this->dimension,'garage'=>$this->garage,'terrase'=>$this->terrase,'annexe'=>$this->annexe,'piscine'=>$this->piscine,'cas'=>$this->cas,'toiletteExt'=>$this->toiletteExt,'etat'=>$this->etat,'interieur'=>$this->interieur,'descrp'=>$this->descrp,'proprio'=>$this->proprio,'id_users'=>$_SESSION['id']));
        $reponse = $requete1->fetch();
        $this->id_annonce = $reponse['id'];
        return 'ok';
    }

    public function saveImg (){
        //
        for ($i=0;$i<count($this->image['tmp_name']);$i++){
            //j'acepte le fichier, le transfere
            $this->chemin = 'upload/image/image-annonce/'.basename($this->image['name'][$i]);
            $this->nom = basename($this->image['name'][$i]);
            move_uploaded_file($this->image['tmp_name'][$i],$this->chemin);
            $req=$this->bdd->prepare('INSERT INTO imageannonce(nom,chemin,id_annonce) VALUES (:nom,:chemin,:id_annonce)');
            $req->execute(array('nom'=>$this->nom,'chemin'=>$this->chemin,'id_annonce'=>$this->id_annonce));
        }
    }

}