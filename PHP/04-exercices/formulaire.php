<?php
// Exercice:
    // - Réaliser un formulaire permettant de selectionner un fruit dans un selecteur et de saisir un poids quelconque exprimé en grammes.
    // - Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué en passant par la fonction calcul.
    // - Faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.

    include('fonction.inc.php');

if(!empty($_POST)){
    echo calcul($_POST['select'], $_POST['poids']);
}

?>

<form method="post" action="formulaire.php">
    <select name="select">
        <option value="NULL">- Selection -</option>

        <option value="bananes"<?php if(isset($_POST['select']) && $_POST['select']=='bananes')
        echo 'selected'; ?>>Bananes</option>

        <option value="cerises"<?php if(isset($_POST['select']) && $_POST['select']=='cerises')
        echo 'selected'; ?>>Cerises</option>

        <option value="pommes"<?php if(isset($_POST['select']) && $_POST['select']=='pommes')
        echo 'selected'; ?>>Pommes</option>

        <option value="peches"<?php if(isset($_POST['select']) && $_POST['select']=='peches')
        echo 'selected'; ?>>Peches</option>
    </select>
    <input type="number" name="poids" id="poids" value="<?php echo $_POST['poids'] ?? ''; ?>">
    <label for="poids">g</label>
    <input type="submit" name="validation" value="Valider">
</form>