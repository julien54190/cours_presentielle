<?php
$bdd = new PDO("mysql:host=localhost;dbname=cours;charset=utf8;", "mamp", "Vampszz54");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>edit</title>
</head>
<body>
    <?php
        if (isset($_GET) && !empty($_GET["id_annauire"])) {
            $ligne = $bdd->prepare('SELECT * FROM annuaire WHERE id_annauire=?');
            $ligne->execute(array(
                $_GET['id_annauire']
            ));
            $ligne = $ligne->fetch(PDO::FETCH_ASSOC);
            if (!empty($ligne)) {
                
            };
        };
    ?>
<form class="form" action="" method="post">
    <fieldset>
        <legend>Information</legend>
        <pre>
        <label for="name">Nom *</label>
        <input type="text" name="name" id="name" required autofocus maxlength="30" value="<?php echo $ligne['name'] ?>">
        <label for="firstname">Prénom *</label>
        <input type="text" name="firstname" id="firstname" required maxlength="30" value="<?php echo $ligne['firstname'] ?>">
        <label for="tel">Télephone *</label>
        <input type="tel" name="tel" id="tel" required maxlength="10" value="<?php echo $ligne['tel'] ?>">
        <label for="job">Profession</label>
        <input type="text" name="job" id="job" maxlength="30" value="<?php echo $ligne['job'] ?>">
        <label for="city">Ville</label> 
        <input type="text" name="city" id="city" maxlength="30" value="<?php echo $ligne['city'] ?>">
        <label for="zip">Code Postal</label>
        <input type="text" name="zip" id="zip" value="<?php echo $ligne['zip'] ?>" maxlength="5">
        <label for="adress">Adresse</label>
        <textarea name="adress" id="adress" rows="3"><?php echo $ligne['adress'] ?></textarea>
        <label for="bday">Date de Naissance</label>
        <input type="date" name="bday" id="bday" value="<?php echo $ligne['bday'] ?>">
        <label for="sexes">Sexe</label>
        <label for="sexe">homme</label><input type="radio" name="sexe" id="M" value="M" checked <?php echo $ligne['sexe'] == "m" ? 'checked' : ''  ?>><label for="sexe">femme</label><input type="radio" name="sexe" id="f" value="F">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="25" rows="5" maxlength="30" ><?php echo $ligne['description'] ?></textarea>
        <input type="submit" value="enregistrement">
        
        
        
    </pre>


    </fieldset>
</form>
    <a href="list.php">list</a>
    <?php
        if (isset($_POST) && !empty($_POST)) { 
            $update = $bdd->prepare('UPDATE annuaire SET name=?, firstname=?, tel=?, job=?, city=?, zip=?, adress=?, bday=?, sexe=?, description=? WHERE id_annauire=?');
            $update->execute(array(
                $_POST['name'],
                $_POST['firstname'],
                $_POST['tel'],
                strlen($_POST['job']) <= 0 ? NULL : $_POST['job'],
                strlen($_POST['city']) <= 0 ? NULL : $_POST['city'] ,
                strlen($_POST['zip']) <= 0 ? NULL : $_POST['zip'], // on fait ça pcq c'est des éléments de formulaire qui peuvent être vide
                strlen($_POST['adress']) <= 0 ? NULL : $_POST['adress'], 
                strlen($_POST['bday']) <= 0 ? NULL : $_POST['bday'],       
                $_POST['sexe'],
                strlen($_POST['description']) <= 0 ? NULL : $_POST['description'],
                $_GET['id_annauire']
                
            ));
            header('Location: list.php');
        }
    ?>
</body>
</html>

