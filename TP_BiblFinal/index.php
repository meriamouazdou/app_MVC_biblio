<?php
define('URL', str_replace('index.php', '', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));
use App\Autoloader;
use App\Core\Routeur;
use App\Models\LivreModel;

require_once "Autoloader.php";

Autoloader::register();
/*echo 'HTTP_HOST : '.$_SERVER['HTTP_HOST']."<br>";
echo 'PHP_SELF : '.$_SERVER['PHP_SELF']."<br>";
echo str_replace('index.php', '', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
*/
$routeur = new Routeur();
$routeur->start();
/*
$model = new LivreModel();
*/
//var_dump($model->find(2));

//var_dump($model->findBy(["nbPages"=>326,"nom"=>"Livre__22"])->fetchAll());
/*
$model->setId(4);
$model->setNom("Livre5");
$model->setNbPages(555);
$model->delete();
*/

?>