<?php 
require_once('../5.base_php/db.php') ;
if (isset($_GET) && !empty($_GET)) {
    $select = $bdd->prepare('SELECT * FROM Inscription WHERE Token=?');
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" value="Confirmer">
    </form>
</body>
</html>