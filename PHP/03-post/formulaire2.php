<!--Exercice: Créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page.-->
            
    <form method="post" action="">

        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville"><br>

        <label for="codePostal">Code Postal</label>
        <input type="text" id="codePostal" name="codePostal"><br>

        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse"></textarea>

        <input type="submit" name="validation" value="Valider">

    </form>

    <?php

        if(! empty($_POST)){
            echo 'Ville: ' .$_POST['ville'] . '<br>';
            echo 'Code postal: ' .$_POST['codePostal'] . '<br>';    // Attention les "name" sont sensible à la casse.
            echo 'Adresse: ' .$_POST['adresse'] . '<br>';
        }
        
    ?>