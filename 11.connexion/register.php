<?php  require_once('../5.base_php/db.php');
require_once('mail.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <form action="" method="post">
        <pre>
            <label for="Firstname">Prénom :</label>
            <input type="text" name="Firstname" id="Firstname" required><br>
            <label for="Name">Nom :</label>
            <input type="text" name="Name" id="Name" required><br>
            <label for="User">Pseudo :</label>
            <input type="text" name="User" id="User"  required><br>
            <label for="Mail">E-mail</label>
            <input type="email" name="Mail" id="Mail" required><br>
            <label for="password">Mot de passe :</label>
            <input type="Password" name="Password" id="Password" required><br>
            <label for="Confirm">Confirmation du mot de passe :</label>
            <input type="password" name="Confirm" id="Confirm" oninput="ChangeValue()" required>        

            <label for="Masculin">Masculin :</label><input type="radio" name="Genre" class="genre" value="m" required>
            <label for="Feminin">Féminin  :</label><input type="radio" name="Genre" class="genre" value="f" required>

            <br>
            <input type="submit" value="S'inscrire">
            <a href="login.php">Vous avez déjà un compte ?</a>
        </pre>
    </form>
    <?php 
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare("SELECT * FROM Inscription WHERE User = ? AND Mail = ?");
        $select-> execute(array($_POST['User'], $_POST['Mail']));
        $select = $select->fetchAll();
        if (empty($select)) {
            $insert = $bdd->prepare('INSERT INTO Inscription(Name, Firstname, User, Mail, Genre, Password) VALUE (?, ?, ?, ?, ?, ?);');
            $insert->execute(array(
                $_POST['Name'],
                $_POST['Firstname'],
                $_POST['User'],
                $_POST['Mail'],
                $_POST['Genre'],
                sha1($_POST['Password'])
            ));
            $token = GenerateToken(50);
            $msg = "Lien pour verifier votre adresse mail : http://localhost:8888/presentielle/11.connexion/verify.php?token=$token"; 
            SendEmail($_POST['Mail'], $msg, "Validation Adresse Mail", "DWWM.fr");
            header("Location: login.php");
        } else {
            echo '<script> alert("Ce Pseudo ou E-mail est déja utilié") </script>';
        }
    }
    ?>
    <script>
        function ChangeValue(){
            let Password = document.getElementById('Password')
            let Confirm = document.getElementById('Confirm')

            if (Password.value == Confirm.value) {
                Confirm.setCustomValidity('')
            }else {
                Confirm.setCustomValidity('Les mots de passe doivent être identiques')
            }
        }
    </script>
</body>
</html>