suppression d'un étudiant

<?php
    include 'config.php'; // On inclut la connexion à la base de données
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); 

    $id = $_GET['id']; // On récupère l'id de la personne à supprimer dans l'URL
    $requete = $pdo->prepare('DELETE FROM Etudiants WHERE (id = :id)');
    $requete->execute(array(':id' => $id));

    header('Location: etudiants.php');
    exit;
?>