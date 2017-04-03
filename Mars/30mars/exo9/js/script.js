$(document).ready(function(){
    console.log('Le DOM est chargé')
    
    // Capter l'evenement focus sur le textarea
    $('textarea').focus(function(){
        console.log('Minimum 10 caractères');
    });

    // Capter l'evenement blur sur le textarea
    $('textarea').blur(function(){
        console.log('L\'utilisateur est sorti du focus')
    });

    // Capter l'evenement scroll sur le header
    $('header').scroll(function(){
        console.log('Scroll')
    });

    // Capter l'evenement hover sur le main
    $('main').hover(function(){
        console.log('hover')
    })

    // Capter l'evenement clic sur balise a
    $('a').click(function(evt){
        console.log('clic')
        // Empecher le comportement naturel de la balise a
        evt.preventDefault();
    });

    // Capter la soumission du formulaire
    $('form').submit(function(evt){
        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();
        console.log('Vérifié les inputs/textarea avant de les envoyer au fichier de traitement PHP')
    });






}); //Fin de la fonction d'attente de chargement de la page