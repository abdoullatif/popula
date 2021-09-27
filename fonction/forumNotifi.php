<?php session_start();
include_once 'display.class.php';

// var class
$notifi = new display ();
$noti = array();
$List_notifi = $notifi->getNotifi($_SESSION['id']);
// cherche et afficher les notification du sujet poster par l'auteur
if (!empty($List_notifi)){
    // si tout les commentaire n'ont pas ete vu !
    while($donnee = $List_notifi->fetch()){
        //script html
        $noti[] = $donnee;
    }
    foreach ($noti as $msgs){
        //
        ?>
        <?php $comment = substr($msgs['commentaire'],0,40); $comment .= " ..." ?>
        <a class="dropdown-item" href="forum-post.php?id=<?php echo $msgs['id_sujet'];?>&amp;id_comment=<?php echo $msgs['id'] ?>&amp;comment_status=1"><strong><?php echo $msgs['auteur'].'</strong></br><em>'.$comment?></em></a>
        <?php
    }
} else {
    // script html (pas de notification)
    ?>
        <a class="dropdown-item" href="#"></a>
    <?php
}
?>