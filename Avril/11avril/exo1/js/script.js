$(document).ready(function(){


        var boxChecked;

    // UI checkbox
    $('[type="checkbox"]').click(function(){

        var checkboxArray = $('[type="checkbox"]').not($(this))
        for (var i = 0; i < checkboxArray.length; i++){
            boxChecked = $(this).val()

            // Décoché les checkbox
            checkboxArray[i].checked = false
        }

        // Modifier l'image
        if($(this).val() == 'first'){
            $('img').attr('src', 'img/chat1.jpg')

        }else if($(this).val() == 'second'){
            $('img').attr('src', 'img/chat2.jpg')

        }else if($(this).val() == 'third'){
            $('img').attr('src', 'img/vacance.jpg')

        }else{
            $('img').attr('src', 'img/ville.jpg')
        }

    })

    $('form').submit(function(evt){
        evt.preventDefault()

        //  Verifier quelle checkbox est coché
        // afficher une modal avec l'image selectionner
        // réinitialisé le formulaire
        if(boxChecked == undefined){


        }else{
            $('#modal').fadeIn()
        }

        $('.fa').click(function(){
            $('#modal').fadeOut()
        })

        $('form')[0].reset()
    }); // Fin du formulaire
















}); // Fin du chargement du DOM