// Créer une fonction sans parametres

function helloWorld(){

// Écrire le code à éxecuter a l'appel de la fonction
    console.log('Bonjour le monde');

};

// Appeler la fonction
helloWorld();

// Créer une fonction avec parametres

function fullName(firstName, lastName){
    console.log('Bonjour ' + firstName +' '+lastName);
};

// Appeler la fonction en précisant les paramètres
fullName('Laurent', 'Prunet');