/*
    Créer un tableau contenant 4 index
    -1 string
    -1 number
    -2 boolean
*/

var myArray = [ 'texte', 12, true, false
];
console.log(myArray);

/*
    Ajouter un string
    Afficher le tableau dans la console
*/
myArray.push('string');
console.log(myArray);

/*
    Afficher dans la console la taille du tableau
    Afficher chacun des index du tableau
*/
console.log(myArray.length, myArray[0], myArray[4]);

/*
    Créer un objet contenant 3 propriété
    - le tableau
    -1 prénom
    -1 age
*/
var  myObj = {
    tableau: myArray,
    prenom: 'Cloud',
    age: 27
}
console.log(myObj)

/*
    Afficher toutes les propriétés de l'objet dans la console une par une
*/
    console.log(myObj.tableau, myObj.prenom, myObj.age);

/*
    Modifier la propriété age de l'objet
    Afficher l'objet dans la console
*/
    myObj.age = 28;
    console.log(myObj);
    