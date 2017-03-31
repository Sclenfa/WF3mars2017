$(document).ready(function(){

    // Créer une variable (string) pour le titre principal du site
    var siteTitle = 'Laurent Prunet <span>Noob développeur FrontEnd</span>';

    // Créer un tableau pour la nav
    var myNav = ['Accueil', 'Portfolio', 'Contacts'];

    // Créer un objet pour les titres des pages
    var myTitle = {
        Accueil: 'Bienvenue sur la page d\'accueil',
        Portfolio: 'Découvrez mes travaux',
        Contacts: 'Contactez-moi pour plus d\'information'
    };
    // Créer un objet pour le contenu des pages
    var myContent={
        Accueil: '<h3>Contenu de la page Accueil</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, libero. Cum voluptate quos magnam ab soluta dolorem nisi officia! Numquam, sint alias accusamus aut aliquid quam nostrum, inventore aspernatur dolor.</p>',
        Portfolio: '<h3>Contenu de la page Portfolio</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, libero. Cum voluptate quos magnam ab soluta dolorem nisi officia! Numquam, sint alias accusamus aut aliquid quam nostrum, inventore aspernatur dolor.</p>',
        Contacts: '<h3>Contenu de la page Contacts</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, libero. Cum voluptate quos magnam ab soluta dolorem nisi officia! Numquam, sint alias accusamus aut aliquid quam nostrum, inventore aspernatur dolor.</p>'
    };

    // Selectionner le header et le mettre dans une variable
    var myHeader = $('header');

    // Générer une balise H1 dans le header avec le contenu de la variable siteTitle
    myHeader.append('<h1>' + siteTitle + '</h1>' )

    // Générer une balise nav + ul dans le header
    myHeader.append('<nav><i class="fa fa-bars" aria-hidden="true"></i><ul></ul></nav>');

    // Activer le burgerMenu au click sur la balise .fa-bars

    $('.fa-bars').click(function(){
    $('ul').toggleClass('toggleBurger')

    })

    // Faire une boucle sur myNav pour généré les liens de la nav
    for (var i = 0; i < myNav.length; i++) {

        // Générer les balise html
        $('ul').append('<li><a href="' +myNav[i] + '">' + myNav[i] + '</a></li>');
    }


    // Afficher dans le main le titre issu de l'objet mytitle
    var myMain = $('main');
    myMain.append('<h2>' + myTitle.Accueil + '</h2>')
    myMain.append('<section>' + myContent.Accueil + '</section>')

    // Ajouter la class active sur la premiere li de la nav
    $('li:first').addClass('active')

    // Capter l'evenement clic sur les balises a en bloquant le comportement naturel des balise a
    $('a').click(function(evt){

        // Supprimé la class .active des balises li de la nav
        $('li').removeClass('active')
        

        // Bloquer le comportement naturel de la balise
        evt.preventDefault();

        // Connaitre l'occurence de la balise a sur laquelle l'utilisateur a cliqué
        // console.log($(this))

        // Récupéré la valeur de l'attribut href
        // console.log($(this).attr('href'))

        // Vérifié la valeur de l'attribut href pour afficher le bon titre
        if($(this).attr('href')=='Accueil'){

            // Selectionner la balise h2 pour changé son contenu
            $('h2').text(myTitle.Accueil);
            // Selectionner la section pour changé le contenu
            $('section').html(myContent.Accueil)
            $(this).parent().addClass('active')

        }else if($(this).attr('href')=='Portfolio'){
            $('h2').text(myTitle.Portfolio);
            $('section').html(myContent.Portfolio)
            $(this).parent().addClass('active')

        }else{
            $('h2').text(myTitle.Contacts);
            $('section').html(myContent.Contacts)
            // Ajouter la class active sur la balise li de la balise a selectionnée
            $(this).parent().addClass('active')

        }
        // Fermer le burgerMenu
        $('ul').removeClass('toggleBurger')
        });













}); //Fin du chargement du DOM