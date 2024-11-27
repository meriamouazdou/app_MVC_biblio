<?php

namespace App\Models;

class LivreModel extends Model{
    protected int $id;
    protected string $nom;
    protected int $nbPages;

    public function __construct(){
        $this->table = "livres";
    }

    public function getId():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function getNbPages():int{
        return $this->nbPages;
    }
    public function setId(int $id):void{
        $this->id = $id;
    }
    public function setNom(string $nom):void{
        $this->nom = $nom;
    }
    public function setNbPages(int $nbPages):void{
        $this->nbPages = $nbPages;
    }
    
}


?>