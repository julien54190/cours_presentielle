<?php $bdd= new PDO("mysql:host=localhost;dbname=cours;charset=utf8;","mamp","Vampszz54");
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire</title>
</head>
<body>
    <!-- Créer un formulaire en php qui resemble à celui ci : 
    https://cdn.discordapp.com/attachments/550289332812906504/1163773698625511424/image.png?ex=6540cbb7&is=652e56b7&hm=aa9c41f65f2692145768cac347b0c78eeb43e691f311679e1ab7d64bddde95a8&
    -->
    <!-- Il devra être fonctionnel et être incrémenter dans une base donnée
    dans une table qui s'appelle annuaire qui resembler à ceci :

    - id_annuaire (INT, 3, AI)
    - nom (VARCHAR, 30)
    - prenom (VARCHAR, 30)
    - telephone (INT, 10)
    - profession (VARCHAR, 30)
    - ville (VARCHAR, 30)
    - codepostal (INT, 5)
    - adresse (VARCHAR, 30)
    - date_de_naissance (DATE)
    - sexe (tinyint,1, 'm','f')
    - description (TEXT)
    
-->
<form class="form" action="list.php" method="post">
    <fieldset>
        <legend>Information</legend>
        <pre>
        <label for="name">Nom *</label>
        <input type="text" name="name" id="name" required autofocus maxlength="30">
        <label for="firstname">Prénom *</label>
        <input type="text" name="firstname" id="firstname" required maxlength="30">
        <label for="tel">Télephone *</label>
        <input type="tel" name="tel" id="tel" required maxlength="10">
        <label for="job">Profession</label>
        <input type="text" name="job" id="job" maxlength="30">
        <label for="city">Ville</label> 
        <input type="text" name="city" id="city" maxlength="30">
        <label for="zip">Code Postal</label>
        <input type="text" name="zip" id="zip" value="00000" maxlength="5">
        <label for="adress">Adresse</label>
        <textarea name="adress" id="adress" rows="3"></textarea>
        <label for="bday">Date de Naissance</label>
        <input type="date" name="bday" id="bday" value="2001-01-01">
        <label for="sexes">Sexe</label>
        <label for="sexe">homme</label><input type="radio" name="sexe" id="M" value="M" checked><label for="sexe">femme</label><input type="radio" name="sexe" id="f" value="F">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="25" rows="5" maxlength="30"></textarea>
        <input type="submit" value="enregistrement">
        
        
        
    </pre>


    </fieldset>
</form>

<?php
    if (isset($_POST) && !empty($_POST)){
        $insert = $bdd->prepare('INSERT INTO annuaire(name, firstname, tel, job, city, zip, adress, bday, sexe, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insert->execute(array(
            $_POST['name'],
            $_POST['firstname'],
            $_POST['tel'],
            strlen($_POST['job']) <= 0 ? NULL : $_POST['job'],
            strlen($_POST['city']) <= 0 ? NULL : $_POST['city'],
            strlen($_POST['zip']) <= 0 ? NULL : $_POST['zip'],
            strlen($_POST['adress']) <= 0 ? NULL : $_POST['adress'],
            strlen($_POST['bday']) <= 0 ? NULL : $_POST['bday'],
            $_POST['sexe'],
            strlen($_POST['description']) <= 0 ? NULL : $_POST['description'],
        ));
    }
?>

</body>
</html>