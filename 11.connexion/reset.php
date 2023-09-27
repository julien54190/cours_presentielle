<?php  require_once('../5.base_php/db.php') ;
if (isset($_GET) && !empty($_GET)) {
    $select = $bdd->prepare('SELECT * FROM Inscription WHERE id=? AND Token=?');
    $select->execute(array(
        $_GET['id'],
        $_GET['token']
    ));
    $select = $select->fetchAll();
    if(empty($select)){
        header('Location: login.php');
    }
}else {
        header('Location: login.php');
    
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modification mot de passe</title>
</head>
<body>
    <form action="" method="post">
        <pre>
            <label for="Password">New Password</label>
            <input type="Password" name="Password" id="Password" required><br>
            <label for="Confirm">Confirmation Password</label>
            <input type="password" name="Confirm" id="Confirm" oninput="ChangeValue()" required><br><br>
            <input type="submit" value="Change">
        </pre>

    </form>

    <?php
    if (isset($_POST) && !empty($_POST)){
        $update = $bdd->prepare('UPDATE Inscription SET Password=?, Token=? WHERE id=? AND Token=?');
        $update->execute(array(
            sha1($_POST['Password']),
            '',
            $_GET['id'],
            $_GET['token']
        ));
        $update = $update->rowCount();
        if($update > 0){
            header('Location: login.php?success=reset');
        } else {
            echo 'Une erreur c\'est produite';
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