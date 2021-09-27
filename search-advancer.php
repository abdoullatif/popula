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

      <!-- Page Heading/Breadcrumbs -->
      <h3 class="titre text-muted">Recherche avancer</h3>

      <div class="list-group">
        <div class="list-group-item">
          <h6 class="centrer text-muted"><strong>Rechercher</strong></h6>
          <div class="form-row">
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="pays">
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="ville">
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="commune">
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="Quartier">
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="Adresse">
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>chambre</option>
                <option>1</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>salon</option>
                <option>1</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>sal a manger</option>
                <option>1</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>cuisine</option>
                <option>1</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>Toilette</option>
                <option>1</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>Etage</option>
                <option>1</option>
              </select>
            </div>

            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="Dimension m2">
            </div>

            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>villa</option>
                <option>appartement</option>
                <option>studio</option>
                <option>hotel</option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>louer</option>
                <option>Acheter</option>
                <option>Bail</option>
                <option>Colocation</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <select id="inputState" class="form-control form-control-sm">
                <option selected>Neuf</option>
                <option>Ancien</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="Budjet min">
            </div>
            <div class="form-group col-md-2">
              <input type="text" class="form-control form-control-sm" placeholder="Budjet max">
            </div>

          </div>

          <!--tableau interieur search bar commodite checkbox -->
          <div class="form-row">
              <div class="col-md-2">
                <p class="text-muted">Commodite :</p>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Garage</label>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck2">
                  <label class="custom-control-label" for="customCheck2">Annex</label>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck3">
                  <label class="custom-control-label" for="customCheck3">piscine</label>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck4">
                  <label class="custom-control-label" for="customCheck4">magasin</label>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck5">
                  <label class="custom-control-label" for="customCheck5">cave</label>
                </div>
              </div>
            </div>
            <!--bouton rechecher-->
            <div class="col-md-2">
                <input value="chercher" type="submit" class="form-control form-control-sm">
            </div>
            <!--end-->
          </div>
        </div>
      <!--fin -->

      <!-- Project One -->

      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3 class="text-muted">Prix</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          <a class="btn btn-primary" href="#">Voir
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <a class="btn btn-primary" href="#">add favorie
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
          <h3 class="text-muted">Prix</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
          <a class="btn btn-primary" href="#">Voir
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3 class="text-muted">Prix</h3>
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
          <h3 class="text-muted">Prix</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
          <a class="btn btn-primary" href="#">Voir
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
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
