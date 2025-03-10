<?php
session_start();
if (!isset($_SESSION['utilisateur'])) { // donc pas connecté car pas de session

    //echo "<h2>Vous n'êtes pas connecté !</h2>";   
    header('Location: login.php');
    exit;
}
?>