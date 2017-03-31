$(document).ready(function(){
    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Définir une variable pour le score du formulaire
        var formScore=0

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault()

        // Connaitre la valeur saisie dans le input par l'utilisateur 
        var userName = $('input').val();
        console.log(userName)

        // Connaitre le nombre de caractère
        console.log(userName.length)

        // Connaitre la valeur saisie dans le textarea par l'utilisateur
        var userMessage=$('textarea').val(

        )
        // Vérifier la taille de userName (min 1 caracteres)
        if(userName.length == 0){
            // Afficher un message dans le label
            $('[for="userName"] b').text(' : Champ obligatoire')
        }else{
            console.log('userName OK')

            // Incrémenter formScore
            formScore++;
        }

        if(userMessage.length <=5){
            $('[for="userMessage"] b').text(' : Minimum 5 caractères')

        }else{
            console.log('userMessage OK');
            formScore++;
        };
        console.log(formScore)

        if(formScore==2){
            console.log('Le formulaire est validé')

            // Envoyer les données dans le fichier PHP et attendre la reponse du PHP (true/false)
            // Le PHP répond true!

            // Ajouter le message dans la liste
            $('section:last').append('<article><h4>' + userMessage + '</h4><p>' + userName + '</p></article>')

            // Vider les champs du formulaire
            $('input:first').val('')
            $('textarea').val('')

            
        };

        // Supprimer les messages d'erreur
        $('input, textarea').focus(function(){
            $(this).prev().children('b').text('')
        })
    });
    










}); // Fin du chargement du DOM