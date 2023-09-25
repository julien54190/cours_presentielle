/* let et var permet de dire que je crée une variable d'un nom souhaité */

let Autruche = "Animal"
var Perche = "poisson"
// j'ai défini des variable de type "string" (chaine de caractère)

let NombreStagiaire = 10
/* j'ai défini une varible avec le nom NombreStagiare
et je lui est donner comme donné le nombre 10 
j'ai défini une variable de type INT ( nombre entier) */

var heure = 14.31
/* j'ai crée une varaible avec le nom heure 
je lui ai donné la donné 14.31
j'ai défini une variable de type float/double ( nombre a virgule) */

let Allumer = true
/* j'ai crée une variable avec le nom Allumer 
et comme valeur je lui ai donné la valeur true (vrai)
le type de cette variable est boolean (true/ false)*/

var Ventilo = null
/* j'ai crée une variable avec le nom Ventilo
avec la valeur null qui est est rien du tout 
le type est nul */

let Phrase = "j'aime l'" + Autruche + " mais pas les " + Perche
/*  j'aime l'animal mais pas les poisson
j'ai concaténer ls chaine de caractères et les variabes*/

var calcul = heure + NombreStagiaire
/*  14.31 + 10 */

console.log(Phrase)
console.log(calcul)
// permet d'afficher dans la console du navigateur

/* je creée une fonction qui se nomme horloge avec comme paramètre temps */ 
var temps = 1
function Horloge() {
    // Si temps est plus petit ou églae à 10 on éxécute l'addition et le console log sinon rien 
    if (temps <= 10){
        temps = temps + 1
        // temps++
        // temps += 1
        console.log(temps)
    }

}

//setInterval(Horloge, 1000)

// je voudrai un compte a rebours qui commance a 50 et qui fini a 0 et qui descent toute les 2 sec

var decre = 50
function decrementation(){
    if ( decre >= 0){
        console.log(decre)
        decre--
    }

}

//setInterval(decrementation, 2000)

//Array = tableau
//tableau indexer
//type de varibale qui est elle même un tableau 

var tab = [10, "bonjour", 7.5, null]

/* cette variable est un tableau qui contient 4 valeurs dans l'ordre
10
Bonjour
7.5
Null
*/

console.log(tab[1]) // affiche bonjour
console.log(tab[3]) // affiche Null

/*  je voudrai crée un tableau qui ce nomme chmilblik qui comporte 5 valeur de type sting et 5valeur de type int ou float*/

var chmilblick = ["age" , 36, "poids", 76.5, "jour" , 19, "Mois", 12, "année", 1986 ]

console.log(chmilblick) 
console.log(chmilblick.length) // pour afficher le nombre de valeur du tableau

//document.getElementById('animal').innerHTML = "autruche"  
//sert a changer du text HTML soit HTML = Animal mais avec JS on a changer pour Autruche


/* getElementByID selectionne un élement qui a l'id defini sur animal dans ce cas addEvenLisstener créer une écoute d'évenement */

document.getElementById('animal').addEventListener('click', function() {
    document.getElementById('animal').innerHTML = "Autruche"
})

let Animal = "Chien"
let temp =""
document.getElementById('Animal').addEventListener('click', function() {
    // Je regarde le texte qui ce trouve dans cet élement
    temp = document.getElementById('Animal').innerHTML
    // je modifie le texte qui ce trouve dans cet élement par la valaur de la variable animal
    document.getElementById("Animal").innerHTML = Animal
    Animal = temp
})

/***********  Boucle   *************/

// La boucle tourne jusqu'a la taille du tableau
for(var i = 0; i < chmilblick.length; i++){
    console.log(chmilblick[i])
    if (i == 3){
        break
    }
}

for (index in chmilblick){
    console.log(index)
    //va aficher les index du tableau
}

/***********  Tableau 2   *************/

// tableau Associatif

var tab_assoc = {"ami" : "chien", "cafe": "caféine"}

for (index in tab_assoc){
    console.log(index)
}