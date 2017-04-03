$(document).ready(function(){

    // Créer un tableau vide pour enregistré les avatarStyleBottom
        var myTown=[]

        // Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman')
        var avatarMan = $('#avatarMan')
        var avatarGender;

        // avatarWoman capter le clic
        avatarWoman.click(function(){

            // Désactiver avatarMan
            avatarMan.prop('checked', false)

            // Modifier la valeur de avatarGender
            avatarGender = avatarWoman.val()

            // Vider le message d'erreur
            $('.labelGender b').text('')

            console.log(avatarGender)

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')
        })
        
        // avatarMan capter le clic
        avatarMan.click(function(){

            // Désactiver avatarWoman
            avatarWoman.prop('checked', false)

            // Modifier la valeur de avatarGender
            avatarGender = avatarMan.val()

            // Vider le message d'erreur
            $('.labelGender b').text('')
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')

        })


        // Capter l'evenement change sur les selects
        $('select').change(function(){
            if($(this).attr('id')=='avatarStyleTop'){
                // Modifier la valeur de l'attribut src de #avatarTop
                $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');
            }else{
                $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val() + '.png');
            }
        });




    // Capter la soumision du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par defaut du formulaire
        evt.preventDefault()

        // Définir une variable pour la validation finale du formulaire
        var formScore = 0

        // Variables globales du formulaire
        var avatarName = $('#avatarName').val()
        var avatarAge = $('#avatarAge').val()
        var avatarWoman = $('#avatarWoman')
        var avatarMan = $('#avatarMan')
        var avatarStyleTop = $('#avatarStyleTop').val()
        var avatarStyleBottom = $('#avatarStyleBottom').val()

        // Vérifier les champs du formulaire
            // avatarName minimum 5 caractères
            if(avatarName.length<5){
                // Ajouter un message d'erreur dans le label
                $('[for="avatarName"] b').text('Minimum 5 caractères')
            }else{
                formScore++
            }

            // avatarAge entre 0 et 100
            if(avatarAge == 0 || avatarAge >100 || avatarAge.length == 0){
                $('[for="avatarAge"] b').text('Choississez un âge')
                
            }else{

                // Incrémenter la variable formScore
                formScore++
            }


            // avatarStyleTop obligatoire
            if(avatarStyleTop == 'null'){
                $('[for="avatarStyleTop"] b').text('Choississez un haut')

            }else{
                formScore++                
            }

            // avatarStyleBottom obligatoire
            if(avatarStyleBottom == 'null'){
                $('[for="avatarStyleBottom"] b').text('Choississez un bas')
            }else{
                formScore++                
            }

            // avatarGender vérifier la valeur
            if(avatarGender == undefined){
                $('.labelGender b').text('Choississez un sexe')
            }else{
                formScore++                
            }

            // Vérifier la valeur de la variable formScore
            if(formScore==5){

                // Envoyer les donnée du formulaire et attendre la réponse du serveur en Ajax
                // Le serveur répond True

                // Ajouter une ligne dans le tableau HTMl
                $('table').append('' +
                '<tr>'+
                    '<td><b>' + avatarName + '</b></th>'+
                    '<td>' +avatarAge + '</th>'+
                    '<td>' + avatarGender + '</th>'+
                    '<td>' + avatarStyleTop + ', '+avatarStyleBottom +'</th>'+
                '</tr>'
                );

                // Ajouter l'avatar dans le tableau JS
                myTown.push({
                    name: avatarName,
                    age: parseInt(avatarAge),
                    gender: avatarGender,
                    top: avatarStyleTop,
                    bottom: avatarStyleBottom
                })

                // Vider les champs du formulaire
                $('form')[0].reset()

                // Revenir aux valeurs 'null' pour l'avatar
                $('#avatarBody').attr('src', 'img/null.png')
                $('#avatarTop').attr('src', 'img/top/null.png')
                $('#avatarBottom').attr('src', 'img/bottom/null.png')

                // Afficher la taille total de la ville dans #totalSims
                $('#totalSims').text(myTown.length)

                // Définir les variables globales pour les statistiques
                var totalGirls=0
                var totalBoys=0
                var totalAge=0

                // Faire une boucle sur myTown pour connaitre les statistiques
                
                for (var i = 0; i < myTown.length; i++){

                    // Condition pour le gender
                    if(myTown[i].gender == 'girl'){
                        totalGirls++

                    }else{
                        totalBoys++
                    }
                    // Additionner les ages
                    totalAge+=myTown[i].age
                    
                }

                    // Afficher dans le tableau html le nombre de girls et le nombre de boys
                    $('#simsWoman').html(totalGirls + '<b>/' + myTown.length + '</b>')
                    $('#simsMan').html(totalBoys + '<b>/' + myTown.length + '</b>')
                    var ageAmount=Math.round(totalAge/myTown.length)
                    $('#simsAgeAmount').html(ageAmount + '<b> ans </b>')

            }
    });
            // Supprimer les messages d'erreur
            $('input, select').focus(function(){
                // Selectionner la balise précedent le input
                $(this).prev().children('b').text('')
            })
















}); // Fin du chargement du DOM