<?php
include_once 'fonction/connect-bd.php';
include_once 'fonction/update.class.php';
include_once 'fonction/display.class.php';
//var
$bdd=bdd();
$user = new display();
$updateUser = new update();
$donneesA = array();
$donneesProjet = array();
$imgA = array();
// Modifier les info de l'user !
if (isset($_SESSION['avatar'])){
  //Modification de toute les infos
  if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['profession']) AND 
  isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['adresse']) AND isset($_POST['telephone']) AND
  isset($_POST['lieu_naissance']) AND 
  isset($_POST['ville']) AND isset($_POST['pays']) AND isset($_POST['bp']) AND isset($_POST['mois']) AND 
  isset($_POST['jour']) AND isset($_POST['annee']) AND isset($_POST['apropos'])){

    $dateDeNaissance = $_POST['mois'].' '.$_POST['jour'].' '.$_POST['annee'];
    $verif = $updateUser->fonctverifImg($_FILES['photo']);
    if ($verif == 'ok'){

      $saveAllUpdate = $updateUser->updateAll(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['lieu_naissance'],
        $_POST['profession'],
        $_POST['email'],
        $_POST['password'],
        $_POST['adresse'],
        $_POST['telephone'],
        $_POST['ville'],
        $_POST['pays'],
        $_POST['bp'],
        $dateDeNaissance,
        $_FILES['photo'],
        $_POST['apropos']
      );

      if($saveAllUpdate){
        $updateUser-> allSession();
        $msgErreur = 'Profile modifier';
      } else {
        $msgErreur = 'un probleme est survenue';
      }
    }else {
      $msgErreur = $verif;
    }
  }
} else {
  //Complete information
  if (isset($_POST['lieu_naissance']) AND isset($_POST['nationnalite']) AND isset($_POST['ville']) AND isset($_POST['pays']) AND isset($_POST['bp']) AND isset($_POST['mois']) AND isset($_POST['jour']) AND isset($_POST['annee']) AND isset($_POST['apropos'])){

    $updateUser->getUsers($_POST['lieu_naissance'],$_POST['nationnalite'],$_POST['ville'],$_POST['pays'],$_POST['bp'],$_POST['mois'],$_POST['jour'],$_POST['annee'],$_FILES['photo'],$_POST['apropos']);
    $verif = $updateUser->verifImg();
    if ($verif == 'ok'){
      if($updateUser->saveInfo()){
        $updateUser-> session1 ();
      } else {
        $msgErreur = 'un probleme est survenue';
      }
    }else {
      $msgErreur = $verif;
    }
  }
}

//
//les nombre annonce et projet
$nbrAnn = $user->getNbrAnnonce($_SESSION['id']);
$nbrPro = $user->getNbrProjet($_SESSION['id']);
/////////////////////////affiche les annonces et projet !
$rep = $user->getAnnonceUser($_SESSION['id']);
while ($info = $rep->fetch()){
  //recup donnee
  $donneesA[] = $info;
}
////////////////////////affiche les annonces et projet !
$rep2 = $user->getProjetUser($_SESSION['id']);
while ($infoProjet = $rep2->fetch()){
  //recup donnee
  $donneesProjet[] = $infoProjet;
}
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Popula</title>

    <!-- logo favicon icon -->
    <link rel="shortcut icon" href="image/popula-favicon.png">
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <script src="fonction/script-statusAnnonce.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar <!--fixed-top--> navbar-expand-lg navbar-light bg-light <!--fixed-top-->">
      <div class="container">
        <a class="navbar-brand" href="Acceuil.php"><img src="image/logo/popula.png" alt="popula" title="popula"/></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Acceuil.php"><strong>Acceuil</strong><i class="fa fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><strong>Explorer</strong><i class="fa fa-rocket"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projet.php"><strong>Projet</strong><i class="fa fa-building"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php"><strong>Forum</strong><i class="fa fa-comments-o"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a propos.php"><strong>A propos</strong><i class="fa fa-quote-right"></i></a>
            </li>
            <!--code php-->
            <?php
            if (isset($_SESSION['id'])){
              ?>
            <!--plug in log out, Notification, profil ... -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong><?php echo $_SESSION['nom']?></strong>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-primary">0</span></a>
                <div class="dropleft">
                  <div class="dropdown-menu">
                    <!-- Dropdown menu left links 
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #type</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre projet de #theme</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #lieux</a>
                    -->
                  </div>
                </div>
                <a class="dropdown-item" href="profile.php">profile</a>
                <a class="dropdown-item" href="log-out.php">Deconnection</a>
              </div>
            </li>
            <!--end-->
            <?php
             } else {
               ?>
            <!--sinscrit-->
            <li class="nav-item">
              <a class="nav-link" href="login.php"><strong>S'identifier</strong><i class="fa fa-user-circle"></i></a>
            </li>
            <?php
             }
             ?>
            <!--end-->
          </ul>
        </div>
      </div>
    </nav>

    <!--- profile ----->
    <div class="container">

      <h3 class="titre text-muted">Profile</h3>

      <div class="row">
        <!-- colonne de gauche -->
        <div class="col-md-4">
          <!-- user profile Widget -->
          <div class="text-center">
            <?php if (isset($_SESSION['avatar'])){?>
              <img style="background-image: url('<?php echo $_SESSION['avatar'];?>');" id="photo-profil">
            <?php } else { ?>
              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="photo-profil">
            <?php } ?>
            <h5 class="titre">
              <?php if (isset($_SESSION['nom']) AND isset($_SESSION['prenom'])){
                echo $_SESSION['nom'].' '.$_SESSION['prenom'];
              }?>
            </h5>
          </div><br>

          <div class="panel panel-default">
            <div class="panel-heading">A propos de moi</div>
            <div class="panel-body">
              <p class="text-muted"><?php if (isset($_SESSION['apropos'])){echo $_SESSION['apropos'];} ?></p>
              <p class="text-muted">
                <?php if (isset($_SESSION['lieu_naissance']) AND isset($_SESSION['lieu_naissance'])) {
                  echo 'De '.$_SESSION['lieu_naissance'].', habite a '.$_SESSION['ville'];
                }?>
              </p>
            </div>
          </div>


          <ul class="list-group">
            <li class="list-group-item text-muted">Activite <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Annonces</strong></span> <?php echo $nbrAnn ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span> <?php echo $nbrPro ?></li>
          </ul>

          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
              <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>

        </div>


        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- onglet ... -->

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#annonce">Annonces</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#projet">projets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#favori">favories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#conclus">Conclus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#modif-profil">Modifier profile</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="annonce">



              <h3 class="titre text-muted lead">Mes annonces</h3>

              <!-- Project One -->

              <?php
              foreach ($donneesA as $donneeA){
                //
                $imgA = $user->getImageAnnonce ($donneeA['id']);
              ?>

              <div class="row">
                <div class="col-md-7">
                  <a href="voir-annonce.php?id_annonce=<?php echo $donneeA['id'] ?>&amp;id_user=<?php echo $_SESSION['id']; ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $imgA['chemin'] ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <!--nom et icon supprimer-->
                  <li class="d-flex justify-content-between align-items-center">
                  <h5 class="text-muted"><?php echo $donneeA['adresse']; ?></h5>
                  <h5 class="text-muted"><?php echo $donneeA['prix']."".$donneeA['devise']; ?></h5>
                    <a href="#" data-toggle="modal" data-target="#modal"><span class="badge "><img src="image/icon/delete_25px.png"></span></a>
                  </li>
                  <!--modale-->
                  <div class="modal" id="modal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Supprimer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Etes-vous vraiment sur de supprimer l'annonce ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Oui</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end modal-->
                  <?php
                    $descrAnn = substr($donneeA['descrp'],0,100);
                    $descrAnn .= " ...";
                  ?>
                  <!--end-->
                  <p><?php echo $descrAnn; ?></p>
                  <!--checkbox-->
                  <div class="">
                      <button value="active" class="btn btn-primary statutA" >Active</button>
                      <button value="conclus" class="btn btn-primary statutA" >Conclus</button>
                    <!--
                    <label class="btn btn-primary">
                      <input type="radio" name="options" id="option3" autocomplete="off"> Cacher
                    </label>
                    -->
                  </div>
                  <!--fin checkbox
                  <small id="titre" class="form-text text-muted"><a href="#">Modifier</a></small>-->
                </div>
              </div>
              <!-- /.row -->

              <hr>

              <?php
              }
              ?>
              <!-- /.end annonce, Mes annonce, fin ici onglet -->

            </div>
            
            <div class="tab-pane fade" id="projet">
              <h3 class="titre text-muted lead">Mes projets</h3>

              <?php
              foreach ($donneesProjet as $donneeP){
                //
                $imgP = $user->getImageProjet ($donneeP['id']);
              ?>

              <!-- Project One -->
              
              <div class="row">
                <div class="col-md-7">
                  <a href="voir-projet.php?id_projet=<?php echo $donneeP['id']; ?>&amp;id_user=<?php echo $donneeP['id_users'];?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $imgP['chemin'] ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3><?php echo $donneeP["nom"] ?></h3>
                  <?php
                    $descrPro = substr($donneeP['descrp'],0,100);
                    $descrPro .= " ...";
                  ?>
                  <p><?php echo $descrPro ?></p>
                  <!--checkbox-->
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked=""> Active
                    </label>
                    <label class="btn btn-primary">
                      <input type="radio" name="options" id="option2" autocomplete="off"> Conclus
                    </label>
                    <label class="btn btn-primary">
                      <input type="radio" name="options" id="option3" autocomplete="off"> Cacher
                    </label>
                  </div>
                  <!--fin checkbox-->
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                        <a class="dropdown-item" href="poster-rapport.php?id_projet=<?php echo $donneeP['id']; ?>&amp;id_user=<?php echo $donneeP['id_users'];?>">Ecrire rapport</a>
                        <a class="dropdown-item" href="rapport.php">Voir Rapport</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->

              <hr>

              <?php
              }
              ?>


            </div>
            <div class="tab-pane fade" id="favori">
              <h3 class="titre text-muted lead">Mes favories</h3>

              <!-- Project One -->
              <?php 
                $idannonce = $user->getFav();
                while($idFav = $idannonce->fetch()){
                  $annonceFav = $user->getAnnonceFav($idFav['id_annonce']);
                  while($favori = $annonceFav->fetch()){
                    //
                    $imgFav = $user->getImageAnnonce($favori['id']);
                //
              ?>

              <div class="row">
                <div class="col-md-7">
                  <a href="voir-annonce.php?id_annonce=<?php echo $favori['id'] ?>&amp;id_user=<?php echo $_SESSION['id']; ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $imgFav['chemin']; ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <li class="d-flex justify-content-between align-items-center">
                    <h5 class="text-muted"><?php echo $favori['adresse']; ?></h5>
                    <h5 class="text-muted"><?php echo $favori['prix']."".$favori['devise']; ?></h5>
                  </li>
                  <?php
                    $descrFav = substr($favori['descrp'],0,100);
                    $descrFav .= " ...";
                  ?>
                  <p><?php echo $descrFav; ?></p>
                  <a class="btn btn-primary" href="voir-annonce.php?id_annonce=<?php echo $favori['id'] ?>&amp;id_user=<?php echo $_SESSION['id']; ?>">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>
              <!-- /.row -->

              <hr>
              <?php
                //
                }
              }
              ?>

            </div>
            <div class="tab-pane fade" id="conclus">
              <h3 class="titre text-muted lead">Mes annonces et projet conclus</h3>

              <!-- Project One 
              ////////////////////////////////////////////////////////////////////////////////////
              <div class="row">
                <div class="col-md-7">
                  <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3>Nom</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                  <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>

               /.row 

              <hr>-->

            </div>
            <div class="tab-pane fade" id="modif-profil">

              <?php
               if (isset($_SESSION['avatar'])){
              ?>
              <!-- formulaire modifie profiles -->
              <span class="espace"></span>
              <h3 class="titre text-muted lead">Modifier vos informations</h3>
              <span class="espace"></span>
              <form method="POST" enctype="multipart/form-data" action="profile.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer votre nom" require>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer votre prenom" require>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="lieu_naissance">lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" id="lieu_naissance" placeholder="Entrer votre pays de naissance" require>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="prenom">Profession</label>
                    <input type="text" name="profession" class="form-control" id="profession" placeholder="Entrer votre profession" require>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" require>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Password">Mot de pass</label>
                    <input type="password" name="mdp" class="form-control" id="password" placeholder="Mot de pass" require>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrer votre adresse actuelle" require>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telephone">telephone</label>
                    <input type="tel" name="tel" class="form-control" id="telephone" placeholder="Entre votre numero de telephone" require>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="ville" placeholder="Ex: Conakry" require>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pays">pays</label>
                    <input type="text" name="pays" class="form-control" id="pays" placeholder="Ex: Guinnee" require>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="codePostal">BP</label>
                    <input type="text" name="bp" class="form-control" id="codePostal" placeholder="Ex: 433" maxlenght="10" require>
                  </div>
                </div>

                <!-- form Date -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="mois">Date de naissance</label>
                    <select name="mois" class="custom-select" id="mois" require>
                      <option value="janvier" selected>Janvier</option>
                      <option value="fervrier">Fevrier</option>
                      <option value="Mars">Mars</option>
                      <option value="Avril">Avril</option>
                      <option value="Mai">Mai</option>
                      <option value="Juin">Juin</option>
                      <option value="Mars">Juillet</option>
                      <option value="Mars">Aout</option>
                      <option value="Mars">Septembre</option>
                      <option value="Mars">Octobre</option>
                      <option value="Mars">Novembre</option>
                      <option value="Mars">Decembre</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jour">Jour</label>
                    <select name="jour" id="jour" class="form-control" require>
                      <option selected>1</option>
                      <option value="1">2</option>
                      <option value="2">3</option>
                      <option value="3">4</option>
                      <option value="4">5</option>
                      <option value="5">6</option>
                      <option value="6">7</option>
                      <option value="7">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="year">Annee</label>
                    <input type="text" name="annee" class="form-control" id="year" placeholder="annee" maxlength="4" require>
                  </div>
                </div>

                <div class="form-group">
                  <label for="customFile">Changer votre photo de profile</label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="customFile" require>
                    <label class="custom-file-label" for="customFile">Photo de profile</label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleTextarea">A propos:</label>
                  <textarea class="form-control" name="apropos" id="exampleTextarea" rows="3" require>Decrivez-vous a fin que vos potentielle cliens puis vous connaitre</textarea>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" require>
                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                  </div>
                </div>

                <!--bouton save and reset -->
                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                          <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                      </div>
                </div>
              </form>

              <?php
              } else {
              ?>
              <!--Formulaire completer le profile-->
              <span class="espace"></span>
              <h3 class="titre text-muted lead">Compléter vos informations</h3>
              <span class="espace"></span>
              <form method="POST" enctype="multipart/form-data" action="profile.php">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="lieu_naissance">lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" id="lieu_naissance" placeholder="Entrer votre pays de naissance" require>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nationnalite">Pays de nationnalite</label>
                    <input type="text" name="nationnalite" class="form-control" id="nationnalite" placeholder="Entrer votre nationnalite" require>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="ville" placeholder="Ex: Conakry" require>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pays">pays</label>
                    <input type="text" name="pays" class="form-control" id="pays" placeholder="Ex: Guinnee" require>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="codePostal">BP</label>
                    <input type="text" name="bp" class="form-control" id="codePostal" placeholder="Ex: 433" maxlenght="10" require>
                  </div>
                </div>

                <!-- form Date -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="mois">Date de naissance</label>
                    <select name="mois" class="custom-select" id="mois" require>
                      <option value="janvier" selected>Janvier</option>
                      <option value="fervrier">Fevrier</option>
                      <option value="Mars">Mars</option>
                      <option value="Avril">Avril</option>
                      <option value="Mai">Mai</option>
                      <option value="Juin">Juin</option>
                      <option value="Juillet">Juillet</option>
                      <option value="Août">Août</option>
                      <option value="Septembre">Septembre</option>
                      <option value="Octobre">Octobre</option>
                      <option value="Novembre">Novembre</option>
                      <option value="Decembre">Decembre</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jour">Jour</label>
                    <select name="jour" id="jour" class="form-control" require>
                      <option selected>1</option>
                      <option value="1">2</option>
                      <option value="2">3</option>
                      <option value="3">4</option>
                      <option value="4">5</option>
                      <option value="5">6</option>
                      <option value="6">7</option>
                      <option value="7">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="year">Annee</label>
                    <input type="tel" name="annee" class="form-control" id="year" placeholder="annee" maxlength="4" require>
                  </div>
                </div>

                <div class="form-group">
                  <label for="customFile">Changer votre photo de profile</label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="customFile" require>
                    <label class="custom-file-label" for="customFile">Photo de profile</label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="apropos">A propos:</label>
                  <textarea class="form-control" name="apropos" id="apropos" rows="3" placeholder="Decrivez-vous a fin que vos potentielle cliens puis vous connaitre" require></textarea>
                </div>

                <div class="form-group">
                  <?php
                  if (isset($msgErreur)){
                    echo '<p class="text-danger">'.$msgErreur.'</p>';
                  }
                  ?>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="comfirme" required>
                    <label class="custom-control-label" for="comfirme">Vous confirme que les informations saissie sont authentique.</label>
                  </div>
                </div>

                <!--bouton save and reset -->
                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                          <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                      </div>
                </div>
              </form>

              <?php
              }
              ?>
            </div>



          </div>

          <!-- page -->
          <span class="espace"></span>

        </div>

      </div>
      <!-- /.row -->

    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Popula <?php echo date("Y"); ?></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
