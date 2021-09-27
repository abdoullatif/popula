<?php session_start();
include_once'fonction/connect-bd.php';
$bdd=bdd();
// verification de temps de connection !
if (isset($_SESSION['last_action']) and $_SESSION['last_action'] < time()+60){
  // si la desrnier action date de moins 5min alors il est dans les regles :)
  // mis a jour de last_action
  $_SESSION['last_action'] = time()+60;
} else if (!isset($_SESSION['last_action'])){
  //on ne fait rien
} else {
  // il n'est pas dans les regle, on le deconnecte :( .
  header('Location: log-out.php');
}
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
    <!-- font awesome -->
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
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
            <!--Navigation links with a Smooth SCroll effect-->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#how"><strong>Comment ça marche</strong><i class="fa fa-question-circle-o"></i></a>
            </li>
            <!--Smooth SCroll effect end-->
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

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 81px;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below // http://placehold.it/1900x1080-->
          <div class="carousel-item active" style="background-image: url('image/slide/explorer.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3 >Explorer</h3>
              <p style="color: white;background: #212121;opacity: 0.8;">Trouver votre logement de rêve sans vous deplacer</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('image/slide/ensemble.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>(Financement participatif)</h3>
              <p>Devener investisseur immobilier et ensemble participons au developpement du pays.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('image/slide/batir.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white;background: #212121;opacity: 0.6;">Ensemble construissons une Afrique meilleur</h3>
              <p style="color: white;background: #212121;opacity: 0.6;">la nouvelle revolution Africaine</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
      <h3 class="titre lead">Popula, le site d'annonces immobilières nouvelle génération</h3>
      <p class="text-muted justifier"><!--Quelle que soit la situation, la famille qui s'agrandit, les difficultés financières, 
      une mutation ou une envie de changement, la recherche d'un nouveau logement est un moment de vie important mais qui 
      peut être parfois stressant. Pour nous, un site d'annonces immobilières ne devrait pas être noyé dans la publicité et 
      le profit mais, au contraire offrir une expérience inédite et enrichissante. Chez Popula, nous en sommes pleinement 
      conscients et nous nous sommes fixés pour mission de vous faciliter la recherche, afin que vous puissiez vous concentrer 
      sur ce qui est important pour vous : trouver l'habitation de vos rêves.-->
      Envie d’acheter une maison avec jardin, de louer un appartement avec terrasse, de trouver un terrain constructible ou 
      d’investir dans l’immobilier ? Avec Popula, vous accédez aux annonces en quelques clics : saisissez vos critères, lancez 
      la recherche et accédez immédiatement aux résultats les plus pertinents. Dès qu’une annonce de bien retient votre 
      attention dans la liste de résultats, vous n’avez plus qu’à la consulter, la mettre en favoris, contacter l’agence 
      immobilière ou directement le propriétaire pour la visiter. Tous les renseignements essentiels concernant la location, 
      le bail ou la vente du logement sont disponibles, vous permettant de choisir en toute confiance.</p>

      <!--introduction explorer-->
      <!--
      <div class="col-lg-9 mb-4" style="margin: auto;">
      <h3 class="titre lead">Rechercher votre bien parmie toute les annonce poster sur le site</h3>
      <span class="espace"></span>
      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix/mois</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix/mois</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix/mois</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Prix</a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
      </div>
      </div>
      -->
      <!-- /.row -->

      
      <!--end-->
      <!--
      <span class="espace"></span>
      <h3 class="titre lead mx-auto" id="how">Comment ça marche ?</h3>-->
      
      <!-- h work Section -->
      <p class="text-muted justifier"><!-- explication en haut !!! --></p>
      <!-- chronologie comment sa marche  !!! -->
      <h1 class="titre" id="how">Comment ça <span>marche ?</span></h1>

      <div class="containerT">

        <div class="timeline-block timeline-block-right">
            <div class="marker"></div>
            <div class="timeline-content">
              <h3>Rechercher et selection</h3>
              <span></span>
              <p>Recherchez votre logement idéal. Les descriptions de la propriété et du quartier, vous aideront dans votre 
                prise de décision. N´oubliez pas de vérifier les conditions du propriétaire avant d´effectuer la demande de 
                réservation!</p>
            </div>
        </div>

        <div class="timeline-block timeline-block-left">
            <div class="marker"></div>
            <div class="timeline-content">
              <h3>Réservez la propriété</h3>
              <span></span>
              <p>Lorsque vous effectuez une demande de réservation via notre agence, la propriété est bloquée jusqu´à ce que 
                le propriétaire réponde à votre demande (jusqu´à un maximum de 24h). Lorsque le propriétaire accepte, 
                votre mode de paiement sera automatiquement débité (Orange Money, mobile money, visa, mastercard). Vous avez 
                aussi la possibilité de reservé directement votre logement en contactant directement le proprietaire.</p>
            </div>
        </div>

        <div class="timeline-block timeline-block-right">
            <div class="marker"></div>
            <div class="timeline-content">
              <h3>Confirmation</h3>
              <span></span>
              <p>Dès que le propriétaire accepte la réservation, votre mode de paiement initialement sélectionné sera 
                automatiquement débité. Nous vous mettrons en contacte avec le propriétaire afin que vous organisiez votre arrivée, 
                réception des clefs et transfert des documents mentionnés dans les conditions du propriétaire.</p>
            </div>
        </div>

        <div class="timeline-block timeline-block-left">
            <div class="marker"></div>
            <div class="timeline-content">
              <h3>Date d'entrée</h3>
              <span></span>
              <p>Voilà; cette propriété est la votre! Le propriétaire est maintenant votre contact principal, cependant 
                popula reste à votre disposition si vous rencontrez des difficultés de communication. Tout ce qui vous reste 
                à faire est de récupéré vos clefs et signer votre bail de location.</p>
            </div>
        </div>

        <div class="timeline-block timeline-block-right">
            <div class="marker"></div>
            <div class="timeline-content">
              <h3>Dernièrement</h3>
              <span>Démenagement</span>
              <p>popula mets a votre disposition les meilleur entrepise de demenagement, de mobilier, d'une entreprise de décoration
                d'une entreprise de costruction, d'une agence de securité ou d'entretient afin de faciliter vos recherche.
              </p>
            </div>
        </div>
      </div>
      <!-- end chronologie// !!! -->

      <!--boutton explorer-->
      <div class="col-lg-4" style="margin: auto;">
        <a href="index.php" style="text-decoration: none;">
          <button type="button" class="btn btn-primary btn-lg btn-block">Recherche logement</button>
        </a>
        <span class="espace"></span>
      </div>
      <span class="espace"></span>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" src="image/icon/how.png" alt="">
      <!-- /how work -->

      <div class="row">
        <div class="col-lg-6">
          <a href="#"><img class="card-img-top" src="image/icon/explorer.png" alt=""></a>
          <h4 class="titre lead">Explorer</h4>
          <p class="text-muted">Vous souhaitez acheter, louer, bailler ou vous rechercher un colocataire. Popula vous offre la possibilité de trouver votre logement de rêve depuis votre canapé, plus besoin de vous déplacer pour trouver le logement qui vous intéresse, la fonction explore vous permet de parcourir toute les annonces poster sur le site, entrer vos préférences faite une recherche et trouver votre logement de rêve.</p>
        </div>
        <div class="col-lg-6">
          <a href="#"><img class="card-img-top" src="image/icon/projet.png" alt=""></a>
          <h4 class="titre lead">Projet</h4>
          <p class="text-muted">Etes-vous un investisseur, un préteur ou un donateur vous souhaiter investir dans l’immobilier, vous rêvez de financer, développer des infrastructures du pays, vous rêvez de contribuer à un grand projet. Popula est là pour vous !
            La fonction projet vous permet de parcourir tous les projet immobilier poster sur le site en quête d’investissement, de près ou de dons. Parcourer de nombreux projet et apporter votre contribution si vous êtes intéressé.
          </p>
        </div>
      </div>

      <hr>
      <!-- Features Section -->
      <div class="row" style="background: #fafafa;border-radius: 5px;box-shadow: 0 0 5px #fafafa;">
        <div class="col-lg-6">
          <h5 class="lead">Rechercher une propriete</h5>
          <p class="text-muted"></p>
          <ul class="text-muted">
            <li>
              villa ou appartement
            </li>
            <li>hotel</li>
            <li>studio</li>
            <li>immeuble</li>
            <li>terrain</li>
          </ul>
          <p class="text-muted">Le logement qu'il vous faut est déjà sur popula Quel que soit votre projet immobilier – 
            acheter, louer, vendre ou investir – vous trouverez sur popula toutes les solutions correspondant à vos besoins. 
            popula vous propose le meilleur des offres immobilières disponibles partout en Guinee, dans le neuf comme dans 
            l’ancien : le logement de vos rêves est probablement déjà là et n’attend que vous !
          </p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="image/icon/house-searcher.png" alt="chercher une maison">
        </div>
      </div>
      <!-- /.row -->

      <hr/>

      <!-- Features Section -->
      <div class="row" style="background: #fafafa;border-radius: 5px;box-shadow: 0 0 5px #fafafa;">
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="image/icon/house-buy.png" alt="">
        </div>
        <div class="col-lg-6">
          <h4 class="lead">Trouver un acheteur, un locataire, un investisseur.</h4>
          <p class="text-muted">Devenez un baron de l'immobilier</p>
          <ul class="text-muted">
            <li>
              Vendre
            </li>
            <li>louer</li>
            <li>Bailler</li>
            <li>Construire</li>
          </ul>
          <p class="text-muted">Envies de vendre, de louer, bailler votre bien immobilier. Popula est là pour vous ! vous 
            n’avez plus besoins de contacter des démarcheurs ou de passer vos journées a recherche un acheteur laisser 
            Popula s’en charger à votre place. Connecter vous sur le site prenez des photos, remplissez le formulaire, 
            entrer vos conditions et poster. C’est gratuit et sans frais. Popula vous permet de vendre, louer, bailler 
            gratuitement et un clic.</p>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Projet Section -->
      <!-- investissement (Section) -->
      <h3 class="titre lead">Investissement</h3>
      <h4 class="titre lead">Simple, transparent, collaboratif</h4>
      <p class="text-muted">Besoin d’investissement, d’un près, d’un crédit immobilier ou d’un don pour financer, réalisé votre projet immobilier, Popula répond à vos besoins.
        Grace a sa plateforme simple, transparent, collaboratif qui permet de mettre en relation investisseur et entrepreneur, publier ou poster votre projet sur la plateforme et recevez votre investissement.
        Option projet est une fonctionnalité de Popula base sur le crowdfunding (Investissement participatif) son objectif vise à promouvoir le financement dans l’immobilier afin d’améliorer les conditions de vie de nos populations. la fonctionnalité projet met en relation les investisseur potentiel et les porteur de projet, plusieurs investisseur peuvent investirent sur un seul projet afin de vite atteindre objectif de financement fixe par le porteur de projet ou de pouvoir obtenir le financement escompter.
      </p>

      <!-- type d'investissements -->
      <h3 class="titre lead">Qu’est-ce que le Crowdfunding Immobilier ?</h3>
      <h6 class="titre lead">Découvrez un modèle d’investissement innovant</h6>
      <p class="text-muted">Le « crowdfunding immobilier », également appelé financement participatif, permet à des investisseurs particuliers de se regrouper sur une plateforme en ligne pour participer au financement de diverses opérations immobilières. Une plateforme de financement participatif immobilier permet de mettre en relation des particuliers investisseurs avec des porteurs de projets.</p>
      <h6 class="titre lead">Découvrez le financement participatif dans l’immobilier sur Popula</h6>
      <p class="text-muted">Les crowdfunders qui financent le programme immobilier souscrivent à un emprunt obligataire émis par la société mère du promoteur immobilier ou dans une société de projet créée spécialement pour le programme immobilier. Le taux de rendement contractuel est fixé en amont du projet. Les investisseurs récupèrent le montant de leur souscription ainsi que les intérêts perçus lorsque le projet est terminé et commercialisé – en moyenne sous 12 à 24 mois*.</p>
      <!-- type de financement Section -->
      <h3 class="titre lead">Quels types de constructions immobilières<br>sont financées par le crowdfunding sur popula ?</h3>

      <!-- type de financement Section /// http://placehold.it/700x400-->
      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/logements.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#" >Logements</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!--></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/bureaux.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#">Bureaux</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.--></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/industrie.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#">Locale industriel</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!--></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/centre.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#">Locale commerciale</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.--></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/loisir.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#">Loisir</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.--></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/icon/education.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title titre lead">
                <a href="#">Education</a>
              </h4>
              <p class="card-text"><!--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.--></p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!--boutton explorer-->
      <div class="col-lg-4" style="margin: auto;">
        <a href="projet.php" style="text-decoration: none;">
          <button type="button" class="btn btn-primary btn-lg btn-block">Voir les projets</button>
        </a>
        
      </div>
      <!--end-->

      <span class="espace"></span>

      <h3 class="titre lead">Quels produits financiers sont proposés pour l’investissement dans l’immobilier ?</h3>
      <p class="text-muted">Popula propose deux types de titres financiers pour vos placements dans l’immobilier. Le produit financier est toujours déterminé avant la levée de fonds.</p>
      <!-- /.eof -->
      <!-- action and obligation-->
      <div class="row">
        <div class="col-lg-6">
          <a href="#"><img class="card-img-top" src="image/icon/obligation.png" alt=""></a>
          <h4 class="titre lead">Obligations</h4>
          <p class="text-muted">La plupart du temps, la société de projet émet un emprunt obligataire auquel les crowdfunders peuvent souscrire à partir de 1 000 000 gnf. Les intérêts sont perçus chaque année ou in fine. En moyenne, les investisseurs ont perçu 10% de rendement annuel.</p>
        </div>
        <div class="col-lg-6">
          <a href="#"><img class="card-img-top" src="image/icon/action.png" alt=""></a>
          <h4 class="titre lead">Actions</h4>
          <p class="text-muted justifier">Popula propose aussi d'investir en actions dans la promotion immobilière, notamment via des Club Deals. Ceux-ci permettent à chacun d'investir dans plusieurs programmes de promotion immobilière en même temps en limitant le risque grâce à une diversification des investissements.</p>
        </div>
      </div>

      <span class="espace"></span>
      <div class="col-lg-9 mb-4" style="margin: auto;">
        <h3 class="titre lead"></h3>
        <p class="text-muted justifier">"L'investissement dans des projets immobiliers comporte des risques qu'il convient de connaître : risque de perte totale ou partielle du capital investi, risque d'illiquidité et risque opérationnel du projet pouvant entraîner une rentabilité moindre que prévue. Comprenez-bien ce dans quoi vous investissez, et à défaut, contactez-nous"</p>
      </div>
      <span class="espace"></span>

      <!--
      <div class="col-lg-6 mb-4" style="margin: auto;">
        <h3 class="titre lead">Donnation</h3>
        <p class="text-muted">"L'investissement dans des projets immobiliers comporte des risques qu'il convient de connaître : risque de perte totale ou partielle du capital investi, risque d'illiquidité et risque opérationnel du projet pouvant entraîner une rentabilité moindre que prévue. Comprenez-bien ce dans quoi vous investissez, et à défaut, contactez-nous"</p>
      </div>-->

      <!--end obligation and action-->

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" src="image/icon/popula-idea.png" alt="">

      <hr/>
      

      <!-- Call to Action Section -->
      <!--<h3 class="titre lead">Projet Vedette de la semaine</h3>-->
      <!-- lessssssss projet vvedettteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#" class="lead">Project One</a>
              </h4>
              <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#" class="lead">Project Two</a>
              </h4>
              <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#" class="lead">Project Three</a>
              </h4>
              <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#" class="lead">Project Four</a>
              </h4>
              <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
      </div>
      -->

      <span class="espace"></span>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container" style="color: white;">
        <div class="row">
          <div class="col-lg-3">
            <h6 class="lead" style="color: #536dfe;">Popula</h6>
            <a href="#" style="color: white;"><p>A propos de nous</p></a>
            <a href="#" style="color: white;"><p>Partenaire</p></a>
            <a href="#" style="color: white;"><p>Rejoignez-nous</p></a>
            <a href="#" style="color: white;"><p>stage</p></a>
            <a href="#" style="color: white;"><p>Ambassadeur</p></a>
            <a href="#" style="color: white;"><p>Terme et conditions</p></a>
            <a href="#" style="color: white;"><p>Politique de cookies</p></a>
            <a href="#" style="color: white;"><p>Politique de confidentialité</p></a>
            <a href="#" style="color: white;"><p>toute les annonce de location</p></a>
          </div>
          <div class="col-lg-2">
            <h6 class="lead" style="color: #536dfe;">Locataire</h6>
            <a href="#" style="color: white;"><p>Comment sa marche</p></a>
            <a href="#" style="color: white;"><p>Forum</p></a>
            <a href="#" style="color: white;"><p>Aide</p></a>
            <a href="#" style="color: white;"><p>Contacter-nous</p></a>
            <h6 class="lead" style="color: #536dfe;">Promoteur</h6>
            <a href="#" style="color: white;"><p>Publier votre proprieter</p></a>
            <a href="#" style="color: white;"><p>Aide</p></a>
            <a href="#" style="color: white;"><p>Contacter-nous</p></a>
          </div>
          <div class="col-lg-4">
            <h6 class="lead" style="color: #536dfe;">Aide</h6>
            <a href="#" style="color: white;"><p>Assistance client</p></a>
            <p>Tel : 664 39 49 02</p>
            <p>Email :<a href="#" style="color: white;"> popula-afrique@gmail.com</p></a>
          </div>
          <div class="col-lg-3">
            <h6 class="lead" style="color: #536dfe;">Nous suivre :</h6>
            <a href="#" style="color: white;"><p style="float: left;"><img src="image/icon/icons8_Facebook_Old_50px.png"></p></a>
            <a href="#" style="color: white;"><p style="float: left;"><img src="image/icon/icons8_twitter_50px.png"></p></a>
            <a href="#" style="color: white;"><p style="float: left;"><img src="image/icon/icons8_instagram_new_50px.png"></p></a>
            <a href="#" style="color: white;"><p style="float: left;"><img src="image/icon/icons8_linkedin_50px.png"></p></a>
          </div>
          <!--
          <div class="col-lg-2">
            <h6 class=""></h6>
            <h6 class=""></h6>
            <p class="text-muted"></p>
          </div>
          -->
        </div>
        <hr style="background: white;"/>
        <p>Popula est un site qui a pour but d'aider les population, si vous aimez nos services, vous etes satisfait, vous apprecier notre iniatif alors faite nous un <a href="#">Dons</a></p>
        <p class="m-0 text-center text-white">Copyright &copy; popula <?php echo date("Y"); ?> By Abdoulatif S. SOOBA</p>
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
