<?php

use App\Model\Repository\MarqueRepository;

$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 
include_once $path . '/src/Model/Repository/MarqueRepository.php'; 

$marqueRepo = new MarqueRepository();

// On récupère le param dans l'URL
if($_GET['param']){
    $param = $_GET['param'];
}

// On applique un certain code en fonction de ce param
switch ($param){
    case 'liste':
        // on affiche la liste des marques
        $marques = $marqueRepo->findAll();
        include_once ROOT . "views/marque/marque.php";
        break;

    case 'addMarque':
        // on affiche un formulaire pour ajouter
        if($_POST){
            $marqueRepo->add($_POST);
            header("location: MarqueController.php?param=liste");
        }
        include_once ROOT . "views/marque/addMarque.php";
        break;

    case 'deleteMarque':
        $id = $_GET['id'];
        $marqueRepo->delete($id);
        header("location: MarqueController.php?param=liste");
        break;
    case 'showMarque':
        $id = $_GET['id'];
        $marque = $marqueRepo->find($id);
        include_once ROOT . "views/marque/showMarque.php";
        break;
    case 'editMarque':
        $id = $_GET['id'];
        $marque = $marqueRepo->find($id);
        if($_POST){
            $marqueRepo->edit($_POST, $id);
            header("location: MarqueController.php?param=liste");
        }
        include_once ROOT . "views/marque/editMarque.php";
        break;
}

