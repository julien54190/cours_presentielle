<?php  require_once('../5.base_php/db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Inscription</legend>
            <label for="Name">NOM</label><br>
            <input type="text" name="Name" id="name" required><br>
            <label for="FirstName">Prénom</label><br>
            <input type="text" name="Firstname" id="Firstname" required><br>
            <label for="User">Pseudo</label><br>
            <input type="text" name="User" id="user" required><br>
            <label for="Password">Mot de passe</label><br>
            <input type="password" name="Password" id="Password" required><br>
            <label for="Confirm">Confirmer le mot de passe</label><br>
            <input type="password" name="Confirm" id="Confirm" required onchange="ConfirmPassword()"><br><br>
            <input type="submit" value="Inscription">
        </fieldset>

        <?php 
        if (isset($_POST) && !empty($_POST)) {
            $select = $bdd->prepare('SELECT * FROM Inscription WHERE User = ?');
            $select->execute(array($_POST['User']));
            $select = $select->fetchall();
            if (count($select) <= 0) {
                $insert = $bdd->prepare('INSERT INTO Inscription(Name, Firstname, User, Password) VALUE(?, ?, ?, ?)');
                $insert->execute(array(
                    $_POST['Name'],
                    $_POST['Firstname'],
                    $_POST['User'],
                    sha1($_POST['Password'])
                ));
            }else {
                echo "<script> alert('Le nom d\'utilisateur est déjà utilisé') </script>";
            }
        }
        ?>

        <script>
            function ConfirmPassword() {
                let password = document.getElementById('Password')
                let Confirm = document.getElementById('Confirm')

                if (password.value !== Confirm.value) {
                    confirm.setCustomValidity('Les mot de passes ne sont pas identique')
                }else{
                    confirm.setCustomValidity('')
                }
            }
        </script>
    </form>
</body>
</html>