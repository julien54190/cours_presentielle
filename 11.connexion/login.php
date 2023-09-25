<?php  require_once('../5.base_php/db.php') ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<form action="" method="post">
        <pre>
            <label for="User">Pseudo ou Mail :</label>
            <input type="text" name="User" id="User">
            <label for="password">Mot de passe :</label>
            <input type="password" name="Password" id="Paswword">
            <input type="submit" value="Se connecter">
            <a href="register.php">Vous n'avez pas de compte ?</a>
        </pre>
    </form>
    <?php
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare('SELECT * FROM Inscription WHERE (User = ? OR Mail = ?) AND Password = ?');
        $select->execute(array(
            $_POST['User'],
            $_POST['User'],
            sha1($_POST['Password'])
        ));
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(!empty($select)) {
            session_start();
            $_SESSION = $select;
            header('location: index.php');
        } else{
            echo "<script>alert('Le mot de passe ou le pseudo n\'est pas bon')</script>";
        }
    }
    ?>
</body>
</html>