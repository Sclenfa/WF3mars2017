// Attendre le chargement du DOM
    $(document).ready(function(){


    // Créer une fonction pour l'animation d'une compétence
        function mySkills( paramEq, paramWidth ){

        // Animation des balise p des skils
            $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });
        
    };


    // Créer une fonction pour ouvrir la modal
        function openModal(){

        // Ouvrir la modal au click sur les boutons
            $('button').click(function(){

            // Afficher l'image du projet
            var modalTitle = $(this).prev().text()
            $('#modal span').text(modalTitle)

            // Afficher l'image du projet
            var modalImage = $(this).parent().prev().attr('src')
            $('#modal img').attr('src', modalImage).attr('alt', modalTitle)



            $('#modal').fadeIn();
        });

        // Fermer la modal au click sur .fa-times
        $('.fa-times').click(function(){
            $('#modal').fadeOut();
        });

    };

    // Créer une fonction pour la gestion du formulaire
        function contactForm(){
            // Capter le focus sur les input
            $('input:not([type="submit"]), textarea').focus(function(){
                $(this).prev().addClass('openedLabel hideError')
            })
            $('select').focus(function(){
                $(this).prev().addClass('hideError ')
            })

            // Capter le blur
            $('input, textarea').blur(function(){

                // Vérifier si il n'y a pas de caractères dans le input
                if($(this).val().length == 0){

                // Selectionner la balise precedente pour supprimer la class openedLabel
                $(this).prev().removeClass()
                }
            })

                $('.fa').click(function(){
                    $('#modal').fadeOut()
                })

            // Capter la soumission de mon formulaire
            $('form').submit(function(evt){
                evt.preventDefault()
                // Définir les variables globales du formulaire
                var userName = $('#userName')
                var userEmail= $('#userEmail')
                var userSubject = $('#userSubject')
                var userMessage  = $('#userMessage')
                var checkbox = $('[type="checkbox"]')
                formScore = 0;

                // Vérifier que userName a au minimum 2 caractères
                if(userName.val().length <= 2){
                    userName.prev().children('b').text('Minimum 2 caractères')
                }else{
                    formScore++
                }
                if(userEmail.val().length <=5 ){
                    userEmail.prev().children('b').text('Minimum 5 caractères')
                }else{
                    formScore++
                }
                if(userSubject.val() == 'null'){
                    userSubject.prev().children('b').text('Selectionnez une valeur')
                }else{
                    formScore++
                }
                if(userMessage.val().length <= 5){
                    userMessage.prev().children('b').text('Minimum 5 caractères')
                }else{
                    formScore++
                }
                if(checkbox.is(':checked')){
                    formScore++
                }else{
                    checkbox.next().text('Veuillez acceptez les Conditions Générales')
                }
                if(formScore==5){
                    console.log('formulaire validé')
                    // Envoi des données dans le fichier de traitement PHP
                    // PHP répond true : Continuer le traitement du formulaire
                    // Ajouter la valeur de userName dans la balise h2 span de la modal
                    $('#modal span').text(userName.val())

                    // Afficher la modal
                    $('#modal').fadeIn()

                    // Vider les champs du formulaire
                    $('form')[0].reset();

                    // Supprimer les messages d'erreur
                    $('form b').text('')
                    $('label').removeClass()
                };
            })

        }


    // Charger le contenu de home.html dans le main
        $('main').load( 'views/home.html' );

    /*
    BurgerMenu
    */
        // Burger menu : ouverture
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();

        });

        // Burger menu : navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Masquer le main
            $('main').fadeOut();

            // Créer une variable pour récupérer la valeur de l'attribut href
            var viewToLoad = $(this).attr('href');

            // Fermer le burger menu
            $('nav').slideUp(function(){

                // Charger la bonne vue puis afficher le main (callBack)
                $('main').load( 'views/' + viewToLoad, function(){

                    $('main').fadeIn(function(){

                        // Vérifier si l'utilisateur veut voir la page about.html
                        if( viewToLoad == 'about.html' ){

                            // Appler le fonction mySkills
                            mySkills( 0, '84%' );
                            mySkills( 1, '25%' );
                            mySkills( 2, '50%' );

                        };

                        // Vérifier si l'utilisateur est sur la page portfolio.html
                        if( viewToLoad == 'portfolio.html' ){

                            // Appeler la fonction pouur ouvrir la modal
                            openModal();
                        };

                        // Vérifier si l'utilisateur est sur la page contacts.html
                        if(viewToLoad == 'contacts.html'){
                            // Déclencher la 
                            contactForm()
                        }

                    });

                });

            });

        });

}); // Fin de la fonction d'attente de chargement du DOM