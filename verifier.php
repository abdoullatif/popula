<?php
include_once 'fonction/connection.class.php';
$bdd=bdd ();
if (isset($_GET['cle_comfirm'])){
    //verification de l'adresse de l'utilisateur
    $cle_comfirm = $_GET['cle_comfirm'];
    $req = $bdd->prepare('SELECT cle_comfirm,verifier FROM users WHERE cle_comfirm = :cle_comfirm');
    $req->execute(array('cle_comfirm'=>$cle_comfirm));
    $donnee = $req->fetch();
} else {
    //si non 
    $Msg = "Eurreur veuiller ressailler";
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

    <!-- Mes script JS -->
    <script src="function/script.js"></script>
    <!-- JQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- logo favicon icon -->
    <link rel="shortcut icon" href="image/popula-favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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

      <div class="poste">

        <!-- Blog Entries Column -->

        <!-- Sidebar Widgets Column -->
        <div class="">
          <?php
          if ($donnee['cle_comfirm'] ==  $cle_comfirm){
            $req2 = $bdd->query('UPDATE users SET verifier = 1 WHERE cle_comfirm = \''.$cle_comfirm.'\'');
           ?>
           <!-- phrase d'alerte -->
            <span style="margin: 10em"></span>
            <h5 class="titre text-muted">Adresse email comfirmer cliquer ici <a href="index.php">Annonces</a> pour continuer</h5>
            <span style="margin: 10em"></span>
            <!-- formulaire d'inscription -->
            <span style="margin: 10em"></span>
            <?php
          }else {
              // si nom
              ?>
              <!-- phrase d'alerte -->
            <span style="margin: 10em"></span>
            <h5 class="titre text-muted">Erreur de comfirmation veuiller ressaiyez !</h5>
            <span style="margin: 10em"></span>
            <!-- formulaire d'inscription -->
            <span style="margin: 10em"></span>
              <?php
          }
          ?>

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
