<?php
include_once 'connect-bd.php';

$bdd = bdd ();

$donnees = array();

$id = htmlspecialchars($_POST['id_post']);
$req = $bdd->query("SELECT * FROM commentaire_forum WHERE id_sujet = '$id' ORDER by id DESC");
while($rep = $req->fetch()){
    $donnees[] = $rep;
}

foreach ($donnees as $donnee){
    //
?>
    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text"><?php echo $donnee['commentaire'] ?></p>
        </div>
        <div class="card-footer text-muted">
        Poster le 
        <?php echo $donnee['date_coment'] ?> par
            <a href="voir-profile-user.php?id_user=<?php echo $donnee['id_user'] ?>"><?php echo $donnee['auteur'] ?></a>
        </div>
    </div>

<?php
}
?>