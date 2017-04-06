$(document).ready(function(){

        // Créer une fonction pour l'animation d'une competences
        function mySkills(paramEq, paramWidth){
            $('h3 + ul').children('li').eq(paramEq).find('p').animate({
                width: paramWidth
            })
        }


        // Burger menu ouverture
            $('header a').click(function(evt){
                evt.preventDefault()
                $('nav').slideToggle(500)
            });

        // Burger menu navigation
            $('nav a').click(function(evt){
                evt.preventDefault()

                // Masquer le main
                $('main').fadeOut()

                $('.fa').click(function(){
                    $('#modal').fadeOut()
                });

            var viewToLoad = $(this).attr('href')

                // Fermer le toggle menu
                $('nav').slideUp(function(){

                    function openModal(){
                        $('#modal').fadeIn()
                    }
                    // Charger la bonne vue puis afficher le main
                    $('main').load('views/' + viewToLoad, function(){
                        $('main').fadeIn(function(){

                            // Vérifié si l'utilisateur veux voir la page about.html
                            if(viewToLoad == 'about.html'){
                            // Appeler la fonction mySkills
                            mySkills(0, '30%');
                            mySkills(1, '50%');
                            mySkills(2, '60%');
                        }
                        if(viewToLoad == 'portfolio.html'){
                            $('button').click(function(){
                                openModal()
                            })
                        }

                        })

                        })
                    })

                

        });
















}); //Fin du chargement de la page