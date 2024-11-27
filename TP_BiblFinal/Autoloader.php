<?php

namespace App;

class Autoloader {
    public static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }
    public static function autoload($class){
        //echo $class."<br>";
        $class = str_replace(__NAMESPACE__."\\","",$class);
        //echo $class."<br>";
        $fichier = __DIR__."/".$class.".php";
        //echo $fichier."<br>";
        require_once $fichier;
    }
}

?>