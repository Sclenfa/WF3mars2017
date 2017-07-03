<?php

namespace Lib;


    class Router{

        /**
         *
         * @var Router
         */
        private static $instance;
        
        /**
         * @var array
         */
        
        private $routes = [];
        
        /**
         * @var string
         */
        
        private $prefixe = '';
        
        
        private function __construct(){}
        
        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new self();
            }
            return self::$instance;
        }
        public function addRoute(
                $name,
                $uri,
                $controller,
                $action
        ){
            $this -> routes[$name] =  [
                'uri' => $uri,
                'controller' => $controller,
                'action' => $action
            ];
            return $this;
        }
        
        public function findRoute(){
            $uri = str_replace(
                    $this->prefixe,
                    '',
                    strtok($_SERVER['REQUEST_URI'], '?')
            );
            
            foreach ($this -> routes as $route){
                if($route['uri']  == $uri){
                    return $route;
                }
            }
        }
        
        public function  run(){
            $route = $this -> findRoute();
            if(!is_null($route)){
                // Construit la chaine Controller\UserController
                $controllerName = 'Controller\\'
                        . ucfirst($route['controller'])
                        . 'Controller';
                
                $actionName = $route['action'] . 'Action';
                $controller = new $controllerName();
                $controller -> $actionName();
                
                /**
                 * Revient à faire : 
                 * $controller = new Controller\UserController();
                 * $controller->listAction();
                 */
            }else{
                header('HTTP/1.0 404 Not Found');
                die();
            }
        }
        
        public function getPrefixe() {
            return $this->prefixe;
        }

        public function setPrefixe($prefixe) {
            $this->prefixe = $prefixe;
            return $this;
        }
    }
