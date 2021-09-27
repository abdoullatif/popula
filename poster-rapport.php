<?php
include_once 'fonction/connect-bd.php';
include_once 'fonction/posterRapport.class.php';

if (isset($_POST['titre']) AND isset($_POST['descrp']) AND isset($_FILES['fichier']) AND isset($_GET['id_projet'])){
  //
  $idProjet = (int) htmlspecialchars($_GET['id_projet']);
  //
  $rapport = new posterRapport();
  $rapport->saveRapport($_POST['titre'],$_POST['descrp'],$idProjet);
  $rapport->verif_Files($_FILES['fichier']);
  //
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
          <form method="POST" action="poster-rapport.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Rapport d'evolution du projet</h3>
              <div class="form-group">
                <label for="titre">titre</label>
                <input type="text" name="titre" class="form-control" id="titre" aria-describedby="emailHelp" placeholder="">
                <small id="titre" class="form-text text-muted">titre du Rapport</small>
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea name="descrp" class="form-control" id="exampleTextarea" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Partager un document</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" name="fichier[]" class="custom-file-input" id="inputGroupFile02" multiple>
                      <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                  </div>
                </div>
                <small id="fileHelp" class="form-text text-muted">veullez convertir le fichier en format pdf ou doc svp</small>
              </div>
              <button type="submit" class="btn btn-primary">Poster le rapport</button>
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
