// Créer un  objet contenant 4 propriétés
var users={
    first: 'Cloud',
    second: 'Vincent',
    third: 'Aerith',
    fourth: 'Tiffa',
};
// Boucle for...in sur l'objet
for(var prop in users){

    // Afficher le nom de la propriété
    console.log(prop);    
    // Afficher la valeur des propriétés
    console.log(users[prop]);
};