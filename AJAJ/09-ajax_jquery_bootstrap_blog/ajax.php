<?php
    require_once("inc/init.inc.php");

    $tab = array();
    $tab['resultat'] = "";

    $mode = isset($_POST['mode']) ? $_POST['mode'] : '';

    if($mode == 'enregistrer'){
        if(!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])){
            $result = $pdo->prepare("INSERT INTO article (titre, auteur, contenu, date) VALUES (:titre, :auteur, :contenu, NOW())");
            $result->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
            $result->bindParam(':auteur', $_POST['auteur'], PDO::PARAM_STR);
            $result->bindParam(':contenu', $_POST['contenu'], PDO::PARAM_STR);
            $result->execute();
            $tab['resultat'] .= '<div class="alert alert-success" role"alert">Article enregistré</div>';
        }
    }elseif($mode == 'liste'){
        // Recuperer tout les articles et les placer dans $tab['resultat']
        $article = $pdo->query("SELECT id_article, titre, auteur, contenu, date_format(date, '%d-%m-%Y à %H:%i:%s') as date_fr FROM article ORDER BY date DESC");
        // Mettre en place une fonction ajax qui envoie l'argument mode=liste et qui affiche tout les articles dans l'element avec l'id liste avec un setInterval

        while($result = $article->fetch(PDO::FETCH_ASSOC)){
            $tab['resultat'] .= '<div class="col-sm-4">';
                $tab['resultat'] .= '<div class="panel panel-default">';
                $tab['resultat'] .= '<div class="panel-heading"><h2>' . $result['titre'] . '</h2></div>';
                $tab['resultat'] .= '<div class="panel-body">';
                $tab['resultat'] .= '<span class="small">Par: ' . $result['auteur'] .' le '. $result['date_fr'] .'</span>';
                $contenu = substr($result['contenu'], 0, 105) .' ... <a href="#url/fiche_article.php?id_article='. $result['id_article'] .'">Lire la suite</a>';
                $tab['resultat'] .= '<p>'. $contenu .'</p>';
            $tab['resultat'] .= '</div></div></div>';
        }
    }

    echo json_encode($tab);
?>
