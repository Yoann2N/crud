<?php
    session_start();

    require_once 'config.php';

    $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
     if (isset($_POST['utilisateur'])) echo "<br>" .$_POST['utilisateur'];
     if (isset($_POST['mot_de_passe'])) echo "<br>" .$_POST['mot_de_passe'];
     
     if (isset($_POST['submit'])){

        $utilisateur = $_POST['utilisateur'];
        $mot_de_passe = $_POST['mot_de_passe'];

       // $query = $pdo->prepare("SELECT * FROM utilisateurs WHERE email =" . $utilisateur); trop dangereux car faille SQL injection
        $requete = $pdo->prepare("SELECT * FROM Etudiants WHERE email = :utilisateur ");
        $requete->execute(array('utilisateur' => $utilisateur));
        $data = $requete->fetch();
       // var_dump($data);
     
        if($data) {
            if (password_verify($mot_de_passe , $data['mot_de_passe'])) {
                $_SESSION['utilisateur'] = $utilisateur;
                header('Location: index.php');
                exit;
            }
            else {
                echo "user name ou password invalide";
            }
        }else {
            echo "user name ou password invalide";
        }


        //echo " Le formulaire a été envoyé<br>";

        //echo " Utilisateur :  . $utilisateur<br>";
       // echo " Mot de passe :  . $mot_de_passe<br>";

    if($utilisateur == "admin" && $mot_de_passe == "admin") {
        $_SESSION['utilisateur'] = $utilisateur;
      header('Location: index.php');
      exit;
    }
    else {
      echo "Login ou mot de passe incorrect";
    }
}
        
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connectez-vous ! </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once 'composants/menu.php';
    ?>
    <h1>Connectez-vous !</h1>
    <form action="login.php" method="post">

        <label for="utilisateur">Login</label>
        <input type="text" name="utilisateur" id="utilisateur" required>

        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        
        <button name ="submit" type ="submit">Se connecter</button>

    </form>
</body>
</html>