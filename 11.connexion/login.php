<?php  require_once('../5.base_php/db.php');
    session_start();
    if (!empty($_SESSION)) header('Location: index.php');
    if(!empty($_GET)) {
        if (isset($_GET['sucess'])) {
            if($_GET['success'] == 'reset') echo '<script>alert("Votre mot de passe a été modifieé") </script>';
            if($_GET['success'] == 'mail') echo '<script>alert("Votre adresse est vérifiée, vous pouvez vous connecter.")</script>';

        }
    }
?>
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
            <input type="password" name="Password" id="Password">
            <input type="submit" value="Se connecter">
            <a href="forgotpassword.php">Mot de passe oublié ?</a>
            <a href="register.php">Vous n'avez pas de compte ?</a>
        </pre> 

    </form>
    <?php
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare('SELECT * FROM Inscription WHERE (User =:login OR Mail =:login) AND Password =:password');
        $select->execute(array(
            'login' => $_POST['User'],
            'password' => sha1($_POST['Password'])
        ));
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if(!empty($select)) {
            if ($select['Confirm']){
            $_SESSION = $select;
            header('location: index.php');
            } else
                echo "<script> alert('L\'adresse mail n'est pas verifier') </script>";
            
        } else
            echo "<script>alert('Le mot de passe ou le pseudo n\'est pas bon')</script>";
        
        
    }
    ?>
</body>
</html>