//while (false){} // Tandi que ce qu'il ce trouve dans les parenthèses est vrai elle tourne

for(var i=1; i <= 10; i++){
    /* je défini une variable i qui s'incrémente de 1 tout les tours de la boucle grâce a i++
    et je lui demande de tournr jusqu'a ce que i soit surérieur a 10*/
    console.log(i)
}

// voir boucle for aussi dans variable.js

do {
    console.log('Bonjour')
    // Elle s'éxecute une fois même si la condition est fausse et elle continue de s'executer si la condition est vrai
} while(false)


for (var i = 10; i >= 0; i--) {
    console.log(`Il reste ${i} ligne${i <=1 ? '' : 's'} à écrire`);
    // ${i <=1 ? '' : 's'} = condition ternaire sois si i<=1 alors(?) je change rien  sinon(:) je met S
}

function afficherDiviseurs(n) {
    var diviseur = ""
    for (var i = 1; i <= n; i++) {
        if (n % i === 0) {
            diviseur += i + ", ";
        }
    }return diviseur
}

for(let index =1; index <= 20; index++){
    console.log(`Les diviseurs de ${index} sont: ${afficherDiviseurs(index)}`)
}

