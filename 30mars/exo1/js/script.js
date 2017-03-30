/*
    -Créer un tableau contenant 4 prénoms
    -Faire une boucle sur le tableau pour saluer dans la console chacun des prénoms
    -Afficher un message spécial pour Sephiroth
*/
var myArray=['Cloud', 'Ticus', 'Sephiroth', 'Auron'];
for (var i = 0; i < myArray.length; i++) {
    if(myArray[i] == 'Sephiroth'){
        console.log('Salut c\'est Sephiroth ')
        // Pour modifié une balise html
        document.querySelector('p').textContent = "Salut c'est Sephiroth !";
    }else{
        console.log('Salut ' + myArray[i])
    }
};