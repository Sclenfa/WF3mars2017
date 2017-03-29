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

    if(paramColor == 'rouge'){
        console.log('Rouge ce dit Red en anglais');

    } else if (paramColor == 'bleu'){
        console.log('Bleu ce dit Blue en anglais');

    } else if (paramColor == 'vert'){
        console.log('Vert ce dit Green en anglais');

    } else { // Dans tout les autres cas
        console.log('Je ne connais pas cette couleur...');

        // Rappeler la fonction pour refaire choisir une couleur
        chooseColor();

    };


};
