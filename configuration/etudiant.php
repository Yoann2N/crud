<?php
    include 'composants/start.php';
    
    if (isset($_GET['id'])) {
        require_once 'config.php';
        $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        
        $requete = $pdo->prepare("SELECT * FROM etudiants WHERE id = :id");
        $requete->execute(array(':id' => $_GET['id']));
        $data = $requete->fetch();
        var_dump($data);
        exit;
    }
    if (isset($_POST['submit'])) {
        require_once 'config.php';
        $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $etudiant = isset($_POST['etudiant']) ? 1 : 0;
        $professeur = isset($_POST['professeur']) ? 1 : 0;

        if (isset($data)) {
            $requete = $pdo->prepare("UPDATE etudiants SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, admin = :admin, etudiant = :etudiant, professeur = :professeur WHERE id = :id");
            $requete->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
                'admin' => $admin,
                'etudiant' => $etudiant,
                'professeur' => $professeur,
                'id' => $data['id']
            ));
            header('Location: etudiants.php');
            exit();
        }
        else 
        {
            $requete = $pdo->prepare("INSERT INTO etudiants (nom, prenom, email, telephone, admin, etudiant, professeur) VALUES (:nom, :prenom, :email, :telephone, :admin, :etudiant, :professeur)");
            $requete->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
                'admin' => $admin,
                'etudiant' => $etudiant,
                'professeur' => $professeur
            ));
            header('Location: etudiants.php');
            exit();
        }
        
        $requete = $pdo->prepare("INSERT INTO etudiants (nom, prenom, email, telephone, admin, etudiant, professeur) VALUES (:nom, :prenom, :email, :telephone, :admin, :etudiant, :professeur)");
        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'admin' => $admin,
            'etudiant' => $etudiant,
            'professeur' => $professeur
        ));
        header('Location: etudiants.php');
        exit();
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
        require_once 'composants/menu.php';
    ?>
    <h1>Etudiant</h1>
 
    <br></br>
  
        
        
        <form class="etudiant" action="etudiant.php" method="post">

        <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        </div>

        <div>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        </div>

        <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        </div>

        <div>
        <label for="telephone">Téléphone :</label>
        <input type="tel" name="telephone" id="telephone" required>
        </div>

        <div class="checkbox">
            <label for="admin">Admin :</label>
            <input type="checkbox" name="admin" id="admin" 
            <?php if (isset($data)) if ($data['admin'] == 1) echo "checked"; ?>>
        </div>

        <div class="checkbox">
        <label for="etudiant">Etudiant :</label>
        <input type="checkbox" name="etudiant" id="etudiant">
        <?php if (isset($data)) if ($data['etudiant'] == 1) echo "checked"; ?>>
        </div>

        <div class="checkbox">
        <label for="professeur">Professeur :</label>
        <input type="checkbox" name="professeur" id="professeur">
        <?php if (isset($data)) if ($data['professeur'] == 1) echo "checked'"; ?>>
        </div>

        <div>
        <input name="submit" type="submit" value = "<?php if (isset($data)) echo "Mettre à jour"; else echo "Ajouter"; ?>">  
        </div>
    </form>
    
</body>
</html>