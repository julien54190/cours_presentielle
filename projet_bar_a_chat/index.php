<?php
session_start();
require_once('bdd/dbcat.php');
ob_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Favicon_chat.png" />
    <link rel="stylesheet" href="asset/style.css">
    <link rel="stylesheet" href="font/source-sans-pro.bold.ttf">
    <link rel="stylesheet" href="font/source-sans-pro.light.ttf">
    <link rel="stylesheet" href="font/source-sans-pro.regular.ttf">
    <link rel="stylesheet" href="font/source-sans-pro.semibold.ttf">
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&family=Source+Sans+3:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="asset/script/jquery-3.7.1.min.js"></script>
    
    <title>Bar a chat | au Bonheur du chat</title>
</head>
<body>
    <?php 
        $_GET['page'] = 'index';
        include 'inc/herder.php'; ?>
    <br><br><br><br><br>
    <div>
        <p>Bienvenue petit chaventurier</p>
    </div>

    <?php if(!empty($_SESSION)) : ?>
        <!-- Je créer un if global qui ce permet de passer en html pour
        executer ou non les lignes qui trouve entre les balise if et endif -->

        <div>
            <form method="post">
                <h2>Faire une réservation (15 min)</h2>

                <?php if (!empty($_SESSION) && $_SESSION['role'] > 0) :?>
                    <label for="client">Client :</label>
                    <select name="client" id="client">
                        <?php
                            $select = $bdd->prepare('SELECT * FROM Bar_a_chat');
                            $select->execute();
                            $select = $select->fetchAll();
                            if (!empty($select)) {
                                for ($i=0; $i < count($select); $i++) { // Je fait une boucle qui tourne le nombre de ligne récupérer
                                    echo "<option value='" . $select[$i]['id'] . "'>" . $select[$i]['username'] . "</option>";
                                }
                            }
                        ?>
                    </select>
                <?php endif;?>

                <label for="cat">Chat :</label>
                <select name="cat" id="catSelect" required>
                    <?php
                        $selectCat = $bdd->prepare('SELECT * FROM cat WHERE veto=0 AND transfer=0'); 
                        // Je séléctionne toute les colonnes et les lignes qui on la colonne veto et transfer à 0
                        $selectCat->execute();
                        $selectCat = $selectCat->fetchAll();
                        if (!empty($selectCat)) { // Je vérifie que j'ai des lignes qui ont était récuperer

                                for ($i=0; $i < count($selectCat); $i++) { // Je fait une boucle qui tourne le nombre de ligne récupérer
                                    echo "<option value='" . $selectCat[$i]['id'] . "'>" . $selectCat[$i]['prenom'] . "</option>";
                                }
                            }
                            
                    ?>
                </select>
                <label for="table">N° Table :</label>
                <select name="table" id="table" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label for="date">Date :</label>
                <input type="datetime-local" name="date" id="date" oninput="ChangeDate()"  
                    value="<?php echo date('Y-n-d'); ?>T<?php echo date('H')+2; ?>:00" 
                    min="<?php echo date('Y-n-d'); ?>T08:00" 
                    step="900"
                    max="<?php echo date('Y-n')?>-<?php echo date('d')+7?>T18:59"
                required> 
                <script>
                    ////////// Fonction Modification de mon input Date ////////////////
                    // Ici je créer une fonction ChangeDate qui me permet de pouvoir gérer la validité de mon input 
                    // Cette à dire pouvoir dire si mon formulaire peut être envoyé ou non
                    function ChangeDate() {
                        let Element = document.getElementById('date')
                        // Split est une fonction de JavaScript qui permet de découper une chaine de caractère
                        // Au caractère que on lui donne et il va enfaite nous créer un tableau
                        let temporaire = Element.value.split('T')
                        
                        // parseInt est une fonction de JavaScript qui permet de convertir tout type de variable
                        // en entier 
                        if (parseInt(temporaire[1]) > 19) {
                            Element.setCustomValidity('A cette heure on est fermé')
                        } else {
                            Element.setCustomValidity('')
                        }
                        // let theo = [
                        //     00,
                        //     15,
                        //     30,
                        //     45
                        // ]
                        //  // let heure  = temporaire[1].split(':')[0]
                        // let minute = temporaire[1].split(':')[1]
                        // // let date = new Date(); // new Date est défini par JavaScript est récupère toute
                        // // // les informations du moment et d'aujourd'hui

                        // theo.forEach(function(lavabo) {
                        //     if (minute === lavabo) {
                                
                        //     }
                        
                    }
                </script>
                    <!-- Ici je récupère la date d'aujourd'hui pour pouvoir définir value, min, max -->
                <label for="comment">Commentaire :</label>
                <textarea name="comment" id="comment" cols="30" rows="5" maxlength='255'></textarea>
                <input type="submit" value="Faire ma réservation">
            </form>
        </div>

        <?php 
        if (isset($_POST) && !empty($_POST)) {
            ############## Partie Vérification dans la base donnée ##########
            # Dans cette partie je regarde dans la base donnée toute les réservations qui ont l'id_cat qui est exactement
            # Le même que le chat que j'ai séléctionné
            # Pour faire ca j'ai utiliser une boucle foreach qui me permet de récupèrer les lignes d'un tableau
            # Et j'ai regarder si le chat séléctionné été déjà réserver à l'heure que j'ai séléctionné

            $verify = true;
            $select = $bdd->prepare('SELECT * FROM reservation WHERE id_cat=?');
            $select->execute(array(
                $_POST['cat']
            ));
            $select = $select->fetchAll(); 
            if (!empty($select)) {
                // Le foreach récupère mon tableau $select et tourne en fonction de mon tableau en me donnant mon index du 
                // Tableau avec ca valeur
                foreach ($select as $index => $valeur) {
                    // Je regarde si ma valeur qui ce trouve dans la base de donner et égale à la valeur
                    // que j'ai rentré dans le formulaire mais avec le T qui à été remplacer par un espace

                    //                                  2023-10-12 11:00:00
                    if ($valeur['date'] == str_replace('T', ' ', $_POST['date']) . ':00') {
                        $verify = false;
                        break;
                    }
                }
            }
            
            ########################################################################

            #############   Partie Insertion ############
            # Dans cette partie j'insers dans la base de donnée la reservation que j'ai séléctionner dans mon formulaire
            # Que si la variable $verify que j'ai créer et qui est de type booléan est vrai (true) sinon j'affiche un message
            # D'erreur
            

            if ($verify) {            
                // J'insert dans la base de donnée les informations que je lui est donnée dans le formulaire
                $insert = $bdd->prepare('INSERT INTO reservation(id_client, id_cat, date, comment, tab) VALUES (?, ?, ?, ?, ?)');
                $insert->execute(array(
                    // Le (int) va passer la variable temporairement en entier 
                    empty($_POST['client']) ? (int)$_SESSION['id'] : $_POST['client'],
                    (int)$_POST['cat'],
                    str_replace('T', ' ', $_POST['date']),
                    $_POST['comment'],
                    (int)$_POST['table']
                ));
    
            } else {
                echo "<script>alert('Ce chat est déjà résever pour cette horraire ! Donc reviens plus tôt la prochaine fois nullard') </script>";
            }
        }
        ?>
    <?php endif; ?>


<br><br><br>

    <?php include 'inc/footer.php'; ?>
</body>
</html>