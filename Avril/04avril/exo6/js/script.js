$(document).ready(function(){

    /*
    homePage
    */

        // Burger menu ouverture
            $('.homePage header a').click(function(evt){
                evt.preventDefault()
                $('nav').slideToggle(500)
            });

        // Burger menu navigation
            $('.homePage nav a').click(function(evt){
                evt.preventDefault()

            var linkToOpen = $(this).attr('href')

                // Fermer le toggle menu
                $('.homePage nav').slideUp(function(){

                // Changer de page
                window.location = linkToOpen;
            });
        });
    /*
    aboutPage
    */
        $('.aboutPage h1 + a').click(function(evt){
            evt.preventDefault()
            var linkToOpen = $(this).attr('href')            
            $('.aboutPage nav').animate({
                left: '0'
            })
        });

        $('.aboutPage nav a').click(function(evt){
            evt.preventDefault();

            var linkToOpen = $(this).attr('href')

            // fermer le Burger
            $('.aboutPage nav').animate({
                left: '-100%'
            }, function(){
                // Changer de page
                window.location = linkToOpen;
            })
        })

    /*
    portfolioPage
    */
        
        














}); //Fin du chargement de la page