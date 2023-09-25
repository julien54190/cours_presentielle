<!-- http://localhost:8888//1.base_php/index.php -->
<?php require_once('db.php');
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cours PHP</title>
</head>
<body>
    <?php 
    echo "<p class= 'test'>bonjour</p>";
    // j'affiche bonjour sur ma page dans la balise p avec comme class test
    $int = 10;
    // Je défini ma variable avec $ puis je lui donne le nom int et je lui rentre la valeur 10
    $phrase = "je suis une string <br>";
    $float = 1.4;
    $boolean = true; // flase
    /* 
    integrer ou int => Nombre entier comme 50,47, 874698
    Float => Nombre a virgule comme 74.67 , 4.23567, 1.56788
    String => chaine de caractère comme "Bonjour"
    Booléens => true(vrai) ou false(faux)
    Array =>
            Indexés
            associatif
    null => NULL 
    */
    $titre = "Je suis un titre";
    echo $phrase;
    echo $titre;

    // condition

    $condition = false;

    if ($condition) {
        echo "<br>Je passe ici donc c'est vrai";
    } else {
        echo "<br>Je passe par la donc c'est faux";
    }

    $code = 4227;
            /* == prend en compte que la variable 
            === prend en compte que la variable sois égale et  de meme type*/
    if ($code === 4227) {
        echo "<br>Le code est corect";
    } else {
        echo "le code n'est pas correct";
    }

    $couleur = "rouge";

    if  ($couleur === "rouge") {
        echo "<p>j'ai une autruche de couleur rouge</p>";
    } elseif ($couleur === "bleu"){
        echo"<p>j'ai une autruche de couleur bleu</p>";
    } else {
        echo "<p>j'ai pas d'autruche</p>";
    }

    // Ecriture Ternaire
    $a = 15;
    $un = $a > 11 ? 1 : 0 ;
    echo $un;
    // Si $a superieur à 11 alors (?) $a = 1 sinon(:) $a = 0 

    // Les Switch

    $taille = 178;

    switch ($taille) {
        case 120:
            echo "<p> tu est atteint de nanisme</p>";
            break;
        case 150:
            echo "<p> tu est très petit(e)</p>";
            break;
        case 178:
            echo "<p> tu est convenable</p>";
            break;
        case 200:
            echo "<p> Bonjour Monsieurs</p>";
            break;
        default:
            echo "<p> Tu n'existe pas !!</p>";
            break;
    }

    // Les tableau indexé

    $tableau = [];
    $tableau = [42, 48, 78, 148764, "Une autruche"];
    echo $tableau[4] . "<br>";
    echo "<pre>";
    var_dump($tableau);
    echo "</pre>";
    
    
    // la valeur de $resultat dois etre égal a 30 en utilisant que les nombre qui se trouve dans le tableau exo
    $exo = [4, 12, 78, 98, 65];
    $resultat = $exo[2] - ($exo[0] * $exo[1]);

    echo $resultat; 

    // tableau Associatif

    $tab_assoc = [
        "voiture" => "Volskwagen",
        "animal" => "Perroquet",
        "chiffre" => 10,
        "calvitie" => true,
        "legumes" => null
    ];
    /* J'ai fai un tableau avec 5 valeurs qui un une index que j'ai défini moi même :
    voiture est une index et volskwagen est sa valaur 
    animal est une index et perroquet est sa valaur 
    ainsi de suite*/

    $tab_assoc['bras'] = false;
    // j'ai défini une nouvelle index bras avec valeur faux

    echo "<pre>"; var_dump($tab_assoc); echo "</pre>";


    // Les boucle

    // La boucle while
    $o = 0;
    while (true) {
        $o++;
        echo "<p>je passe dans la boucle while</p>";
        if ($o == 10 ){
            break;
        }// sert a casser la boucle pour l'areter
    }

    // la boucle do-while

    do {
        echo "<p> je passe dans le boucle do-while</p>";
    }while(false);

    // La boucle for

    for ($i=0; $i < 10; $i++) { 
        echo "<p> je suis passer $i fois dans la boucle</p>";
    }

    /* 
    Créer un tableau Associatif en mettant une 
    index bras de type booléen et une index 
    jambe qui va être un integer
    */

    /* 
    Si il n'a pas de jambe ni de bras
        Tu es un e-tronc !
    Sinon si il n'a pas de bras
        Pas de bras pas de chocolat
    Sinon
        Tu es basique donc tu es nul
    */

    $tab_people = [
        "bras" => false,
        "jambre" => 0
    ];
    
    switch (true) {
        case $tab_people["bras"] && $tab_people["jambre"] == 2:
            echo "Tu es basique donc tu es nul<br>";
            break;
        case !$tab_people["bras"] && $tab_people["jambre"] == 0:
            echo "Tu es un e-tron<br>";
            break;
        case !$tab_people["bras"] && $tab_people["jambre"] == 2:
            echo "Pas de bras, pas de chocolat<br>";
            break;
    
        default:
            echo "tu est dans aucune catégorie<br>";
            break;
    }

    while($tab_people === true){
    }
    if ($tab_people["bras"] && $tab_people["jambe"] == 2){
        echo "Tu es basique donc tu es nul<br>";
    }elseif(!$tab_people["bras"] && $tab_people["jambre"] == 0){
        echo "Tu es un e-tron<br>";
    }elseif(!$tab_people["bras"] && $tab_people["jambre"] == 2){
        echo "Pas de bras, pas de chocolat<br>";
    }else{
        echo "tu est dans aucune catégorie<br>";
    }

    if ($tab_people['jambre'] == 0 && !$tab_people['bras']){
        echo "tu est un e-tron";
    }elseif (!$tab_people['bras']){
        echo "pas de bras pas de chocolat";
    }else{
        echo "tu est basique donc tu est nul";
    }
    
    ?>
    <form action="validation.php" method="post">
        <pre>
            <h1 class="title">Register</h1>
        <label for="name">First name :</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="lastname">Last name :</label><br>
        <input type="text" name="lastname" id="lastname"><br>
        <label for="email">Email :</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="password">Password :</label><br>
        <input type="password" name="password" id="password"><br>
        <label for="confirm">Confirm password :</label><br>
        <input type="password" name="confirm" id="confirm"><br>
        </pre>
        <label for="gender" class="title">Gender :</label><br>
        <input type="radio" name="gender" id="male" class="title" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="other" value="other">
        <label for="other">other</label><br><br>
        <input type="submit" value="Submit" class="button">
    </form>

<?php
            // je prepare ma commande
        $select = $bdd ->prepare('SELECT * FROM cours.utilisateur WHERE gender=?;');
        // je l'excute en lui donnant une valeur a la place des ?
        $select ->execute(array("male"));
        // je récupere tout ce que renvoie ma commande
        $total = $select ->fetchAll(PDO::FETCH_ASSOC);

        // je l'affiche
        echo '<pre>';
        var_dump($total);
        echo '</pre>';

        echo $total[2]['gender'];
    ?>
    <br><br><br><br><br><br><br><br><br><br><br>
    <pre>
    <form action="" method="post">
    <label for="name">Your name</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">Your mail</label>
    <input type="email" name="email" id="email"><br>
    <label for="message">Your message</label><br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea><br>
    <label for="num">Give me a number</label><br>
    <input type="tel" name="num" id="num"><br>
    <input type="submit" value="Envoyer">
    </pre>
    </form>



    <?php
    if (isset($_POST) && !empty($_POST)) {
        settype($_POST['num'], 'integer');
        echo '<pre>'; var_dump($_POST); echo '</pre>';
        echo $_POST['name'];
        $insert = $bdd -> prepare ('INSERT INTO cours.exercice(firstname2, email2, message, num) value (?, ?, ?, ? )');
        $insert -> execute(array(
            $_POST['name'],
            $_POST['email'],
            $_POST['message'],
            $_POST['num'],
        ));

    }
    $select = $bdd -> prepare('SELECT * FROM cours.exercice');
    $total = $select ->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($total);
    echo '</pre>';


    ?>



</body>
</html> 