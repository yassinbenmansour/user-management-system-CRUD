<?php 
require("./config.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <title>Read</title>
</head>
<body>
<a href="index.php">Accueil CRUD</a>
<a href="create.php">ajouter users</a>
<h2>Liste des utilisateurs</h2>

<?php

$statement = $connexion->prepare("SELECT * FROM  users");
$statement->execute();
$data=$statement->fetchAll();
?>

<table border="1">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach($data as $ligne)
            echo "<tr>
                <td>".$ligne["id"]."</td>
                <td>".$ligne["name"]."</td>
                <td>".$ligne["email"]."</td>
                <td>".$ligne["pwd"]."</td>
                <td> 
                    <a href='modify.php?id=".$ligne["id"]."'>Modifier</a>
                    <a href='delete.php?id=".$ligne["id"]."'>Supprimer</a>
                </td>";
        ?>
    </tbody>
</table>


</body>
</html>