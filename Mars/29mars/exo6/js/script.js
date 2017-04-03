/*

Créer une fonction qui permet a l'utilisateur de choisir une couleur

*/


// Créer une fonction qui permet de choisir une couleur
function chooseColor(){

    // Demander a l'utilisateur de choisir une couleur
    var userPrompt=prompt('Choisir une couleur en tre rouge,vert et bleu');

    // Appeller la fonction de traduction
    translateColor(userPrompt);
};

// Créer une fonction pour traduire une couleur

function translateColor(paramColor){

    // Utilisation du switch
    switch(paramColor) {
        // 1er cas: paramColor est égale à "rouge"
        case 'rouge': console.log('Rouge = Red'); break;
        // 2emecas: paramColor est égal a "vert"
        case 'vert' : console.log('Vert = Green'); break;
        // 3eme cas: paramColor est égal a "bleu"
        case 'bleu' : console.log('Bleu = Blue'); break;
        // Pour tout les autres cas: default est OBLIGATOIRE
        default : console.log('Je ne connais pas cette couleur...'); break;
    }

};
