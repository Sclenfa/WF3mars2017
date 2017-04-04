$(document).ready(function(){

    // Fonction fadeOut()
        $('section').eq(0).children('button').click(function(){ 
            $('section').eq(0).children('article').fadeOut(2000)
        }); //Bouton

    // Fonction fadeIn
        $('section').eq(1).children('button').click(function(){ 
            $('section').eq(1).children('article').fadeIn(2000)
        }); //Bouton

    // Fonction fadeToggle
        $('section').eq(2).children('button').click(function(){ 
            $('section').eq(2).children('article').fadeToggle(2000)
        }); //Bouton

    // Fonction slideUp
        $('section').eq(3).children('button').click(function(){ 
            $('section').eq(3).children('article').slideUp(2000)
        }); //Bouton

    // Fonction slideDown
        $('section').eq(4).children('button').click(function(){ 
            $('section').eq(4).children('article').slideDown(2000)
        }); //Bouton

    // Fonction slideToggle
        $('section').eq(5).children('button').click(function(){ 
            $('section').eq(5).children('article').slideToggle(2000)
        }); //Bouton












}); //Fin du chargement du DOM