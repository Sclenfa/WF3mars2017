$(document).ready(function(){

    // Fonctione animate
        $('section:first button').click(function(){

            // Changer la hauteur et la largeur de l'article
            $('section:first article').animate({
                height: '20rem',
                width: '20rem'
            })
        }); // Bouton

    // Fonction animate() valeurs dynamique
        $('section:nth-child(2) button').click(function(){
            $('section:nth-child(2) article').animate({
                left: '+=.5rem',
                top: '-=1rem',
            })
        }); //Bouton 2

    // Fonction animate() toggle/show/hide
        $('section:nth-child(3) button').click(function(){
            $('section:nth-child(3) article').animate({
                width: 'toggle'
            })
        }) //Bouton 3

    // Fonction animate() avec callback
        $('section:last button').click(function(){
            $('section:last article').animate({
                width: '20rem',
                height: '20rem'

            }, 2000, function(){
                alert('Fin de l\'animation')
            })
        }); //Bouton 4
















}); //Fin du chargement du DOM