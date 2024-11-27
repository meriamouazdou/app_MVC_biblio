<?php

namespace App\Models;
use App\Core\Database;

class Model{
    protected string $table;
    public function __construct(){

    }
    public function requete(string $sql, array $attributs = null){
        $db = Database::getInstance();
        if($attributs === null){
            // requete simple
            $query = $db->query($sql);
            return $query;
        }else {
            // req préparée
            $query = $db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }
    }
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        return $this->requete($sql)->fetchAll();
    }
    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE id = ? ";
        return $this->requete($sql,[$id])->fetch();
    }
    public function findBy(array $criteres){
        $champs = [];
        $valeurs = [];
        foreach($criteres as $champ=>$valeur){
            $champs[] = "$champ = ? ";
            $valeurs[] = $valeur;
        }
        $s = implode(" and ", $champs);
        $sql = "SELECT * FROM $this->table WHERE $s";
        return $this->requete($sql,$valeurs);
    }
    public function create(){
        $champs = [];
        $params = [];
        $valeurs = [];
        foreach($this as $champ=>$valeur){
            if($champ !== "table" && $valeur!==null){
                $champs[] = $champ;
                $params[] = ' ? ';
                $valeurs[] = $valeur;
            }
            
        }
        // INSERT INTO LIVRE (chmap0, champ1) VALUES (?, ?)
        $s = implode(" , ", $champs);
        $p = implode(" , ", $params);
        $sql = "INSERT INTO $this->table ( $s ) VALUES ( $p )";
        echo $sql;
        return $this->requete($sql,$valeurs);
    }
    public function update(){
        $champs = [];
        $valeurs = [];
        foreach($this as $champ=>$valeur){
            if($champ !== "table" && $valeur!==null){
                $champs[] = "$champ = ? ";
                $valeurs[] = $valeur;
            }            
        }
        $valeurs[] = $this->id;
        // UPDATE LIVRE  SET chmap0 = ?, champ1=? WHERE id = ?
        $s = implode(" , ", $champs);
        $sql = "UPDATE $this->table SET $s WHERE id = ?";
        return $this->requete($sql,$valeurs);
    }
    public function delete(){        
        $sql = "DELETE FROM $this->table  WHERE id = ?";
        return $this->requete($sql,[$this->id]);
    }
}


?>