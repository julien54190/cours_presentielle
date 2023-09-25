<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Distributeur</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <label for="password"></label>
            <input type="text" name="password" id="password" readonly>
            <div class="button">
                <button type="button" onclick="appendToPassword('1')">1</button>
                <button type="button" onclick="appendToPassword('2')">2</button>
                <button type="button" onclick="appendToPassword('3')">3</button>
                <button type="reset">Décliner</button>
                <button type="button" onclick="appendToPassword('4')">4</button>
                <button type="button" onclick="appendToPassword('5')">5</button>
                <button type="button" onclick="appendToPassword('6')">6</button>
                <button type="reset">Effacer</button>
                <button type="button" onclick="appendToPassword('7')">7</button>
                <button type="button" onclick="appendToPassword('8')">8</button>
                <button type="button" onclick="appendToPassword('9')">9</button>
                <button type="submit"> Entrez</button>
                <button type="button" onclick="appendToPassword('-')">-</button>
                <button type="button" onclick="appendToPassword('0')">0</button>
                <button type="button" onclick="appendToPassword('+')">+</button>
            </div>
        </form>
        <?php 
            require_once("../5.base_php/db.php");
            if(isset($_POST) && !empty($_POST)) {
                //echo'<pre>'; var_dump($_POST); echo '</pre>';
                //echo sha1($_POST['password']);
                // $insert = $bdd ->prepare ('INSERT INTO password');
                $requeteSql = "INSERT INTO cours.distributeur(password) values(?)";
                $insert = $bdd -> prepare ($requeteSql);
                $insert -> execute(array(
                    $_POST['password']
                ));
            }
            // $select = $bdd -> prepare('SELECT * FROM cours.exercice');
        ?>
    </div>


<script>
    function appendToPassword(value) {
        var passwordInput = document.getElementById("password");
        var currentPassword = passwordInput.value;

        if (currentPassword.length >= 4) {
            return passwordInput.value = ""; 
        }
        
        passwordInput.value += "*"; 
    }
</script> 



</body>
</html>



