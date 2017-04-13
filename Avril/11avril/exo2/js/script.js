$(document).ready(function(){

    $('#userSelect, #userMessage').focus(function(){
        $(this).removeClass('error')
    })


            // Capter l'evenement change sur le select
            $('select').change(function(){
                $('section:first img').attr('src', 'img/' + $(this).val() + '.jpg')
            })

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer la fonction par defaut
        evt.preventDefault()

        var userSelect = $('#userSelect')
        var userMessage = $('#userMessage')

        // Créer variable de score pour completion du formulaire
        formScore = 0;

        // Vérifier que l'utilisateur a selectionner une valeur
        if(userSelect.val()== 'chat_0'){
            // Ajout de la class error en cas de non complétion
            $('#userSelect').addClass('error')
        }else{
            formScore++
        }

        // Vérifier que le formulaire ai au moins 5 caractères
        if(userMessage.val().length <= 15){
            // Ajout de la class error en cas de non complétion
            $('#userMessage').addClass('error')
        }else{
            formScore++
        }

        // Vérifier le score de l'utilisateur
        if(formScore == 2){
            $('form').html('<p>Merci. <span>Votre message a bien été envoyer.</span> </p>')
        }

    }) // Fin du formulaire
















}) // Fin du chargement du DOM