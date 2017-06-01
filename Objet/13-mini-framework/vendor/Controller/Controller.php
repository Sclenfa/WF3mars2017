<?php

    namespace Controller;
    use Repository;

    class Controller{
        protected  $repository;
            // Contiendra un objet de ProduitRepository ou MembreRepository ou CommandeRepository etc... En fonction de l'entité dans laquelle je suis (produitController, ou MembreController ou CommandeController...)
        public function getRepository(){
            // Exemple : Je suis dans Controller\ProduitController, et je veux un Repository\ProduitRepository

            $class = 'Repository\\'  . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Repository';
            // Controller\ProduitController
            //Produit
            //Repository\ProduitRepository

            $this -> repository = new $class;
            //$this -> repository = new Repository\ProduitRepository
            return $this -> repository;
        }

        public function render($layout, $view, $params){
            $dirView = __DIR__ . '/../../src/View';
            // Je sors du dossier controller et je vais dans le dossier View

            $dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
            // Si je suis dans Controller\ProduitController, je recupere le mot 'Produit' qui correspond au dossier ou sont stockées mes vues.

            $path_layout = $dirView . '/' . $layout;
            $path_view = $dirView . '/' . $dirFile . '/' . $view;

            extract($params);

            ob_start();  // Enclenche la temporisation de sortie. Cela signifie que la ligne de code juste en dessous ne sera pas executé, elle sera retenue.
            require $path_view;

            $content = ob_get_clean();  // Cela signifie que l'action retenue en temporisation est maintenant representé par la variable $content.

            ob_start();
            require $path_layout;

            return ob_end_flush();  // Retourne tout ce qui a été retenu. Il eteint la temporisation.
        }
    }