<?php session_start();
include_once'fonction/connect-bd.php';
$bdd=bdd();

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
            <!--Navigation links with a Smooth SCroll effect-->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#how"><strong>Comment ça marche</strong></a>
            </li>
            <!--Smooth SCroll effect end-->
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
              <a class="nav-link" href="login.php"><strong>S'identifier</strong></a>
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

    <h3 class="titre">Annonceur</h3>

    <div class="col-lg-8 mb-4" style="margin: auto;">

        <label for="exampleSelect1">Popula mette a votre disposition tout ceux dont vous avez besoin pour realiser vos reve </label>
        <div class="input-group">
            <select class="form-control" id="exampleSelect1">
                <option>Categorie</option>
                <option>Demenagement</option>
                <option>Meuble</option>
                <option>Decoration</option>
                <option>Coonstruction et renovation</option>
                <option>Securite</option>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Go!</button>
            </span>
        </div>

        <span class="espace"></span>
        <h3 class="lead">Societe de demenagement</h3>
        <span class="espace"></span>

        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">AGS Frasers Guinee</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <a class="btn btn-primary" href="view-item.html">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <a class="btn btn-primary" href="#">faire un devie
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Two -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">CIAD</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <span class="espace"></span>
        <h3 class="lead">Entreprise d'ameubleument</h3>
        <span class="espace"></span>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Jah Jah Electronics et Meuble</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Four -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Galerrie Al jamad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <span class="espace"></span>
        <h3 class="lead">Entreprise de decoration</h3>
        <span class="espace"></span>

        <!-- Project Five -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Boutique de ligh decoration</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Brocila Decor</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <span class="espace"></span>
        <h3 class="lead">Entreprise de renauvation et construction</h3>
        <span class="espace"></span>

        <!-- Project Five -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Sacof</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">le tropical</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <span class="espace"></span>
        <h3 class="lead">Entreprise de securite</h3>
        <span class="espace"></span>

        <!-- Project Five -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">KAS (KRYPTA AFRICA SECURITE)</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Molaci prestation</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <span class="espace"></span>
        <h3 class="lead">Entreprise d'entretient</h3>
        <span class="espace"></span>

        <!-- Project Five -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">studentJob</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3 class="text-muted">Entretient</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container" style="color: white;">
        <div class="row">
          <div class="col-lg-4">
            <h6 class="">Publicite</h6>
            <p class="text-muted">Etes-vous a la recherche, d'une entreprise de demenagement, d'un mobilier, d'une entreprise de renauvation, d'un decorateur, d'une entreprise de construction, d'une agence de securite ou d'entretient ? popula mais a votre disposition les meilleur entreprise dans les dommaine cite afin que vous puissiez realiser votre reve.</p>
          </div>
          <div class="col-lg-2">
            <h6 class="">Entreprise de demenagement</h6>
            <p class="text-muted">Transco</p>
          </div>
          <div class="col-lg-2">
            <h6 class="">Galerie</h6>
            <p class="text-muted">Marifala</p>
            <h6 class="">Decoration</h6>
            <p class="text-muted">Marifala</p>
          </div>
          <div class="col-lg-2">
            <h6 class="">Entreprise de Construction</h6>
            <p class="text-muted">Guicopress</p>
            <h6 class="">Entreprise de Renauvation</h6>
            <p class="text-muted">Agrimo</p>
          </div>
          <div class="col-lg-2">
            <h6 class="">Agence de securite</h6>
            <p class="text-muted">GBS</p>
            <h6 class="">Agence d'entretient</h6>
            <p class="text-muted">GBS managere</p>
          </div>
        </div>
        <p>Popula est un site qui a pour but d'aider les population, si vous aimez nos services,vous etes satisfait, vous apprecier notre iniatif alors faite nous un <a href="#">dons</a></p>
        <p class="m-0 text-center text-white">Copyright &copy; popula 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
