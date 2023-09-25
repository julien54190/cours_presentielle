<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
    <title>Carte Postal</title>
</head>
<body>
    <div class="carte">
        <div class="text">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, ipsum non corrupti porro id dolor, delectus quos ex nemo aliquid, obcaecati magni est illo debitis nesciunt ipsa. Deserunt, iusto quod?</p>
        </div>
        <div class="timbre">
            <img src="img/timbre.png" alt="timbre">
        </div>
        <img src="img/tampon.png" alt="Tampon">
        <p class="tampon">
            <!-- <script>
                var date = new Date;
                document.write(`${date.getDate()}`, `/`,`${date.getMonth()}`, `/`, `${date.getFullYear()}`)
            </script> -->
        <?php echo date('d/m/y'); ?>
        </p>
        
        <img src="img/obliteration.png" alt="Obliteration">
        <div class="separateur"></div>
        <div class="information">
            <p>Jean Philipe Smet</p>
            <p>Cimietière de Lorient</p>
            <p>Saint Barthélemy</p>
            <p>France</p>
        </div>
        <adress class="copyright">&copy; | La carte Parisienne Tel : <a href="#">03.82.37.10.53</a></adress>
    </div>
</body>
</html>