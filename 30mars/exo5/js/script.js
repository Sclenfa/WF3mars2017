// Selectionner la balise h1
var myTittle=document.querySelector('h1');
console.log(myTittle)

// Ajouter une class à la balise h1
myTittle.classList.add('error');

// Selectionner la derniere balise p
var myLastP=document.querySelector('p:last-of-type');
console.log(myLastP)

// Supprimer la class hidden
myLastP.classList.remove('hidden');

// Selectionner la balise button
var myButton=document.querySelector('button');

// Selectionner la premiere balise h2
var myFirstH2=document.querySelector('h2');

// Capter le clic sur le bouton
myButton.onclick = function(){
    // Ajouter ou supprimer la class move sur la première balise h2
    myFirstH2.classList.toggle('move')
}