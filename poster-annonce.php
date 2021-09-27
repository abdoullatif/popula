<?php
include_once 'fonction/connection.class.php';
include_once 'fonction/posterAnnonce.class.php';

if (isset($_POST['pays']) AND isset($_POST['ville']) AND isset($_POST['commune']) AND isset($_POST['quartier']) AND isset($_POST['adresse']) AND isset($_POST['immobilier'])AND isset($_POST['prix']) AND isset($_POST['devise']) AND isset($_POST['transact']) AND isset($_POST['etat']) AND isset($_POST['interieur']) AND isset($_POST['descrp']) AND isset($_FILES['image']) AND isset($_POST['proprio'])){
  //dimension
  $dimension = (isset($_POST['dimension'])) ? (int) $_POST['dimension'] : 0;
  
  //caracteristique !!!
  $salon = (isset($_POST['salon'])) ? (int) $_POST['salon'] : 0;
  $chambre = (isset($_POST['chambre'])) ? (int) $_POST['chambre'] : 0;
  $salManger = (isset($_POST['salManger'])) ? (int) $_POST['salManger'] : 0;
  $cuisine = (isset($_POST['cuisine'])) ? (int) $_POST['cuisine'] : 0;
  $toilette = (isset($_POST['toilette'])) ? (int) $_POST['toilette'] : 0;
  $piece = (isset($_POST['piece'])) ? (int) $_POST['piece'] : 0;

  //commodite !!!
  $garage = (isset($_POST['garage'])) ? $_POST['garage'] : 0;
  $terrase = (isset($_POST['terrase'])) ? $_POST['terrase'] : 0;
  $annexe = (isset($_POST['annexe'])) ? $_POST['annexe'] : 0;
  $piscine = (isset($_POST['piscine'])) ? $_POST['piscine'] : 0;
  $cas = (isset($_POST['cas'])) ? $_POST['cas'] : 0;
  $toiletteExt = (isset($_POST['toiletteExt'])) ? $_POST['toiletteExt'] : 0;

  //traitement !!!
  $annonce = new posterAnnonce($_POST['pays'],$_POST['ville'],$_POST['commune'],$_POST['quartier'],$_POST['adresse'],$_POST['immobilier'],$_POST['prix'],$_POST['devise'],$_POST['transact'],$salon,$chambre,$salManger,$cuisine,$toilette,$piece,$dimension,$garage,$terrase,$annexe,$piscine,$cas,$toiletteExt,$_POST['etat'],$_POST['interieur'],$_POST['descrp'],$_FILES['image'],$_POST['proprio']);
  $verification = $annonce->verifImage ();
  if ($verification == 'ok'){
    $enregistrement = $annonce->saveAnnonce ();
    if ($enregistrement == 'ok'){
      $id = $annonce->idAnnonce ();
      if ($id == 'ok'){
        //ok tout est bon
        $annonce->saveImg ();
        header('Location: index.php');
      }
    }else {
      $msgErreur = 'une erreur est survenu lors de votre inscription';
    }
  }else {
    $msgErreur = $verification;
  }

}else {
  //$msgErreur = 'Probleme veuiller reessayer !';
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
          if (!isset($_SESSION['id'])){
           ?>
           <!-- phrase d'alerte -->
            <span style="margin: 10em"></span>
            <h5 class="titre text-muted">Veuillez vous <a href="login.php">connecter</a> pour poster une annonce</h5>
            <span style="margin: 10em"></span>
            <!-- formulaire d'inscription -->
            <span style="margin: 10em"></span>
            <?php
          }else {
          ?>
          <!-- formulaire d'inscription -->
          <span class="espace"></span>
          <!-- zone d'erreur -->
          <?php if (isset($msgErreur)){ ?>
          <div class="form-group">
            <p class="text-danger"><?php echo $msgErreur; ?></p>
          </div>
          <?php } ?>
          <form method="POST" enctype="multipart/form-data" action="poster-annonce.php">
            <fieldset>
              <legend></legend>
              <h3 class="titre text-muted">Annonce</h3>
              <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" name="pays" class="form-control" id="pays" aria-describedby="pays" placeholder="Guineé">
                <small id="pays" class="form-text text-muted">Dans quel pays se situe votre bien</small>
              </div>
              <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" class="form-control" id="ville" aria-describedby="ville" placeholder="Ex : Conakry">
                <small id="ville" class="form-text text-muted">Dans quel ville se situe votre bien</small>
              </div>
              <div class="form-group">
                <label for="commune">Commune</label>
                <input type="text" name="commune" class="form-control" id="commune" aria-describedby="commune" placeholder="Ex : Ratoma">
                <small id="commune" class="form-text text-muted">Dans quel commune se situe votre bien</small>
              </div>
              <div class="form-group">
                <label for="Quartier">Quartier</label>
                <input type="text" name="quartier" class="form-control" id="Quartier" aria-describedby="Qartier" placeholder="Ex : kipe">
              </div>
              <div class="form-group">
                <label for="Adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="Address" aria-describedby="address" placeholder="Enter votre adresse">
                <small id="address" class="form-text text-muted">exemple : kiroti, petit simbaya.</small>
              </div>
              <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                      <p class="text-muted">Type de bien :</p>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="villa" class="form-check-input" id="optionsRadios1" checked="">
                          Villa
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="appartement" class="form-check-input" id="optionsRadios1">
                          Appartement
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="immeuble" class="form-check-input" id="optionsRadios1">
                          Immeuble
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="studio" class="form-check-input" id="optionsRadios1">
                          Studio
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="hotel" class="form-check-input" id="optionsRadios1">
                          Hotel
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="terrain"  class="form-check-input" id="optionsRadios1">
                          Terrain
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="bureaux" class="form-check-input" id="optionsRadios1">
                          Bureaux
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="locale commerciale" class="form-check-input" id="optionsRadios1">
                          L Commerce
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="locale industriel" class="form-check-input" id="optionsRadios1">
                          L industriel
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="entrepot" class="form-check-input" id="optionsRadios1">
                          Entrepot
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" name="immobilier" value="parking" class="form-check-input" id="optionsRadios1">
                          Parking
                        </label>
                      </div>
                    </div>
                  </div>
                  <small id="type" class="form-text text-muted">L commerce = locale commerciale, L industriel = locale industriel</small>
                  
              </div>
              <div class="form-group">
                <label for="InputPrix">Prix</label>
                <input type="tel" name="prix" class="form-control" id="InputPrix" aria-describedby="Prix" placeholder="Enter le prix">
              </div>
              <div class="form-group">
                <label for="devise">Devise</label>
                <select class="form-control" name="devise" id="devise">
                  <option value="gnf">Gnf</option>
                  <option value="fcfa">Fcfa</option>
                  <option value="euro">Euro</option>
                  <option value="dollar">Dollar</option>
                  <option value="live">live</option>
                </select>
                <small id="devise" class="form-text text-muted">Choisisser la devise</small>
              </div>
              <div class="form-group">
                <div class="form-row">
                    <div class="col-md-2">
                      <p class="text-muted">Type de transaction</p>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="transact" id="optionsRadios1" value="vendre" checked="">
                          Vendre
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="transact" id="optionsRadios1" value="louer">
                          Louer
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="transact" id="optionsRadios1" value="bailler">
                          Bailler
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="transact" id="optionsRadios1" value="colocation">
                          Colocation
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="">Nombre de piece :</label>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <select id="inputState" name="salon" class="form-control form-control-sm">
                      <option selected>Salon</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="inputState" name="chambre" class="form-control form-control-sm">
                      <option selected>chambre</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="inputState" name="salManger" class="form-control form-control-sm">
                      <option selected>sal a manger</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="inputState" name="cuisine" class="form-control form-control-sm">
                      <option selected>cuisine</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="inputState" name="toilette" class="form-control form-control-sm">
                      <option selected>Toilette</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="inputState" name="piece" class="form-control form-control-sm">
                      <option selected>piece</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Dimension</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="tel" name="dimension" class="form-control" aria-label="dimension (ha)">
                    <div class="input-group-append">
                      <span class="input-group-text">ha</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Commodité :</label>
                <div class="form-row">
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="garage" value="garage">
                          Garage
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="terrase" value="terrase">
                          Terrasse
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="annexe" value="annexe">
                          Annexe
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="piscine" value="piscine">
                          Piscine
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="cas" value="case">
                          Case
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="toiletteExt" value="toiletteExt">
                          Toilette ext
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Etat du bien :</label>
                <select class="form-control" name="etat" id="exampleSelect1">
                  <option>Neuf</option>
                  <option>Ancien</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Interieur</label>
                <select class="form-control" name="interieur" id="exampleSelect1">
                  <option>Non meublé</option>
                  <option>Meublé</option>
                  <option>Luxe</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Description, Condition :</label>
                <textarea class="form-control" name="descrp" id="exampleTextarea" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Selectionner les photo de votre annonce</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="image[]" class="custom-file-input" id="inputGroupFile02" multiple>
                    <label class="custom-file-label" for="inputGroupFile02">selectionner des photos</label>
                  </div>
                </div>
                <small id="fileHelp" class="form-text text-muted">Prenez des photo de votre bien immobilier</small>
              </div>
              <fieldset class="form-group">
                <legend></legend>
                <label>Etes-vous le propriétaire :</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="proprio" id="optionsRadios1" value="oui" checked="">
                    Oui
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="proprio" id="optionsRadios2" value="non">
                    non
                  </label>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <legend></legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="signature" required>
                    En cliquant sur poster vous accepter nos condition d'annonce
                  </label>
                </div>
              </fieldset>
              <button type="submit" class="btn btn-primary">Poster votre annonce</button>
            </fieldset>
          </form>
          <span class="espace"></span>
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
        <p class="m-0 text-center text-white">Copyright &copy; Popula <?php echo date("Y"); ?></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
