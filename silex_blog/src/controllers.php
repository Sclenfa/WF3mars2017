<?php

use Controller\IndexController;
use Controller\Admin\CategoryController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Controller\Admin\ArticleController;

$app['index.controller'] = function () use ($app) {
    return new IndexController($app);
};

$app
    ->get('/', 'index.controller:indexAction')
    ->bind('homepage')
;

$app
    ->get('/rubriques', 'index.controller:categoriesAction')
    ->bind('categories')
;

$app
    ->get('/rubrique/{id}', 'index.controller:categorieAction')
    ->assert('id', '\d+')
    ->bind('category')
;

$app['admin.category.controller'] = function () use ($app) {
    return new CategoryController($app);
};

$app
    ->get('admin/rubriques', 'admin.category.controller:listAction')
    ->bind('admin_categories')
;

$app
    ->match(
        'admin/rubriques/edition/{id}', 
        'admin.category.controller:editAction'
    )
    // valeur par défaut pour le paramètre de la route
    ->value('id', null)
    ->bind('admin_category_edit')
;

$app
    ->get(
        'admin/rubriques/suppression/{id}', 
        'admin.category.controller:deleteAction'
    )
    ->bind('admin_category_delete')
;

/*
 * Créer la partie admin pour les articles :
 * - Créer le contrôleur Admin\ArticleController
 * - le définir en service
 * - on y ajoute la méthode listAction à vide
 * - puis la route qui pointe dessus
 * - on ajoute le lien vers cette route dans la navbar admin
 * - on crée l'entity Article et le repository ArticleRepository
 * - on déclare le ArticleRepository en service dans app.php
 * - on remplit la méthode listAction du contrôleur en utilisant ArticleRepository
 * - on crée la vue qui affiche les articles dans un tableau html
 */

$app['admin.article.controller'] = function () use ($app){
  return new ArticleController($app);
};

$app
    ->get('admin/article', 'admin.article.controller:listAction')
    ->bind('admin_articles')
;

$app
    ->match(
        'admin/articles/edition/{id}',
        'admin.article.controller:editAction'
    )
    // valeur par défaut pour le paramètre de la route
    ->value('id', null)
    ->assert('id', '\d+')
    ->bind('admin_article_edit')
;

$app
    ->get(
        'admin/articles/suppression/{id}',
        'admin.article.controller:deleteAction'
    )
    ->bind('admin_article_delete');

$app->error(function (Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
