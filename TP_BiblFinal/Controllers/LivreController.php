<?php

namespace App\Controllers;
use App\Models\LivreModel;

class LivreController extends Controller{
    public function index(){
       $model = new LivreModel();
       $livres = $model->findAll();
        $titre = 'Liste des Livres';
       $this->render('Livre/index', compact('livres', 'titre'));
    }
    
    public function add(){
        $titre = 'Ajouter un Livre';
        $this->render('Livre/add', compact('titre'));
    }
    public function ajouter(){
        $model = new LivreModel();
        $model->setNom($_POST['nom']);
        $model->setNbPages($_POST['nbPages']);
        $model->create();
        header('Location: '.URL.'livre/index');
    }
    public function edit(int $id){
        $model = new LivreModel();
        $livre = $model->find($id);
        $titre = 'Modifier un Livre';
        $this->render('Livre/edit', compact('livre', 'titre'));
    }
    public function modifier(){
        $model = new LivreModel();
        $model->setId(intval($_POST['id']));
        $model->setNom($_POST['nom']);
        $model->setNbPages($_POST['nbPages']);
        $model->update();
        header('Location: '.URL.'livre/index');
    }
    public function delete(int $id){
        $model = new LivreModel();
        $livre = $model->find($id);
        $titre = 'Modifier un Livre';
        $this->render('Livre/delete', compact('livre', 'titre'));
    }
    public function supprimer(){
        $model = new LivreModel();
        $model->setId(intval($_POST['id']));
        
        $model->delete();
        header('Location: '.URL.'livre/index');
    }
}