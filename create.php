<?php 
require("./config.php");
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create user</title>
</head>

<a href="index.php">Accueil CRUD</a>
    <a href="read.php">Affiche users</a>

<body>
    <h1>Création d'un nouvel utilisateur</h1>
    <form action="#" method="post">
        nom : <input type="text" name="name" /><br />
        email : <input type="text" name="ml" /><br />
        password : <input type="text" name="pass" /><br />
        <input type="submit" value="Enregistrer" name="submit" /><br />
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $n = $_POST["name"];
        $m = $_POST["ml"];
        $mdp = $_POST["pass"];
        $statement = $connexion->prepare("INSERT INTO users(name,email,pwd) VALUES(?,?,?)");
        $statement->bindParam(1, $n, PDO::PARAM_STR);
        $statement->bindParam(2, $m, PDO::PARAM_STR);
        $statement->bindParam(3, $mdp, PDO::PARAM_STR);
        $statement->execute();
        echo ("<hr><span style='color:green;'>User bien enregitré</span><hr>");
    }
    ?>
   

</body>

</html>