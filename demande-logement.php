<?php
include_once 'fonction/connect-bd.php';
include_once 'fonction/posterDemande.class.php';

if (isset($_POST['pays']) AND isset($_POST['ville']) AND isset($_POST['quartier']) AND isset($_POST['probleme']) AND isset($_POST['descrp']) AND isset($_POST['destinateur'])){
  //
  $projet = new posterDemande($_POST['pays'],$_POST['ville'],$_POST['quartier'],$_POST['probleme'],$_POST['descrp'],$_POST['destinateur']);

      $save = $projet->saveDemande();
      if ($save == 'ok'){
        if($_POST['destinateur'] == "Ministere"){
          $projet->send_email_ministere();
          $msgErreur = 'Demande envoyes avec succes au ministere!';
        } else {
          $msgErreur = 'Enregistrement effectuer avec succes !';
        }
        
        //header('Location: index.php');
      }else {
        $msgErreur = 'Un probleme est survenue lors de votre inscription';
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

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

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
              <a class="nav-link" href="Acceuil.php"><strong>Acceuil</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><strong>Explorer</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projet.php"><strong>Projet</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php"><strong>Forum</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a propos.php"><strong>A propos</strong></a>
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
              <a class="nav-link" href="login.php"><strong>S'identifier</a></strong>
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

      <div class="poste">

        <!-- Blog Entries Column -->

        <!-- Sidebar Widgets Column -->
        <div class="">

          <!-- formulaire d'inscription -->

          <span class="espace"></span>
          <!-- zone d'erreur -->
          <?php if (isset($msgErreur)){ ?>
          <div class="form-group">
            <p class="text-danger"><?php echo $msgErreur; ?></p>
          </div>
          <?php } ?>
          <form method="POST" action="demande-logement.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Faite une demande de logement sociale pour votre quartier</h3>
              <div class="form-group">
                <label for="titre">Pays</label>
                <input type="text" name="pays" class="form-control" id="titre" placeholder="">
                <small id="titre" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="titre">Ville</label>
                <input type="text" name="ville" class="form-control" id="titre" placeholder="">
                <small id="titre" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="titre">Quartier</label>
                <input type="text" name="quartier" class="form-control" id="titre" placeholder="">
                <small id="titre" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="titre">Probleme</label>
                <input type="text" name="probleme" class="form-control" id="titre" placeholder="">
                <small id="titre" class="form-text text-muted">Quelle est votre probleme ?</small>
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea name="descrp" class="form-control" id="exampleTextarea" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="demanade">Destinaire</label>
                <select class="form-control" name="destinateur" id="demande">
                  <option value="Popula">Promoteur present sur popula</option>
                  <option value="Ministere">Ministere</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Faite une demande au promoteur present sur popula pour qu'ils adapte leurs projets a votre localite ou souhaiter vous faire une demande au ministere afin de beneficier d'une aide de l'etat.</small>
              </div>
              <button type="submit" class="btn btn-primary">Envoyer</button>
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
        <p class="m-0 text-center text-white">Copyright &copy; Popula <?php echo date("Y"); ?></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
