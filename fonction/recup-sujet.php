<?php
include_once 'connect-bd.php';
$bdd = bdd ();

$donnees = array();

$req = $bdd->query("SELECT * FROM sujetforum ORDER by id DESC");
while ($rep = $req->fetch()){
    $donnees[] = $rep;
}

foreach ($donnees as $donnee){
    ?>
    <div class="card mb-4 ">
        <div class="card-body">
            <h3 class="card-title"><?php echo $donnee['titre']; ?></h3>
            <p class="card-text"><?php echo $donnee['sujet']; ?></p>
            <a href="forum-post.php?id=<?php echo $donnee['id']; ?>" class="btn btn-primary">Voir les discussions &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Poster le 
            <?php echo $donnee['date_post']; ?>
            Par 
            <a href="voir-profile-user.php?id_user=<?php echo $donnee['id_user']; ?>"><?php echo $donnee['auteur']; ?></a>
        </div>
    </div>
    <?php
}
?>