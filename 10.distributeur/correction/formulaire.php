    <!-- 
        Faite un formulaire qui va permettre d'inscrire de nouveau code 
        dans la base de donnée vous devez mettre le nom de prénom 
        Si le nom de la personne est déja existant il n'y pas possible d'être intégrer                
    -->
    <?php  require_once('../../5.base_php/db.php') ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Formulaire</title>
    </head>
    <body>
        <pre>
        <form action="" method="post">
            <label for="Lastname">Nom</label>
            <input type="text" name="Lastname" id="Lastname" required>
            <label for="Firstname">Prénom</label>
            <input type="text" name="Firstname" id="Firstname" required>
            <label for="User">Nom Utilisateur</label>
            <input type="text" name="User" id="User" required>
            <label for="Password">Mot de passe(4 chiffres)</label>
            <input type="password" name="code" id="Password" pattern="^[0-9]{4}" maxlength="4" required>
            <label for="PasswordConfirm">Confirmer le mot de passe</label>
            <input type="password" name="confirm" id="PasswordConfirm" pattern="^[0-9]{4}" maxlength="4" onchange="mofifyPassword()" required >
            <!-- onchange="" -->
            <input type="submit" value="log-in">
        </form>

        </pre>
        <button><a href="index.php">Code</a></button>
        <?php 
            if (isset($_POST) && !empty($_POST)) {
            //(isset($_POST['Lastname']) && isset($_POST['Firstname']) && isset($_POST['User']) && isset($_POST['code']) && isset($_POST['confirm'])) {
                $lastname = $_POST['Lastname'];
                $firstname = $_POST['Firstname'];
                $user = $_POST['User'];
                $code = $_POST['code'];
                $confirm = $_POST['confirm'];
            
                // Vérifie si le nom d'utilisateur existe déjà dans la base de données
                $existingUser = $bdd->prepare("SELECT * FROM atm WHERE User = ?");
                $existingUser->execute([$user]);
            
                if ($existingUser->rowCount() == 0) {
                    if ($code == $confirm) {
                        $userInsert = $bdd->prepare("INSERT INTO atm(Lastname, Firstname, User, code, confirm) VALUES (?, ?, ?, ?, ?)");
                        $userInsert->execute([$lastname, $firstname, $user, $code, $confirm]);
                        echo '<script>alert("Enregistrement réussi.");</script>';
                    } else {
                        echo '<script>alert("Les mots de passe ne correspondent pas.");</script>';
                    }
                } else {
                    echo '<script>alert("Ce nom d\'utilisateur existe déjà.");</script>';
                }
            }
        ?>
        <script>
            function modifyPassword() {
                
            }
        </script>
    </body>
    </html>