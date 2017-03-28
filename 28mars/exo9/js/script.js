// Créer une variable de type ARRAY (tableau)

var myArray = [ 'texte', 454, true ];
console.log(myArray);

// Afficher la taille du tableau (nombre d'index)
console.log('La taille du tableau est de : ' + myArray.length);

// Afficher un des index du tableau
console.log(myArray[0]);

// Ajouter un index dans le tableau
myArray.push('Une valeur en plus');

// Supprimer et remplacer les index du tableau
myArray.splice(2, 1, false );
console.log(myArray);