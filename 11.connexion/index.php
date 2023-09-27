<?php  
require_once('../5.base_php/db.php') ;
session_start();
if (empty($_SESSION)) header('Location: login.php')

    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page d'acceuil</title>
</head>
<body>
    <!-- <pre>
        <?php
        // var_dump($_SESSION);
        ?>
    </pre> -->
    <h1>Bonjour, <?php echo $_SESSION['Genre'] == 'm' ? 'M' : 'Mme'?>. <?php echo $_SESSION['Name'] ?> <?php echo $_SESSION['Firstname'] ?></h1>

    <br><br>
        <!-- 
        Vous allez devoir créer trois page une de connexion, une d'inscription et un page d'accueil avec des 
        lien hypertext et si possible réussir à faire afficher le nom et prénom de la personne 
    -->
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        
        header('Location: login.php');
        exit; 
}
?>
    <form action="" method="post">
        <input type="submit" name="logout" value="Déconnexion">
    </form> 

    <a href="deconnexion.php">deconexion2</a>

</body>
</html>