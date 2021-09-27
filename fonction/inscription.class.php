<?php session_start();  
include_once 'fonction/connect-bd.php';
class inscription {
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $profession;
    private $email;
    private $mdp;
    private $mdp2;
    private $pass;
    private $sexe;
    private $bdd;
    private $cle_comfirm;

    public function __construct ($nom,$prenom,$adresse,$tel,$profession,$email,$mdp,$mdp2,$sexe){
        $nom=htmlspecialchars($nom);
        $prenom=htmlspecialchars($prenom);
        $adresse=htmlspecialchars($adresse);
        $tel=htmlspecialchars($tel);
        $profession=htmlspecialchars($profession);
        $email=htmlspecialchars($email);
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->adresse=$adresse;
        $this->tel=$tel;
        $this->profession=$profession;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->mdp2=$mdp2;
        $this->sexe=$sexe;
        $this->bdd=bdd();
    }
    public function analyseInfoUser (){
        $syntaxe_tel = '#^[00|+]?[0-9]{1,4}([-./ ]?[0-9]){8}$#';
        $syntaxe_email = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
        if (preg_match($syntaxe_tel,$this->tel)){
            if(preg_match($syntaxe_email,$this->email)){
                if ($this->mdp == $this->mdp2){
                    if(strlen($this->mdp)>=5){
                        $this->pass = sha1($this->mdp);
                        $this->cle_comfirm = md5(time().$this->email);
                        return 'ok';
                    }else {
                        $erreur = 'votre mot de passe doit avoir plus de 5 lettre ou chiffre';
                        return $erreur;
                    }  
                }else {
                    $erreur = 'Erreur de mot de passe (les mots de passe ne sont pas idenntique)';
                    return $erreur;
                }
            }else {
                $erreur= 'veuiller saissir une adresse email valide';
                return $erreur;
            }
        }else {
            $erreur= 'veuiller saissir un numero de telephone valide';
            return $erreur;
        }
    }
    public function saveUser (){
        $verifi = $this->bdd->prepare('SELECT id FROM users WHERE email = :email and pass = :pass');
        $verifi->execute(array('email'=>$this->email,'pass'=>$this->pass));
        $verifuser = $verifi->fetch();
        if (!empty($verifuser['id'])){
            $erreur = "Cet email est deja enregistrer, veuiller vous connecter <a href=\"login.php\">connecter</a>";
            return $erreur;
        } else {
            // on enregistre l'utilisateur :>
            $today = date('d-M-Y H:i:s');
            $s = 1;
            $v = 0;
            $req_inscrip=$this->bdd->prepare('INSERT INTO users (nom,prenom,adresse,telephone,profession,email,sexe,pass,cle_comfirm,verifier,connect_status,date_inscription) VALUES (:nom,:prenom,:adresse,:telephone,:profession,:email,:sexe,:pass,:cle_comfirm,:verifier,:connect_status,:date_inscription)');
            $req_inscrip->execute(array('nom'=> $this->nom,'prenom'=> $this->prenom,'adresse'=>$this->adresse,'telephone'=>$this->tel,'profession'=>$this->profession,'email'=>$this->email,'sexe'=>$this->sexe,'pass'=>$this->pass,'cle_comfirm'=>$this->cle_comfirm,'verifier'=>$v,'connect_status'=>$s,'date_inscription'=>$today));
            return 1;
        }
    }
    public function send_email_verif (){
        // on envois un mail de comfiemation a l'user
        $sujet="Verification du compte Popula";
        $message='Nous somme content de vous voire parmis nous, vous faite partir maintenant de la famille popula. Ensemble nous allons contribuer au developpement du pays :) .</br>
        Cependant il vous reste une derniere etape pour faire partir definitivement de la famille, vous devez comfirmer votre email, </br>
        Veuiller cliquer ici <a href="popula.fr/verifier.php?cle_comfirm='.$this->cle_comfirm.'>COMFIMER MON EMAIL</a> pour comfirmer votre adresse email :)';
        $headers = "FROM: popula@gmail.com \r\n";
        $headers .= 'Copyright Popula '.date("Y");
        $headers = "Content-type: text/html; charset=UTF-8";
        mail($this->email,$sujet,$message,$headers);
        return 'ok';
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
        $_SESSION['email']=$donnee['email'];
        $_SESSION['sexe']=$donnee['sexe'];
        $_SESSION['date_inscription']=$donnee['date_inscription'];
        $_SESSION['last_action'] = time();
        return 1;
    }
}