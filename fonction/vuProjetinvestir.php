<?php session_start ();
include_once 'connect-bd.php';
include_once 'displayProjet.class.php';

$affichage = new displayProjet();
/// louer 
if (isset($_POST['immo']) && !empty($_POST['immo'])){
    ///
    $immo = htmlspecialchars($_POST['immo']);
    if ($immo == "all"){
      $investir = $affichage->getProjetTransact("investissement");
    }else{
      $investir = $affichage->getProjetTransactandCat("investissement",$immo);
    }
  
  }else {
    // on recupere les annonces
    $investir = $affichage->getProjetTransact("investissement");
    // ici on recupere les Projet specifique en fonction de categories immobilier !
  }

  while($donnee = $investir->fetch()){
    //tout ce passe ici !
    $donneeImg = $affichage->getImageProjet($donnee['id']);

?>
    <!-- Projet -->

              <!-- Project One http://placehold.it/700x300-->

              <div class="row">
                <div class="col-md-7">
                  <a href="voir-projet.php?id_projet=<?php echo $donnee['id']; ?>&amp;id_user=<?php echo $donnee['id_users'];?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $donneeImg['chemin']; ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3><?php echo $donnee['nom']; ?></h3>
                  <p><?php echo $donnee['descrp']; ?></p>
                  <a class="btn btn-primary" href="voir-projet.php?id_projet=<?php echo $donnee['id']; ?>&amp;id_user=<?php echo $donnee['id_users'];?>">Voir
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <a class="btn btn-primary" value="<?php echo $donnee ['id'] ?>">favorie
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  <!--
                  <a class="btn btn-primary" href="#">Voter
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                  -->
                  <p class="text-success msg"></p>
                </div>
              </div>
              <!-- /.row -->

              <hr>

<?php
  }
  ////////////////////////////////////////////////////////////////////////////////
?>

<script>
  $(document).ready(function(){
    //
    $('.fav').click(function(){
        //
        var fav = $(this).attr("value");
        favoris(fav);
    });
    //
    function favoris(fav){
      //debut de la function !
      $.post('fonction/favoris.php',{id_annonce:fav},function(data){
        //ici on returne quelque chose pour dire a l'utilisateur que c'est enregister :)
        $('.msg').html(data);
      });
      return false;
    }
  });
</script>