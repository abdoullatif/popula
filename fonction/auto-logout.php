<?php
$now = time();
$resulta = $now - $_SESSION['last_action'];
if ($resulta < 600000){
    $_SESSION['last_action'] = time ();
} else {
    header('Location: log-out.php');
}