<?php
require("./config.php");
?>

<html>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
        <title>Delete</title>
</head>

<body>
        <a href="index.php">Accueil CRUD</a>
        <a href="read.php">Affiche users</a>
        <h2>Affiche user a supprimer</h2>

        <?php
        $id = $_GET['id'];
        $statement = $connexion->prepare("DELETE FROM users WHERE id=?");
        $statement->bindParam(1, $id);
    
        if ($statement->execute()) {
            echo ("<hr><span style='color:green;'>User bien supprimé</span><hr>");
        } else {
            echo ("<hr><span style='color:red;'>Erreur lors de la suppression de l'utilisateur</span><hr>");
        }

        ?>
</body>

</html>