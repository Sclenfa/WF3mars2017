<?php

namespace Controller;


use Silex\Application;

class FirstController{
    /*
     * Il suffit de demander une instance  de silex\Application
     * en parametre de la methode pour y avoir acces
     *
     * @param Application $app
     */
    public function testAction(Application $app){
        return $app['twig'] -> render('hello.html.twig');
    }

    public function testParamAction(Application $app, $name){
        return $app['twig'] -> render(
            'hello.html.twig',
            ['name' => $name]
            );
    }

    public function usersAction(Application $app){
        /*
         * @var Doctrine\DBAL
         */
        $db = $app['db'];

        /**
         * Equivaut a faire un query puis fetchAll() avec PDO
         */

        $users = $db -> fetchAll('SELECT * FROM user');

        return $app['twig'] -> render('users.html.twig', ['users' => $users]);
    }

    public function userAction(Application $app, $id){
        $db = $app['db'];

        $id = $db -> fetchAll("SELECT * FROM user WHERE id = $id");

        return $app['twig'] -> render('user.html.twig', ['id' => $id]);
    }
}