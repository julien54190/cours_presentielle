<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="../script/jquery-3.7.1.min.js"></script>
    <title>Boite</title>
</head>
<body>
<body>
    <div class="bouette"></div>

    <h1>Modifications</h1>

    <button id='color'>Action/Désactiver la couleur</button>
    <button id='border'>Activer/Désactiver les bords arrondis</button>
    <button id='add'>Ajouter une nouvelle bouette</button>

    <h1>Descriptions:</h1>
    <ul>
        <li>Activer/Désactiver la couleur: Activer/Désactiver la couleur rouge</li>
        <li>Activer/Désactiver les bords arrondis: Le contour des boîtes alterne entre arrondis ou droit</li>
        <li>Ajouter une nouvelle boîte: Ajouter une boîte au conteneur.</li>
    </ul>
    
    <script>
        $(document).ready(function(){
            $("#add").click(function() {
                // Append créer un élément dans la page a la fin de l'élément parent
                $('.bouette').append("<div class='b'></div>")
                // Prepend créer un élément dans la page au début de l'élement parent
            })

            $("#color").click(function() {
                // Toggle class est un interupteur qui enlève ou met la class en fonction de si elle y est ou non 
                $(".b").toggleClass("color");
                // HasClass vérifie si la class ce trouve sur l'élément
                if ($(".b").hasClass('color')) {
                    // Math.floor est une fonction de JS qui permet d'arrondir les nombres a virgule en entier
                    // Math.random est une fonction de JS qui permet de donnée un nombre aléatoire
                    // Math.random() * nombre Fait en sorte que le random est une limite
                    const r = Math.floor(Math.random() * 255)
                    const g = Math.floor(Math.random() * 255)
                    const b = Math.floor(Math.random() * 255)

                    $('.b').css('background-color', `rgb(${r}, ${g}, ${b})`)
                }

            });

            $("#border").click(function() {
                $(".b").toggleClass("arrondi");
            })

            


        })
    </script>
</body>
</html>