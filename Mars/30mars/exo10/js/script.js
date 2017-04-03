$(document).ready(function(){
    
        // Manipuler le contenu texte du footer
        console.log($('footer').text());
        $('footer').text('Sous la licence MIT')

        // Manipuler le contenu HTML du footer
        console.log($('footer').html());
        $('footer').html('Sous licnce <b>MIT</b>')

        // Créer un objet pour la page d'accueil
        var homeContent = {
            title: 'Bienvenu sur mon site',
            content: 'Je suis le texte de la page <b>Accueil<b/>',
        }
        var portfolioContent = {
            title: 'Bienvenu sur mon Portfolio',
            content: 'Je suis le texte de la page <b>Portfolio</b>',
        }
        var contactsContent = {
            title: 'Bienvenu sur la page Contacts',
            content: 'Je suis le texte de la page <b>Contacts</b>',
        }
        // Créer une fonction pour gérer le menu
        function showMyContent(){

        // Capter le clic sur la premiere li
            $('li').click(function(){
                console.log($(this).attr())
                // Modifier le contenu de la balise h2
                $('h2').text(homeContent.title);
                // Modifier le contenu de la balise page
                $('p').html(homeContent.content);
            });
        }






}); //Fin du chargement du DOM