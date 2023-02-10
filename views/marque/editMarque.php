<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 



include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <a href="<?= URL ?>src/Controller/MarqueController.php?param=liste"><button class="btn btn-primary text-white">Retour aux marques</button></a>
    <div class="container text-center">
        <h4>Modifier la marque</h4>
        <div class="row d-flex justify-content-around">
            <form action="<?= URL ?>src/Controller/MarqueController.php?param=editMarque&id=<?= $marque->id ?>" method="post" class="col-4 ">

                <label for="name" class="label-control fw-bold">Nom</label>

                <input type="text" name="name" id="name" class="form-control mt-3" value ="<?= $marque->name ?>">
                
                <button type="submit" class="btn btn-success m-3">Enregistrer</button>
            </form>
        </div>
    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>