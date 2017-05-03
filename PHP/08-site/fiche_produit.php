<?php
require_once('inc/init.inc.php');

//***************************************** Traitement *******************************************
$aside = '';
    // 1- Controler l'existence du produit demandé
        if(isset($_GET['id_produit'])){  // Si existe l'indice id_produit  dans l'url.
            // On requete en base le produit demandé pour vérifier son existence.
            $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

            if($resultat->rowCount() <= 0){
                header('location:boutique.php');  // Si il n'y a pas de résultat dans la requete, c'est que le produit n'existe pas: on oriente alors vers la boutique.
                exit();
            }

    // 2- Affichage du detail du produit:
        $produit = $resultat->fetch(PDO::FETCH_ASSOC);
        $contenu .= '<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">'. $produit['titre'] .'</h1>
                        </div>
                    </div>';

        $contenu .= '<div class="col-md-8">
                        <img src="'. $produit['photo'] .'" class="img-responsive">
                    </div>';

        $contenu .= '<div class="col-md-4">
                        <h3>Description</h3>
                        <p>'. $produit['description'] .'</p>

                        <h3>Details</h3>
                        <ul>
                            <li>Catégorie: '. $produit['categorie'] .'</li>
                            <li>Couleur: '. $produit['couleur'] .'</li>
                            <li>Taille: '. $produit['taille'] .'</li>
                        </ul>

                        <p class="lead">Prix: '. $produit['prix'] .'</p>
                        
                    </div>';

    // 3- Affichage du formulaire d'ajout au panier si stock > 0:
        $contenu .= '<div class="col-md-4">';
            if($produit['stock'] > 0){
                // Si il y a du stock, on met le bouton d'ajout au panier.
                $contenu .= '<form method="post" action="panier.php">';
                    $contenu .= '<input type="hidden" name="id_produit" value="'. $produit['id_produit'] .'">';
                    $contenu .= '<select name="quantite" id="quantite" class="form-group-sm from-control-static">';
                        for($i = 1; $i <= $produit['stock'] && $i<= 5; $i++){
                            $contenu .= "<option>$i</option>";
                        }
                    $contenu .= '</select>';
                    $contenu .= '<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn">';
                $contenu .= '</form>';
            }else{
                $contenu .= '<p>Rupture de stock</p>';
            }

    // 4- Lien retour vers la boutique:
        $contenu .= '<p><a href="boutique.php?categorie='. $produit['categorie'] .'">Retour vers votre selection</a></p>';
        $contenu .= '</div>';
        }else{
            // Si l'indice id_produit  n'est pas dans l'url:
            header('location:boutique.php');  // On le redirige vers la boutique.
            exit();
        }



//**********************************
// Exercice
//**********************************
    // Vous allez creer des suggestions de produits: affichez 2 produits, photo et titre aléatoirement appartenant à la categorie produit affiché dans la page detail. Ces produits doivent etre differents du produit affiché. La photo est cliquable et amène à la fiche produit.

    // Utilisez la variable $aside pour afficher le contenu.

    $suggestion = executeRequete("SELECT id_produit, photo, titre FROM produit WHERE id_produit != :id_produit AND categorie = :categorie ORDER BY RAND() LIMIT 2", array('id_produit' => $produit['id_produit'], 'categorie' => $produit['categorie']));

    while($proposition = $suggestion->fetch(PDO::FETCH_ASSOC)){
        $aside .= '<div class="col-sm-3">';
        $aside .= '<h4>'. $proposition['titre'] .'</h4>';
        $aside .= '<a href="?id_produit='. $proposition['id_produit'] .'"><img src="'. $proposition['photo'] .'" style="width:100%"></a>';
        $aside .= '</div>';
    }






//***************************************** Affichage ********************************************
require_once('inc/haut.inc.php');
echo $contenu_gauche;   // Recevra le pop-up de confirmation d'ajout au panier.
?>
<div class="row">
    <?php echo $contenu;  // Affiche le detail d'un produit. ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Suggestion de produits</h3>
    </div>
    <?php echo $aside;  // Affiche les produits suggérés ?>
</div>
<?php
require_once('inc/bas.inc.php');