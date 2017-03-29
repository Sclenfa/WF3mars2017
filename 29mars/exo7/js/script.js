/*

    Le Janken
    -l'utilisateur doit choisr entre pierre, papier et ciseaux
    -l'ordinateur doit choisir entre pierre, papier et ciseaux
    -Nous comparons le choix de l'utilisateur et de l'ordinateur
    -selon le resultat, l'utilisateur a gagné ou l'ordinateur a gagné
    -une partie ce joue en 3 manches

*/

// Variable globale pour le choix de l'utilisateur

var userBet = '';
var userWin = 0;
var computerWin = 0;

/*
    L'utilisateur doit choisir entre pierre, papier et ciseaux
    -Créer une fonction qui prend en paramètre le choix de l'utilisateur
    -Appeler la fonction qui clique sur les bouttons du DOM en précisant le paramètre
    -Afficher le résultat dans la console
*/

    function userChoice(paramChoice){

        // Assigner a la variable userBet la valeur de paramChoice
        userBet=paramChoice;

    };

/*
    L'ordinateur doit choisir entre pierre, papier et ciseaux
    -Faire une fonction pour déclenché le choix au clic sur un bouton
    -Créer un tableau contenant 'pierre', 'feuille' et 'ciseaux'
    -Faire en sorte de choisir aléatoirement l'un des 3 index du tableau
    -Afficher le résultat dans la console
*/

    function computerChoice(){
        // Afficher dans la console la valeur de userBet
        var computerMemory = [ 'Pierre', 'Feuille', 'Ciseaux' ];

        // Choisir aléatoirement l'un des 3 index du tableau
        var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];



        // Vérifier si userBet est vide
        if(userBet == ''){
            document.querySelector('h2').innerHTML = 'Choisi ton <i>arme<i> !';
    }else{
            // Afficher les deux choix dans la balise h2
            document.querySelector('h2').textContent = userBet + ' VS ' + computerBet;

            // Comparer les variables
            if (userBet == computerBet) {
                document.querySelector('p').textContent = 'Égalité'

            } else if(userBet == 'Pierre' && computerBet == 'Ciseaux'){
                document.querySelector('p').textContent = 'Gagné'
                // Incrémenter la variable userWin de 1
                userWin++;
                

            } else if(userBet == 'Feuille' && computerBet == 'Pierre'){
                document.querySelector('p').textContent = 'Gagné'
                userWin++;
                

            } else if(userBet == 'Ciseaux' && computerBet == 'Feuille'){
                document.querySelector('p').textContent = 'Gagné'
                userWin++;                
                

            } else{
                document.querySelector('p').textContent = 'Perdu...'
                // Incrémenter la variable computerWin de 1
                computerWin++;
            }
        };

        // Vérifier les valeurs de userWin et computerWin
        if (userWin == 3) {
            // Afficher le message dans le body
            document.querySelector('body').innerHTML='<h1>Vous avez gagné</h1><a href="index.html">Rejouer</a>';
        }
        if (computerWin == 3) {
            document.querySelector('body').innerHTML='<h1>Vous avez perdu...</h1><a href="index.html">Try Again !!</a>';
            
        }
    }