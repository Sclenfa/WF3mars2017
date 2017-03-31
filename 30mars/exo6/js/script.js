

// Selectionner la balise dans laquelle ajouter une autre balise
var myMain=document.querySelector('main');

// Créer un tableau contenant 4 titres
var myArray=['Home', 'About', 'Portfolio', 'Contacts']

// Faire une boucle sur le tableau
for (var i = 0; i < myArray.length; i++) {

    // Créer une variable pour généré une balise HTML
    var myNewTag=document.createElement('h2');

    // Ajouter du contenu dans la balise générée
    myNewTag.innerHTML=myArray[i];

    // Ajouter un enfant dans myMain
    myMain.appendChild(myNewTag)
}