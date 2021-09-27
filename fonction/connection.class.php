<?php
include_once 'fonction/connect-bd.php';
class connection {
    private $email;
    private $mdp;
    private $pass;
    private $bdd;

    public function __construct ($email,$mdp){
        $this->email=$email;
        $this->mdp=$mdp;
        $this->pass=sha1($this->mdp);
        $this->bdd=bdd ();
    }

    public function verification () {
        $req=$this->bdd->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email'=>$this->email));
        $donnee=$req->fetch();
        if ($donnee){
            if ($this->pass == $donnee['pass']){
                return 'ok';
            }else {
                $erreur = 'Le mot de pass saissie est incorrecte';
                return $erreur;
            }
        }else {
            $erreur='l\'adresse email saissie n\'existe pas';
            return $erreur;
        }
    }

    public function connect_status (){
        // L'utilisateur est conneecter !
        $verif_connect = $this->bdd->prepare('SELECT * FROM users WHERE email = :email');
        $verif_connect->execute(array('email'=>$this->email));
        $verif = $verif_connect->fetch();
        if ($verif['connect_status'] == 0){
            $connected = $this->bdd->query('UPDATE users SET connect_status = 1 WHERE email = \''.$this->email.'\'');
            return 1;
        } else {
            //$msg = "vous etes deja connecter !";
            return 1;
        }
    }

    public function session (){
        $req=$this->bdd->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array('email'=>$this->email));
        $donnee=$req->fetch();
        $_SESSION['id']=$donnee['id'];
        $_SESSION['nom']=$donnee['nom'];
        $_SESSION['prenom']=$donnee['prenom'];
        $_SESSION['adresse']=$donnee['adresse'];
        $_SESSION['telephone']=$donnee['telephone'];
        $_SESSION['profession']=$donnee['profession'];
        $_SESSION['email']=$donnee['email'];
        $_SESSION['sexe']=$donnee['sexe'];
        $_SESSION['date_inscription']=$donnee['date_inscription'];
        $_SESSION['last_action'] = time();
        
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
        $_SESSION['id_users'] = $donnee['id_users'];

        return 1;
    }
}

?>