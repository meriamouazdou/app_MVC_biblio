<?php

namespace App\Controllers;


class Controller{
    private string $template = 'default';
    public function render(string $fichier, array $data=[])
    {
        extract($data);
        ob_start();
        require_once('Views/'.$fichier.'.php');

        $contenu = ob_get_clean();

        require_once('Views/'.$this->template.'.php');
    }
}