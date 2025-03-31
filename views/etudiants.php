<?php
    include 'composants/start.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php
        require_once 'composants/menu.php';
    ?>
    <h1>Etudiants</h1>
    <a href="etudiant.php"class = bouton>Ajouter un Etudiant</a>
    <br></br>
    <table>
        
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Admin</th>
            <th>Etudiant</th>
            <th>Professeur</th>
            <th></th>
         </tr>


         <?php
          require_once 'config.php';

          $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
          

          $requete = $pdo->query("SELECT * FROM etudiants ORDER BY nom, prenom");
          while ($data = $requete->fetch()) {
              echo "<tr>";
              echo "<td>" . $data['id'] . "</td>";
              echo "<td>" . $data['nom'] . "</td>";
              echo "<td>" . $data['prenom'] . "</td>";
              echo "<td>" . $data['email'] . "</td>";
              echo "<td>" . $data['telephone'] . "</td>";
              echo "<td>" . $data['admin'] . "</td>";
              echo "<td>" . $data['etudiant'] . "</td>";
              echo "<td>" . $data['professeur'] . "</td>";
              echo '<td><a href="etudiant.php?id='.$data['id'].'" class="bouton vert">Modifier</a>;</a>&nbsp
              <a href="etudiant-supprimer.php?id='.$data['id'].'" class="bouton rouge">Supprimer</a></td>';

              echo "</tr>";
          }
          ?>
        
    </table>
</body>
</html>