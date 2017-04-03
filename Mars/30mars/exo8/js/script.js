// Attendre le chargement du DOM

$(document).ready(function(){

    // Code a executer sur la page une fois chargé

    /*
    Le deathSelector
    */
    var deathSelector=$('h3').prev().parent().parent().next().parent().find('main').next().find('li').eq(1).parent().parent().prev().find('h3')
    console.log('Balise Selectionnée : ', deathSelector)


    /*
    Les selecteurs jQuery "classique"
    */
        // Selectioner une balise par son nom (tag)
        var myHtmlTag = $('header');
        console.log(myHtmlTag);

        // Selectionner une balise par sa classique
        var myClass = $('.myClass');
        console.log(myClass);

        // Selectionner une balise par son ID
        var myId = $('#myId');
        console.log(myId);
        
        // Selecteur imbriqué
        var myItalic = $('h2 i');
        console.log(myItalic);

        // Selecteur CSS3
        var myFooter = $('body > main + footer');
        console.log(myFooter);

    /*
    Les selecteurs jQuery spécifique
    */
        // Selecteur d'enfant direct
        var myChildren=$('header').children('button')
        console.log(myChildren);

        // Selecteur de parent
        var myParent=$('h2').parent();
        console.log(myParent);

        // Trouver une balise
        var myH2=$('main').find('h2');
        console.log(myH2);

        // Selectionner le premier
        var  myFirstBtn=$('button:first')
        console.log(myFirstBtn);

        // Selectionner le dernier
        var myLastBtn=$('button:last')
        console.log(myLastBtn)

        // Selectionner la nth balise
        var mySecondLi=$('li').eq(1);
        console.log(mySecondLi)

        // Selectionner la balise suivante
        var afterMain=$('main').next();
        console.log(afterMain);

        // Selectionner la balise précédente
        var previousMain=$('main').prev();
        console.log(previousMain)








}); //Fin de la fonction d'attente du chargement du DOM