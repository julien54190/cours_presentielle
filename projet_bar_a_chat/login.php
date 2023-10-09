<?php require_once('bdd/dbcat.php') ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/style.css"> 
    <title>Connexion</title>
</head>
<body>
    <?php include 'inc/herder.php'; ?>
    <br><br><br><br>

    <form method='post'>
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Se connecter">
            <a href="register.php">Vous n'avez pas de compte ?</a>
        </div>
    </form>

    <?php 
        if (isset($_POST) && !empty($_POST)){
            $select = $bdd->prepare('SELECT * FROM Bar_a_chat WHERE (username=:user or email=:user)');
            $select->execute(array(
                'user' => $_POST['username'],
                'pass' => password_hash($_POST['password'], PASSWORD_ARGON2I) 
            ));
            $select = $select->fetch(PDO::FETCH_ASSOC);

            if (!empty($select) && password_verify($_POST['password'], $select['password'])) {
                session_start();
                $_SESSION = $select;
                header('Location: index.php');
        } else {
            echo '<script> alert("Identifiant invalide") </script>';
        }
    }
    
    ?>




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'inc/footer.php'; ?>

</body>
</html>