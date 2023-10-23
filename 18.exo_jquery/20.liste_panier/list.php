<?php $bdd= new PDO("mysql:host=localhost;dbname=cours;charset=utf8;","mamp","Vampszz54");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../script/jquery-3.7.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Nos fruits</h1>

    <form action="" method="post">
    <label for="listeA">Nos fruits</label>
    <select name="listeA" id="listeA">
        <option value="Apple">Apple</option>
        <option value="Banana">Banana</option>
        <option value="Cherry">Cherry</option>
        <option value="Orange">Orange</option>
        <option value="Pineapple">Pineapple</option>
        <option value="Strawberry">Strawberry</option>
        <option value="Watermelon">Watermelon</option>
    </select>
    <button type="button" id="add">Ajouter au panier</button>
    <button type="button" id="addAll">tous Ajouter au panier</button>
    <button type="button" id="remove">Supprimer du panier</button>
    <button type="button" id="clear">Effacer le panier</button>
    <button type="button" id="Payed" >Payer</button>
        <label for="listeB">Panier</label>
        <select name="listeB" id="listeB">
        </form>

    </select>
    <?php
    if (isset($_POST) &&!empty($_POST)){
        $insert = $bdd->prepare('INSERT INTO panier(listeA, listeB) VALUES (?,?)');
        $insert->execute(array(
            $_POST['listeA'],
            $_POST['listeB'],
        ));
    }
    ?>




    <script>
                $("#add").click(function() {
                const fruit = $("#listeA option:selected");
                $("#listeB").append(fruit.clone());
                fruit.remove();
            });

            $("#remove").click(function() {
            const selectedFruits = $("#listeB option:selected");
            selectedFruits.each(function() {
                $("#listeA").append($(this).clone());
            });
            selectedFruits.remove();
        });

        $("#addAll").click(function() {
        // Ajoutez les éléments clonés du panier à la liste d'origine
        $("#listeA option").each(function() {
            $("#listeB").append($(this).clone());
        });

        // Ensuite, effacez le panier
        $("#listeA").empty();
    });

        
            $("#clear").click(function() {
        // Ajoutez les éléments clonés du panier à la liste d'origine
        $("#listeB option").each(function() {
            $("#listeA").append($(this).clone());
        });

        // Ensuite, effacez le panier
        $("#listeB").empty();
    });
            
    </script>
</body>
</html>