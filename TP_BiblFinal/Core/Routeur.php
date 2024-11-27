<?php

    namespace App\Core;
    use App\Controllers\HomeController;

    class Routeur{
        public function start(){
            // demarrer la session
            session_start();
            // recuperer l'uri
            $uri = $_SERVER['REQUEST_URI'];
            if(!empty($uri) && $uri!='/' && $uri[-1]==='/'){
                $uri = substr($uri, 0, -1);
                http_response_code(301);
                if(empty($_GET['p'])){
                    $uri = $uri.'/home/index';
                }
                header('Location: '.$uri);
            }
            $parametres = [];
            if(!empty($_GET['p'])){
                $parametres = explode('/', $_GET['p']);
                if($parametres[0]!=''){
                    $controller = '\\App\\Controllers\\'.ucfirst(array_shift($parametres)).'Controller';
                    $controller = new $controller();
                    $action = (isset($parametres[0]) && $parametres[0]!='')?array_shift($parametres):'index';
                    if(method_exists($controller, $action)){
                        (isset($parametres[0]))?call_user_func_array([$controller,$action],$parametres):$controller->$action();
                    }else{
                        http_response_code(404);
                        echo "la resource demandée n'existe pas";
                    }
                }

            }else{
                $controller = new HomeController();
                $controller->index();
            }
        }
    }



?>