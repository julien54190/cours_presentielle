<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fonction</title>
</head>
<body>
    <?php
        # Créer une fonction en php qui s'appel MajourOuMinour qui a comme paramètre l'âge et 
        # qui doit retourner 'tou es minour' si l'âge est plus petit que 18 sinon ca retourne 'tou es majour'
        function MajourOuMinour($age) {
            return $age < 18 ? 'Tou es minour' : 'Tou es majour';
        } 
        echo MajourOuMinour(14);
        ?>
        <br><br><br><br><br>
        <?php
            
        

        # Créer une fonction EN PHP qui s'appel RemplacerLesLettres avec un paramètre qui s'appel phrase
        # Exemple : Comment tou tou pelle => C0mment t0u t0u p3ll3 
        # Exemple : Bonjour les amis => B0nj0ur l3s am1s
        # Elle va devoir remplacer les o par des zero
        # Et remplacer les e par des trois 
        # Et aussi les i en 1 

        function RemplacerLesLettres($lettre) {
                
        $lettre = str_replace('o', '0', $lettre);
    
    
        $lettre = str_replace('e', '3', $lettre);
    
    
        $lettre = str_replace('i', '1', $lettre);

          // return str_replace('o', '0', str_replace('e', '3', str_replace('i', '1', $phrase)));
    
    return $lettre;
        }

        $phrase1 = "Comment tou tou pelle"; 
        
        $phrase2 = "Bijour les amiche";

        echo $hach1 = RemplacerLesLettres($phrase1);?>
        <br><br><br>
        <?php
            
        echo $hach2 = RemplacerLesLettres($phrase2);
        ?>

        <br><br><br>
        <?php


        # Créer une fonction  en PHP qui se nomme DernierElementTableau elle aura comme paramètre un tableau 
        # Et si le tableau n'est pas vide elle devra retourner la dernière valeur du tableau sinon
        # Retourne null

        function DernierElementTableau($table) {
            if (!empty($table)) {
                //return end($table);
                return $table[count($table)-1];
            }else {
                return null;
            }
        }

        $table = [1, 3, 4, 5];

        echo DernierElementTableau($table);

        ?>
        <br><br><br>
        <?php

        function PremierElementTableau ($table){
            if (!empty($table)){
                return $table[0];
            }else{
                return null;
            }
        }
        $table = [1, 3, 4, 5];

        echo PremierElementTableau($table);
    ?>
    <br><br><br>
    <?php
                # Créer une fonction en PHP qui se nomme Capital et qui va avoir comme paramètre pays qui va 
        # être en string et la fonction doit envoie la capital du pays 
        # Il faudra utiliser un switch

        # France = Paris
        # Allemagne = Berlin
        # Italie = Rome
        # Maroc = Rabat
        # Portugal = Lisbonne
        # Angleterre = London
        #Palestine = Jerusalem
        # Tout autre pays = Inconnu

        function Capital($pays) {
            switch ($pays) {
                case "France":
                    return "Paris";
                case "Allemagne":
                    return "Berlin";
                case "Italie":
                    return "Rome";
                case "Maroc":
                    return "Rabat";
                case "Portugal":
                    return "Lisbonne";
                case "Angleterre":
                    return "London";
                case "Palestine":
                    return "Jerusalem";
                default:
                    return "Inconnu";
            }
        }
        $NomPays = "Palestine";
        $capitale = Capital($NomPays);
        echo "La capitale de $NomPays est $capitale.";
        ?>
        <br><br><br>
        <?php
        # Créer une fonction qui ce nomme VerifyPassword qui prendra comme paramètre password de type string
        # Et elle devra envoie un type booléan qui vaut true si 
        # Avoir au moins de 8 caractères
        # Avoir au moins 1 chiffre
        # Avoir au moins une majucule et une minuscule
        # Sinon ca envoie faux

        function VerifyPassword($password) {
            if (strlen($password) >= 8 && preg_match('/[0-9]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password)) {
                return true;
            }
            return false;
        }
        
        // $password = 'Coucou123';
        // if (VerifyPassword($password)) {
        //     echo 'Mot de passe valide.';
        // } else {
        //     echo 'Mot de passe invalide.';
        // }

        echo VerifyPassword('Hello world 123') ? 'Je suis valide' : 'Je suis tout sauf valide'
        ?>
        <br><br><br>
        <?php
        # Créer une fonction Factorielle qui a comme paramètre un nombre entier cette fonction devra afficher le 
        # le factorielle d'un nombre 
        # (Il est conseillé d'utiliser une boucle)

        function Factorielle($nombre){
            if ($nombre < 0){
                return "La factorielle n'est pas définie pour les nombres négatifs";
            } elseif ($nombre === 0 || $nombre === 1){
                return "La factorielle de 0 et de 1 est toujours égale à 1";
            } else {
                $factorielle = 1;
                for ($i = 2; $i <= $nombre; $i++){
                    $factorielle *= $i;
                }
                return $factorielle;
            }
        }
        
        $nombre = -1;
        $factorielle = Factorielle($nombre);
        echo "Le factorielle de $nombre est : $factorielle";
        ?>

        <br><br><br>

        <?php
        function Factorio($nombre) {
            if ($nombre < 0) return 'Ta gueule btrd';
            $temporaire = 1;
            for ($i = $nombre; $i > 0 ; $i--) { 
                $temporaire *= $i; 
                // $temporaire = $temporaire * $i;
                # += Equivaut a dire que j'additiionne la variable plus ce que je lui donne juste après
            }
            return $temporaire;
        }

        echo Factorio(170);
        ?>
        <br><br><br>
        <?php
function Factorielle1($nombre){
    if ($nombre < 0){
        return "La factorielle n'est pas définie pour les nombres négatifs";
    } elseif ($nombre === 0 || $nombre === 1){
        return "La factorielle de 0 et de 1 est toujours égale à 1";
    } else {
        $factorielle = 1;
        $operations = "1"; 
        for ($i = 2; $i <= $nombre; $i++){
            $factorielle *= $i;
            $operations .=  " * "  . $i; 
        }
        return "La factorielle de $nombre est $factorielle ($operations)"; 
    }
}
echo Factorielle1(5)
        ?>
        <br><br><br>
<?php
        # Créer une fonction qui s'appel LigneTriangle qui prend un paramètre qui va être un nombre 
        # avec ce nombre formé un trianglé de ce style : 
        # 1
        # 22
        # 333
        # 4444
        # 55555
        # 777777

        function LigneTriangle($n) {
            for ($i = 1; $i <= $n; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo $i;
                }
                echo "<br>"; 
            }
        }
        
        LigneTriangle(9);
?>
<br><br><br>
<?php
        # Créer une fonction qui ce nomme InverseString qui prend un paramètre phrase et qui va inserser
        # une chaine de caractère
        # Bonjour tout le monde => ednom el tuot ruojnob


        
        function mb_strrev($str){
            $r = '';
            for ($i = mb_strlen($str); $i>=0; $i--) {
                $r .= mb_substr($str, $i, 1);
            }
            return $r;
        }
        
        echo mb_strrev("Bonjour tout le monde");
        ?>
        <br><br><br>
        <?php
            #Créer une fonction qui ce nomme Acronyme qui a comme parametre une chaine de caractère 
            #et qui envoie que les initial des mot de la phrase.

            
    function Acronyme($chaine) {
    $tab_phrase = explode(' ', $chaine);

    $initiales = "";

    foreach ($tab_phrase as $mot) {
        $initiales .= strtoupper($mot[0]);
    }

    return $initiales;
}
echo Acronyme("bonjour tout le monde comment ca va je vous emmerde")
?>

<br><br>

<?php
        # Créer une fonction AffichageTableau qui prend en argument un tableau et qui va devoir afficher un
        # tableau en html sur notre page

        $tab = [
            'mdupond' => [
                'prenom' => 'Martin',
                'nom' => 'Dupond',
                'age' => 25,
                'ville' => 'Paris'
            ],
            'mduponds' => [
                'prenom' => 'flo',
                'nom' => 'pd',
                'age' => 22,
                'ville' => 'cul'
            ]
            ];

        function AffichageTableau($tableau){
            if (is_array($tableau) && !empty($tableau)) {
                echo "<table>
                    <tr>
                        <th>Prenom :</th>
                        <th>Nom :</th>
                        <th>Age :</th>
                        <th>Ville :</th>
                    </tr>
                    ";
        }
        foreach ($tableau as $index => $ligne) {
            $prenom = $ligne['prenom'];
            $nom = $ligne['nom'];
            $age = $ligne['age'];
            $ville = $ligne['ville'];

            echo "
            <tr id=$index>
                <td>$prenom</td>
                <td>$nom</td>
                <td>$age</td>
                <td>$ville</td>
            </tr> 
            ";
        }
        echo "</table>";
    }
        echo AffichageTableau($tab)
?>

</html>
</body> 