// Créer une variable de type objet
var user = { 
    firstName: 'Laurent',
    lastName: 'Prunet',

    // Ajouter une fonction pour afficher le nom complet
    fullName: function(){
        console.log(this.firstName + ' ' + this.lastName);
    }
};

// Afficher l'objet
console.log(user);

// Afficher une propriété de l'objet
console.log(user.firstName);

// Modifier la valeur d'une propriété de l'objet
user.lastName='Strife'
console.log(user);

// Appeler la fonction de lobjet
user.fullName();