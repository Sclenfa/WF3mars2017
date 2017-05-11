<?php

register_sidebar(array('name' => 'region du bas', 'id' => 'region-du-bas', 'description' => 'region en bas a gauche', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h1 class="widget-title">', 'after_title' => '</h1>', ));


/*
    Explication:
        name: nom de la region
        id: nom informatique de la region
        description: description de la region, utile pour rendre explicite aupres de l'admin
        before_widget: balise de début qui englobera chaque widget placé dans cette region
        after_widget: balise de fin qui englobera chaque widget placé dans cette region
        before_title: balise de début qui englobera chaque titre placé dans cette region
        after_title: balise de fin qui englobera chaque titre placé dans cette region


*/

dynamic_sidebar('region-du-bas');

register_sidebar(array('name' => 'region du haut', 'id' => 'region-du-haut', 'description' => 'region en haut a gauche', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h1 class="widget-title">', 'after_title' => '</h1>', ));

dynamic_sidebar('region-du-haut');

register_sidebar(array('name' => 'region du haut gauche', 'id' => 'region-du-haut-gauche', 'description' => 'region en haut a gauche', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h1 class="widget-title">', 'after_title' => '</h1>', ));

dynamic_sidebar('region-du-haut-gauche');

register_sidebar(array('name' => 'region du haut droite', 'id' => 'region-du-haut-droite', 'description' => 'region en haut a gauche-droite', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h1 class="widget-title">', 'after_title' => '</h1>', ));

dynamic_sidebar('region-du-haut-droite');

?>