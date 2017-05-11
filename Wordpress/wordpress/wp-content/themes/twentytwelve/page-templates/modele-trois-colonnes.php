<?php

//******************************** Template name: modele trois colonnes ****************************//

get_header(); ?>

    <div class="modele-trois-colonne-colonne-gauche">...</div>
    <div id="primary" class="site-content modele-trois-colonne-colonne-centrale">
        <div id="content" role="main">
            <?php while(have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'page'); ?>
                <?php comments_template('', true); ?>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="modele-trois-colonne-colonne-droite">...</div>
    <div class="clear"></div>

<?php get_footer(); ?>