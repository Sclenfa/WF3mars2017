$(document).ready(function(){

    $('form').submit(function(evt){
        evt.preventDefault()

        // Définir les variables globales
        var userName = $('[placeholder="Your name*"]');
        var userEmail=$('[placeholder="Your email*"]')
        var userSubject = $('select');
        var userMessage = $('textarea');
        var formScore = 0;

        // Vérifier que l'utilisateur a bien saisi son nom
        if(userName.val().length == 0){
            // Ajouter la class error sur l'input
            userName.addClass('error')
        }else{
            formScore++
        }

        // Verifier que l'utilisateur a bien saisi au moins 4 caractères
        if(userEmail.val().length < 4){
            userEmail.addClass('error')
        }else{
            formScore++
        }


        // Verifier que l'utilisateur ai bien choisi un sujet
        if(userSubject.val() == 'null'){
            userSubject.addClass('error')
        }else{
            formScore++
        }

        // Verifier que l'utilisateur ai bien siasi au moins 5 caractères dans le message
        if(userMessage.val().length <5){
            userMessage.addClass('error')
        }else{
            formScore++
        }

        // Validation finale du formulaire
        if(formScore == 4){
            // Envoie des données dans le fichier de traitement PHP
            // PHP repond true => continuer le traitement du formulaire

            // Afficher les données du formulaire dans une modal
            $('div span').text(userName.val());
            $('div b').text(userSubject.val());
            $('div p:last').text(userMessage.val())

            // Afficher la modal
            $('div').fadeIn()
            $('form')[0].reset()
        }
    }); //Fin du formulaire

    $('.fa').click(function(){
        $('div').fadeOut()
    })
    $('input, select, textarea').focus(function(){
        $(this).removeClass()
    })

















}) // Fin du chargement du DOM