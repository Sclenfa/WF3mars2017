$(document).ready(function(){

    $('form').submit(function(evt){
        evt.preventDefault()

        // Variable globales du form
        var userName = $('#userName')
        var userNumber = $('#userNumber')
        var userMessage = $('#userMessage')
        var userSelect = $('#userSelect')
        formScore=0;

        // Vérifier si userName est égal a 0
        if (userName.val().length < 2){
            console.log('Erreur userName')
        }else{
            formScore++
        }
        // Vérifier si userNumber est vide
        if (userNumber.val().length == 0){
            console.log('Pas bon')
        }else{
            formScore++
        }

        // Vérifier si userMessage est vide
        if (userMessage.val().length < 5){
            console.log('Mettre du texte')
        }else{
            formScore++
        }
        if (userSelect.val() == 'null'){
            console.log('Select vide')
        }else{
            formScore++
        }
        // Vérifier la validité du form
        if(formScore == 4){
            $('form').next().text('Formulaire validé')
            $('form')[0].reset()
        }else{
            console.log('Formulaire pas validé')
        }
    }) // Fin du formulaire

















}) // Fin du chargement du DOM