<?php

namespace App\Controllers;


class HomeController extends Controller{
    public function index(){
        $titre = "Page d'accueil";
       $this->render('home/index', compact('titre'));
    }
}