<?php  require_once('../5.base_php/db.php');
require_once('mail.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mot de passe oublié</title>
</head>
<body>
    <form action="" method="post">
        <h1>Rénitialisation du mot de passe</h1>
        <label for="email">Adresse Mail</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Envoyer le lien">
    </form>

    <?php 
        if (isset($_POST) && !empty($_POST)) {
            $select = $bdd->prepare(' SELECT * FROM Inscription WHERE Mail = ?');
            $select->execute(array($_POST['email']));
            $select = $select->fetchAll();
            if (empty($select)) {
                echo '<script> alert("Cette adresse n\'est pas inscrite sur ce site") </script>';
            } else {
                //header('Location: mail.php');
                //GenerateToken(50);
                $token = GenerateToken(50);

                $addToken = $bdd->prepare('UPDATE Inscription SET Token = ? WHERE id = ? AND Mail = ?');
                $addToken->execute(array(
                    $token, 
                    $select[0]['id'],
                    $_POST['email']
                ));

                SendEmail($select[0]['id'], $token, $_POST['email']);
            }
        }
    
    
    ?>
</body>
</html>