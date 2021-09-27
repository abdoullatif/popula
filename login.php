<?php session_start ();
include_once'fonction/connect-bd.php';
include_once'fonction/connection.class.php';
$bdd=bdd();

if (isset($_POST['email']) AND isset($_POST['mdp'])){
  $connection = new connection ($_POST['email'],$_POST['mdp']);
  $verif = $connection->verification ();
  if ($verif == 'ok'){
    // on verifie si l'utilisateur est connecter :)
    $verif_connect = $connection->connect_status ();
    if ($verif_connect == 1){
      // l'utilisateur n'est pas connecter
      if ($connection->session()) {
      if ($connection->session1()){
        header('Location: index.php');
      }else {
        $msgErreur = 'une erreur est survenue';
      }
    }
    } else {
      // l'utilisateur est deja connecter !
      $msgErreur = $verif_connect;
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
          <form method="POST" action="login.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Connection</h3>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Entrer votre email" required>
              </div>
              <div class="form-group">
                <label for="password">Mot de pass</label>
                <input type="password" name="mdp" class="form-control" id="password" placeholder="Mot de pass" required>
              </div>
                <?php
                if (isset($msgErreur)){
                  echo '<p class="text-danger">'.$msgErreur.'</p>';
                }
                ?>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    connection automatique.
                  </label>
                </div>
                <span class="espace"></span>
              </fieldset>
              <button type="submit" class="btn btn-primary">connection</button>
            </fieldset>
          </form>
          <span class="espace"></span>
          <p><a href="forgot.php">Mot de passe Oublier ?</a></p>
          <p>Vous n'avez pas de compte cliquer ici <a href="inscription.php">inscription</a> pour vous inscrire.</p>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <span class="espace"></span>

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
