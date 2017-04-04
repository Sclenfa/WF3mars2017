$(document).ready(function(){

    // Ouvrir Burger menu classique
        $('.fa-bars').click(function(){
            $('nav ul').fadeIn(500)
        })

    // Fermer burger menu classique
        $('a').click(function(evt){
            evt.preventDefault();
            $('nav ul').fadeOut(500)
        })


}); //Fin du chargement du DOM