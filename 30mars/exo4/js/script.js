// Selectionner la balise h1
var myTittle=document.querySelector('h1');

// Afficher le contenu de la balise dans la console
console.log(myTittle.textContent);

// Modifier le contenu texte de la balise
myTittle.textContent='Le Titre a changé';

// Selectionner la balise #myId
var myId=document.querySelector('#myId');

// Afficher le contenu HTML dans la console
console.log(myId.innerHTML);

// Modifier le contenu HTML de la balise
myId.innerHTML='Contactez-<b>moi</b>'