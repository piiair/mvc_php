<?php

use App\Model\Repository\TvaRepository;

$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 
include_once $path . '/src/Model/Repository/TvaRepository.php'; 

$tvaRepo = new TvaRepository();

// On récupère le param dans l'URL
if($_GET['param']){
    $param = $_GET['param'];
}

switch ($param){
    case 'liste':
        // on affiche la liste des marques
        $tvas = $tvaRepo->findAll();
        include_once ROOT . "views/tva/tva.php";
        break;
    
    case 'addTva':
        $error = "";
        
        if($_POST){
            extract($_POST);
            $taux = (float) $_POST["taux"];
            if (!$_POST['name']){
                $error .= " Entrez un nom.";
            }
            if (!$taux or !is_float($taux)){
                $error .= " Entrez un taux décimal.";
            }
            if (!$error){
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->add($_POST);
                header("location: TvaController.php?param=liste");
            }
        }
        include_once ROOT . "views/tva/addTva.php";
        break;

    case 'deleteTva':
        $id = $_GET['id'];
        $tvaRepo->delete($id);
        header("location: TvaController.php?param=liste");
        break;

    case 'showTva':
        $id = $_GET['id'];
        $tva = $tvaRepo->find($id);
        include_once ROOT . "views/tva/showTva.php";
        break;

    case 'editTva':
        $error = "";
        $id = $_GET['id'];
        $tva = $tvaRepo->find($id);
        if($_POST){
            $taux = (float) $_POST["taux"];
            if (!$_POST['name']){
                $error .= " Entrez un nom.";
            }
            if (!$taux or !is_float($taux)){
                $error .= " Entrez un taux décimal.";
            }
            if (!$error){
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->edit($_POST, $id);
                header("location: TvaController.php?param=liste");
            }   
        }
        include_once ROOT . "views/tva/editTva.php";
        break;
}