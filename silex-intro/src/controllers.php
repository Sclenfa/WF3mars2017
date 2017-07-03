<?php

use Controller\FirstController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

/*
 * name est une variable dans l'url, passée a la fonction anonyme qui sert
 * de controleur puis a la vue dans la methode render de twig
 */
$app->get('/hello/{name}', function ($name) use ($app){
    return $app['twig']->render(
        'hello.html.twig',
        ['name' => $name]
        );
})
->bind('hello')
;

$app->get('/twig', function() use($app){
    return $app['twig'] -> render(
        'twig.html.twig',
        ['myvar' => 'Variable de fifou']
        );
})
->  bind('twig')
;

$app['first.controller'] = function (){
    return new FirstController();
};

$app
    ->get('/test', 'first.controller:testAction')
    ->bind('test');

//$name sera passé a la methode testParamAction
$app
    ->get('/test/{name}', 'first.controller:testParamAction')
    ->bind('test_param');

$app
    ->get('/users', 'first.controller:usersAction')
    ->bind('users');

$app
    ->get('/{id}', 'first.controller:userAction')
    ->bind('user');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
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
