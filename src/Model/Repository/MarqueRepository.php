<?php

namespace App\Model\Repository;
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/src/Core/BdManager.php'; 


use App\Core\BdManager;

class MarqueRepository
{
    private $bdmanager; 

    public function __construct(){
        $this->bdmanager = new BdManager();
    }

    // Fonction de récupération des éléments de la table "marque"
    public function findAll(){
        $result = $this->bdmanager->findAll("marque");
        return $result;
    }

    // Fonction d'insertion à la table "marque"
    public function add($post){
        $this->bdmanager->add($post, "marque");
    }

    public function delete($id){
        $this->bdmanager->delete('marque', $id);
        
    }

    public function find($id){
       return $this->bdmanager->find('marque', $id); 
    }

    public function edit($post, $id)
    {
        $this->bdmanager->edit($post, 'marque', $id);
    }    
}    