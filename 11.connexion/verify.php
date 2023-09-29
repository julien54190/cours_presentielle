<?php 
require_once('../5.base_php/db.php') ;
if (isset($_GET) && !empty($_GET)) {
    $select = $bdd->prepare('SELECT * FROM Inscription WHERE Token=?');
    $select->execute(array(
        
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
    <title>Vérification adresse</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" name="Confirm" value="Confirmer">
        
    </form>

    <?php 
if (isset($_POST['Confirm'])) {
    

    
    $update = $bdd->prepare('UPDATE Inscription SET Confirm = 1, Token = NULL WHERE Token = ?');
    $update->execute(array($_GET['token']));

    $updatedRows = $update->rowCount();

    if ($updatedRows > 0) {
        header('Location: login.php?success=mail'); 
        
        exit;
    } else {
        echo '<script>alert("Le mail n\'est pas vérifié.")</script>';
    }
}

    ?>
</body>
</html>