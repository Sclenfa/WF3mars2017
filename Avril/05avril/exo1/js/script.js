$(document).ready(function(){

    // Capter le clic sur le premier bouton
    $('button:first').click(function(){
        $('section:first').load('views/about.html', function(){
            // Fonction de callback de la fonction load
            $('section').eq(0).fadeToggle()
        })
    })

    $('button').eq(1).click(function(){
        console.log('clic')
        $('section').eq(1).load('views/content.html #portfolio', function(){
            $('section').eq(1).fadeToggle()
        })
    })

    $('button').eq(2).click(function(){
        $('section').eq(2).load('views/content.html #contacts', function(){
            submitForm()
            $('section').eq(2).fadeToggle()
        })
    })
        // Créer une fonctino pour capter la soumission du formulaire
    function submitForm(){
        $('form').submit(function(evt){
            // Variable pour validation du formulaire
            var formScore=0

            evt.preventDefault()

            // Minimum 4 caractères pour l'email et 5 caractère pour le message
            if($('[type="email"]').val().length < 4 ){
                console.log('email manquant')
            }else{
                console.log('email OK')
                formScore++
            }
            if($('textarea').val().length < 5){
                console.log('NON !')

            }else{
                console.log('message OK')
                formScore++
            };
            // Vérifié la valeur de formScore
            if(formScore == 2){
                console.log('Formulaire validé')
                // Envoie des données vers le fichier de traitement PHP
                // Le fichier PHP répond true : Je peux continué mon code
                // Ajouter le message dans la balise aside
                $('aside').append('<h3>' + $('[type="email"]').val() + '</h3><p>' + $('textarea').val() + '</p>');
                $('form')[0].reset()
            }
        })
    }


















}); // Fin du chargement du DOM