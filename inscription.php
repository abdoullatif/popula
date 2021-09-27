<?php
include_once'fonction/connect-bd.php';
include_once'fonction/inscription.class.php';
$bdd=bdd();
if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adresse']) AND isset($_POST['tel']) AND isset($_POST['profession']) AND isset($_POST['email']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']) AND isset($_POST['sexe'])){
  $inscription=new inscription ($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['tel'],$_POST['profession'],$_POST['email'],$_POST['mdp'],$_POST['mdp2'],$_POST['sexe']);
  $verif = $inscription->analyseInfoUser();
  if ($verif == 'ok'){
    $result = $inscription->saveUser();
    if($result == 1){
      $verif_email = $inscription->send_email_verif();
      if ($verif_email == 'ok'){
        //le mail de verification a ete envoyer
        if($inscription->session()){
        header('Location:index.php');
        }else {
          echo 'une erreur est survenue';
        }
      } else {
        // erreur d'envois de mail de confirmation
        $msgErreur = "Probleme d'envois de mail de confirmation !";
      }
      
    }else {
      /*une erreur est survenue*/
      $msgErreur = $result;
    }
  }else {
    $msgErreur = $verif;
  }
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
    <link href="css/back.css" rel="stylesheet">

  </head>

  <body style="background: url(image/background/.jpg) no-repeat fixed;">

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
                <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification <span class="badge badge-pill badge-primary">3</span></a>
                <div class="dropleft">
                  <div class="dropdown-menu">
                    <!-- Dropdown menu left links -->
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #type</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre projet de #theme</a>
                    <a class="dropdown-item" href="#">vous avez des commentaire sur votre annonce de #lieux</a>
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

    <!--login-->
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- hello world -->


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- formulaire d'inscription -->

          <span class="espace"></span>
          <form method="POST" action="inscription.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Inscrivez-vous !</h3>
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Enter votre nom" required>
              </div>
              <div class="form-group">
                <label for="Prenom">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Enter votre prenom" required>
              </div>
              <div class="form-group">
                <label for="Adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="Adresse" placeholder="Enter votre adresse" required>
              </div>
              <div class="form-group">
                <label for="tel">Telephone</label>
                <input type="text" name="tel" class="form-control" id="tel" placeholder="Enter votre numero de Telephone" required>
              </div>
              <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" class="form-control" id="profession" placeholder="Enter votre Profession" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="password">Mot de pass</label>
                <input type="password" name="mdp" class="form-control" id="password" placeholder="Mot de pass" required>
              </div>
              <div class="form-group">
                <label for="password">Confirmer le mot de pass</label>
                <input type="password" name="mdp2" class="form-control" id="password" placeholder="Mot de pass" required>
              </div>
              <fieldset class="form-group">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Sexe :</label>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sexe" id="homme" value="Masculin" checked="">
                        Homme
                      </label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sexe" id="femme" value="Feminin">
                        Femme
                    </label>
                    </div>
                  </div>
                </div>
                <?php
                if (isset($msgErreur)){
                  echo '<p class="text-danger">'.$msgErreur.'</p>';
                }
                ?>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" required>
                    En vous inscrivant vous admetter avoir lu, compris et accepeter nos <a href="#">condition d'utlisation</a>.
                  </label>
                </div>
                <!--
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" disabled="">
                    Je declare sur l'honneur que les information saissir sont authentique
                  </label>
                </div>
                -->
              </fieldset>
              <button type="submit" class="btn btn-primary">Inscription</button>
            </fieldset>
          </form>

          <span class="espace"></span>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Popula 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
