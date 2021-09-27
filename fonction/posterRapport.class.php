<?php session_start ();
//include_once 'fonction/connect-bd.php';

class posterRapport {

    private $bdd;

    public function __construct (){
        
        $this->bdd=bdd();
    }

    public function verif_Files ($fichier){
        //
        for ($i=0;$i<count($fichier['tmp_name']);$i++){
            if ($fichier['error'][$i] == 0){
                if ($fichier['size'][$i] <= 10000000){
                    $extension_A = array('pdf','doc','txt','ebook');
                    $infoFichier = pathinfo($fichier['name'][$i]);
                    $extension_R = $infoFichier['extension'];
                    if (in_array($extension_R,$extension_A)){
                        //ok la photo est dans les normes
                        if ($i == count($fichier['tmp_name']) - 1){
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

    //poster des rapport
    public function saveRapport ($titre,$descrp,$id_projet){
        //Appel de la fonction
        $requete = $this->bdd->prepare('INSERT INTO rapportprojet (titre,descrp,date_creation,id_projet) VALUES (:titre,:descrp,NOW(),:id_projet)');
        $requete->execute(array('titre'=>$titre,'descrp'=>$descrp,'id_projet'=>$id_projet));
        $this->id_rapport = $this->bdd->lastInsertId();
        return 'ok';
    }

}