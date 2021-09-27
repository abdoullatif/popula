<?php session_start ();
include_once 'fonction/connect-bd.php';
class update {
    private $lieu_naissance;
    private $nationnalite;
    private $ville;
    private $pays;
    private $BP;
    private $date_naissance;
    private $photo;
    private $avatar;
    private $apropos;
    private $bdd;

    public function __construct (){
        
    }

    public function getUsers($lieu_naissance,$nationnalite,$ville,$pays,$bp,$mois,$jour,$annee,$photo,$apropos){

        $lieu_naissance=htmlspecialchars($lieu_naissance);
        $nationnalite=htmlspecialchars($nationnalite);
        $ville=htmlspecialchars($ville);
        $pays=htmlspecialchars($pays);
        $bp=htmlspecialchars($bp);
        $annee=htmlspecialchars($annee);
        $apropos=htmlspecialchars($apropos);
        
        $this->bdd=bdd();
        $this->lieu_naissance=$lieu_naissance;
        $this->nationnalite=$nationnalite;
        $this->ville=$ville;
        $this->pays=$pays;
        $this->bp=$bp;
        $this->date_naissance=$jour.'-'.$mois.'-'.$annee;
        $this->photo=$photo;
        $this->apropos=$apropos;
    }


    public function verifImg (){
        if ($this->photo['error']==0){
            if ($this->photo['size'] <= 5000000){
                $extension_autorise = array ('jpg','jpeg','png','gif');
                $extension = pathinfo($this->photo['name']);
                $extension_recus = $extension['extension'];
                if (in_array($extension_recus,$extension_autorise)){
                    $this->avatar='upload/image/avatar/'.$_SESSION['email'].basename($this->photo['name']);
                    return 'ok';
                }
            }else {
                $erreur = 'le poid de votre photo ne doit pas depasser 5MB';
                return $erreur;
            }
        }else {
            $erreur = 'Une erreur est survenue lors du telechargement de l\'image, veuillez ressayer';
            return $erreur;
        }
    }
    public function saveInfo (){
        move_uploaded_file($this->photo['tmp_name'],$this->avatar);
        $req=$this->bdd->prepare('UPDATE users SET lieu_naissance = :lieu_naissance, nationnalite = :nationnalite, ville = :ville, pays = :pays, bp = :bp,date_naissance = :date_naissance,avatar = :avatar,apropos = :apropos WHERE id = :id');
        $req->execute(array('lieu_naissance'=>$this->lieu_naissance,'nationnalite'=>$this->nationnalite,'ville'=>$this->ville,'pays'=>$this->pays,'bp'=>$this->bp,'date_naissance'=>$this->date_naissance,'avatar'=>$this->avatar,'apropos'=>$this->apropos,'id'=>$_SESSION['id']));

        return 1;
    }
    public function session1 (){
        $reponse=$this->bdd->prepare('SELECT * FROM users WHERE id = :id');
        $reponse->execute(array('id'=>$_SESSION['id']));
        $donnee=$reponse->fetch();
        $_SESSION['lieu_naissance'] = $donnee['lieu_naissance'];
        $_SESSION['nationnalite'] = $donnee['nationnalite'];
        $_SESSION['ville'] = $donnee['ville'];
        $_SESSION['pays'] = $donnee['pays'];
        $_SESSION['bp'] = $donnee['bp'];
        $_SESSION['date_naissance'] = $donnee['date_naissance'];
        $_SESSION['avatar'] = $donnee['avatar'];
        $_SESSION['apropos'] = $donnee['apropos'];
    }
    //--------------------------------------------------------------------------
    //Update ALL information
    //--------------------------------------------------------------------------
    public function fonctverifImg ($photo){
        if ($photo['error']==0){
            if ($photo['size'] <= 5000000){
                $extension_autorise = array ('jpg','jpeg','png','gif');
                $extension = pathinfo($photo['name']);
                $extension_recus = $extension['extension'];
                if (in_array($extension_recus,$extension_autorise)){
                    $this->avatar='upload/image/avatar/'.$_SESSION['email'].basename($photo['name']);
                    return 'ok';
                }
            }else {
                $erreur = 'le poid de votre photo ne doit pas depasser 5MB';
                return $erreur;
            }
        }else {
            $erreur = 'Une erreur est survenue lors du telechargement de l\'image, veuillez ressayer';
            return $erreur;
        }
    }
    public function updateAll ($nom,$prenom,$lieu_naissance,$profession,$email,$password,$adresse,$telephone,$ville,$pays,$bp,$date_naissance,$photo,$apropos){
        $image_photo='upload/image/avatar/'.$_SESSION['email'].basename($photo['name']);
        move_uploaded_file($photo['tmp_name'],$image_photo);
        //password
        $mdp = sha1($password);

        $req=$this->bdd->prepare('UPDATE users SET 
        nom = :nom,
        prenom = :prenom,
        profession = :profession,
        email = :email,
        pass = :pass,
        adresse = :adresse,
        telephone = :telephone,
        lieu_naissance = :lieu_naissance, 
        ville = :ville, 
        pays = :pays, 
        bp = :bp,
        date_naissance = :date_naissance,
        avatar = :avatar,
        apropos = :apropos 
        WHERE id = :id');
        $req->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'profession'=>$profession,
            'email'=>$email,
            'pass'=>$mdp,
            'adresse'=>$adresse,
            'telephone'=>$telephone,
            'lieu_naissance'=>$lieu_naissance,
            'ville'=>$ville,
            'pays'=>$pays,
            'bp'=>$bp,
            'date_naissance'=>$date_naissance,
            'avatar'=>$photo,
            'apropos'=>$apropos,
            'id'=>$_SESSION['id'])
        );

        return 1;
    }

    public function allSession (){
        $reponse=$this->bdd->prepare('SELECT * FROM users WHERE id = :id');
        $reponse->execute(array('id'=>$_SESSION['id']));
        $donnee=$reponse->fetch();
        //
        $_SESSION['id']=$donnee['id'];
        $_SESSION['nom']=$donnee['nom'];
        $_SESSION['prenom']=$donnee['prenom'];
        $_SESSION['adresse']=$donnee['adresse'];
        $_SESSION['telephone']=$donnee['telephone'];
        $_SESSION['email']=$donnee['email'];
        $_SESSION['sexe']=$donnee['sexe'];
        $_SESSION['date_inscription']=$donnee['date_inscription'];
        //
        $_SESSION['lieu_naissance'] = $donnee['lieu_naissance'];
        $_SESSION['nationnalite'] = $donnee['nationnalite'];
        $_SESSION['ville'] = $donnee['ville'];
        $_SESSION['pays'] = $donnee['pays'];
        $_SESSION['bp'] = $donnee['bp'];
        $_SESSION['date_naissance'] = $donnee['date_naissance'];
        $_SESSION['avatar'] = $donnee['avatar'];
        $_SESSION['apropos'] = $donnee['apropos'];
    }

}