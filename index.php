<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu Exercice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: #212121;
            background-image: url("https://www.transparenttextures.com/patterns/diamond-upholstery.png");
            margin: 0;
        }
        h1 {
            top : 0; right : 0; left: 0;
            background-color: #000000;
            background-image: url("https://www.transparenttextures.com/patterns/brick-wall.png");
            color: white;
            font-size: 50px;
            margin-bottom: 400px;
            margin-top: 0;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            border-bottom: 2px ridge gray;
            font-family: 'Nosifer', sans-serif;
            color: red;
            -webkit-text-stroke: 2px white;
        }
        ul {
            list-style-type: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
            margin: 400px auto;
            text-align: center;
            width: 800px;
            border-radius: 15px;
            border: 2px ridge black;
            background-color: #000000;
            background-image: url("https://www.transparenttextures.com/patterns/skulls.png");
        }
        li {
            font-size: 40px;
            padding: 10px 10px;
            margin: 40px 0;
            background-color: #404040;
            width: 400px;
            border-radius: 15px;
            border: 2px ridge white;
        }
        a {
            color: white;
            text-decoration: none;
            font-size: 30px;
            color: greenyellow;
            font-family: 'Nosifer', sans-serif;
            -webkit-text-stroke: 1px white;
        }
    </style>

    <h1>Menu de navigation</h1>
    <?php
        $dir = '../presentielle';
        $dossiers = scandir($dir);
        echo '<ul>';
        foreach ($dossiers as $lien) {
            if ($lien!= '.' && $lien!= '..') {
                echo "<li><a href=" . $lien . ">" . $lien ."</a></li>";
            } elseif ($lien == '..') {
                echo "<li><a href=" . $lien . "> Retour arrière</a></li>";
            }
        }
        echo '</ul>';
    ?>
</body>
</html>