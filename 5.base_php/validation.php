<?php require_once('db.php');


//si la methode post est rentrer dans le formulaire il faut utiliser $_POST
//Sinon si la method get est rentrer dans le formulaire il faut utliser $_GET
//la fonction isset sert a regarder si la derniere variable qui lui est doner est bien defini
if (isset($_POST) && !empty($_POST)) {
echo '<pre>'; var_dump($_POST); echo '</pre>';
echo $_POST['name'];
echo sha1($_POST['password']);
echo md5($_POST['password']);
    //sha1 est la commande pour hacher le mot de passe sois le cripter sha1 = md5
$insert = $bdd -> prepare('INSERT INTO cours.utilisateur(firstname, lastname, email, password, gender) value (?, ?, ?, ?, ?)');
$insert -> execute(array(
    $_POST['name'],
    $_POST['lastname'],
    $_POST['email'],
    md5($_POST['password']),
    $_POST['gender'],
));
header('Location: index.php');
}
    ?>

