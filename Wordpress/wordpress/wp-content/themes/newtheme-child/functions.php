<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
    wp_enqueue_style('parent-style', get_template_directory_uri(). '/style.css');
}

// Ce code permet de recupérer le fichier css du parent.
// La fonction add_action permet d'accrocher le fichier style du theme parent, fichier style du theme enfant, ce que l'on appel un 'hook'.