/*
    Ajouter une balise HTML  dans le DOM
    -Sélectionner le document
    -Appliquer la fonction write
    -Ajouter le contenue
*/
document.write('<p>Je suis généré en JS</p>');

var myArray=['Cloud', 'Ticus', 'Sephiroth', 'Auron'];

for (var i = 0; i < myArray.length; i++) {
    document.write('<p>Salut ' + myArray[i] + '</p>')
}
