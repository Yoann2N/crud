<div> 
    <ul class = "menu"> 
        <li><a href="index.php">Accueil</a></li> 
        <li><a href="etudiants.php">Etudiants</a></li> 
        <li><a href="Cours.php">Cours</a></li> 
        
        <?php 
        if(isset($_SESSION['utilisateur'])) { 
            echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
        }
        else {
            echo '<li><a href="login.php">Connexion</a></li>';
        }
            ?>
        
    </ul>
</div>