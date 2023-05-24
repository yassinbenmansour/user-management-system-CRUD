<?php
require("./config.php");
?>

<!DOCTYPE html>
<html>


<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
        <title>Modify</title>
</head>

<body>
        <a href="index.php">Accueil CRUD</a>
        <a href="read.php">Affiche users</a>

        <h2>Affiche user a modifier</h2>

        <?php
        $id = $_GET['id'];
        $statement = $connexion->prepare("SELECT * FROM users WHERE id = ?");
        $statement->bindParam(1, $id);
        $statement->execute();
        $data = $statement->fetchAll();

        if (isset($_POST['submit'])) {
                $nom = $_POST['nm'];
                $mal = $_POST['ml'];
                $pse = $_POST['pass'];
                $id = $_POST['id'];
                $statement = $connexion->prepare("UPDATE users SET name = '$nom', email = '$mal', pwd = '$pse' WHERE id = '$id'");

                if ($statement->execute()) {
                        echo ("<hr><span style='color:green;'>User bien updated</span><hr>");
                } else {
                        echo ("<hr><span style='color:red;'>Erreur lors de la Mise a jour</span><hr>");
                }
        }
        ?>


        <form action="modify.php" method="POST">
                <input type="text" name="nm" value="<?php echo $data[0]['name']; ?>">
                <input type="text" name="ml" value="<?php echo $data[0]['email']; ?>">
                <input type="text" name="pass" value="<?php echo $data[0]['pwd']; ?>">
                <input type="text" name="id" value="<?php echo $data[0]['id']; ?>">

                <input type="submit" name="submit" value="Update">
        </form>


</body>

</html>