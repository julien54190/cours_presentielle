<?php 
    require_once('../../5.base_php/db.php')
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Correction- ITM</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <span class="num" id="text">
                <input type="password" name="number" id="invisible" readonly>
                <input type="text"  id="affiche" readonly>
            </span>
            <div class="num">1</div> 
            <div class="num">2</div>
            <div class="num">3</div>
            <div class="num" id="reject">Decliner <p class="red"></p></div>
            <div class="num">4</div>
            <div class="num">5</div>
            <div class="num">6</div>
            <div class="num" id="ecrase">Effacer <p class="yellow"><p></div>
            <div class="num">7</div>
            <div class="num">8</div>
            <div class="num">9</div>
            <button type="submit" class="num">Entrez <p class="green"></p></button>
            <div class="num" id="calcul-">-</div>
            <div class="num">0</div>
            <div class="num" id="calcul+">+</div>
            
        </form>
    </section>
    <button><a href="formulaire.php">Formulaire</a></button>

    <?php 
        if (isset($_POST) && !empty($_POST)) {
            //echo '<pre>'; var_dump($_POST); echo '</pre>';
            $select = $bdd->prepare(" SELECT code FROM atm WHERE code=?");
            $select -> execute(array(
                $_POST['number']
            ));
            $select = $select->fetchAll();
            if (count($select) > 0) // count calcule la longueur du tableau
                echo '<script> alert("Le code est bon") </script>';
            else
                echo "<script> alert('Le code n\'est pas bon') </script>";
        }
    ?>

    <script>
        var button = document.getElementsByClassName('num')
        
        for (let index = 0; index < button.length; index++) {
            if(button[index].id.length > 0 || button[index].type == 'submit') continue
            button[index].addEventListener('click', function() {
                var input = document.getElementById('affiche')
                var span = document.getElementById('invisible')
                if (input.value.length == 4) {
                    input.value = ""
                    span.value = ""
                    return
                }
                span.value += button[index].innerHTML
                input.value += "*"
            })
        }
        function stop(){
            document.getElementById('affiche').value= ''
            document.getElementById('invisible').innerHTML= ''
        }
        document.getElementById('reject').addEventListener('click', stop)
        document.getElementById('ecrase').addEventListener('click', stop)

    </script>


</body>
</html>
