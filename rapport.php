<?php
include_once 'fonction/connect-bd.php';
include_once 'fonction/posterProjet.class.php';



?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="abdoulatif souleymane sooba" content="">

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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h3 class="titre">Rapport d'evolution du projet</h3>

      <div class="panel panel-default">
        <div class="panel-heading">Rapport 1 Posted on January 1, 2017 by
        <a href="voir-profile-user.php">Porteur de projet</a><i class="fa fa-link fa-1x"></i></div>
        <div class="panel-body">
          <p>Description</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
        </div>
      </div>
      <p><a href="#">voir les documents</a></p>

      <div class="col-md-8" style="margin: auto;">
        <h5 class="titre">commentaire</h5>
        <!--formulaire poster un commentaire-->
        <div class="form-group">
          <div class="form-row">
            <div class="form-group col-md-10">
              <input type="text" class="form-control form-control-sm" placeholder="Entrer votre Commentaire">
            </div>
            <div class="form-group col-md-2">
              <input value="commenter" type="submit" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <!--end-->
        <!-- commentaire Post -->
        <div class="card mb-4">
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="voir-profile-user.php">Investisseur</a>
          </div>
        </div>
        <!--end-->
      </div>
      <span class="espace"></span>
      <!--rapport 2 -->
      <div class="panel panel-default">
        <div class="panel-heading">Rapport 2 Posted on January 1, 2017 by
        <a href="voir-profile-user.php">Porteur de projet</a><i class="fa fa-link fa-1x"></i></div>
        <div class="panel-body">
          <p>Description</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
        </div>
      </div>
      <p><a href="#">voir les documents</a></p>

      <div class="col-md-8" style="margin: auto;">
        <h5 class="titre">commentaire</h5>
        <!--formulaire poster un commentaire-->
        <div class="form-group">
          <div class="form-row">
            <div class="form-group col-md-10">
              <input type="text" class="form-control form-control-sm" placeholder="Entrer votre Commentaire">
            </div>
            <div class="form-group col-md-2">
              <input value="commenter" type="submit" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <!--end-->
        <!-- commentaire Post -->
        <div class="card mb-4">
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="voir-profile-user.php">Investisseur</a>
          </div>
        </div>
        <!--end-->
      </div>

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
