<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <a href="<?= URL ?>src/Controller/TvaController.php?param=liste"><button class="btn btn-primary text-white">Retour aux marques</button></a>
    <div class="container">
        <div class="row d-flex justify-content-center text-center">
            <h4>Entrez une nouvelle tva à ajouter</h4>
            <form action="<?= URL ?>src/Controller/TvaController.php?param=editTva&id=<?= $tva->id ?>" method="post" class="col-4 ">

                <label for="name" class="label-control fw-bold">Nom</label>
                <input type="text" name="name" id="name" class="form-control mt-3" value ="<?php if(isset($tva->name)){echo $tva->name;} ?>">

                <label for="taux" class="label-control fw-bold">taux</label>
                <input type="number" step="0.5" name="taux" id="taux" class="form-control mt-3" value ="<?php if(isset($tva->taux)){echo $tva->taux * 100;} ?>">
                
                <button type="submit" class="btn btn-success m-3">Enregistrer</button>
            </form>
        </div>
    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>