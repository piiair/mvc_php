<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <a href="<?= URL ?>src/Controller/MarqueController.php?param=liste"><button class="btn btn-primary text-white">Retour aux marques</button></a>
    <div class="container">
        <div class="row d-flex justify-content-center text-center">
            <h4>Entrez une nouvelle marque à ajouter</h4>
            <form action="<?= URL ?>src/Controller/MarqueController.php?param=addMarque" method="post" class="col-4 text-center">

                <label for="name" class="label-control ">Nom</label>

                <input type="text" name="name" id="name" class="form-control mt-3">
                
                <button type="submit" class="btn btn-success m-3">Enregistrer</button>
            </form>
        </div>
    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>