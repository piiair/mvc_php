<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <!-- L'alerte en cas d'erreur -->
    <?php if ($error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif ?>

    <!-- Bouton de retour à la liste -->
    <a href="<?= URL ?>src/Controller/TvaController.php?param=liste"><button class="btn btn-primary text-white">Retour aux marques</button></a>
    <div class="container">

        <!-- partie formulaire -->
        <div class="row d-flex justify-content-center text-center">
            <h4>Entrez une nouvelle tva à ajouter</h4>
            <form action="<?= URL ?>src/Controller/TvaController.php?param=addTva" method="post" class="col-4 text-center">

                <label for="name" class="label-control ">Nom</label>
                <input type="text" name="name" id="name" class="form-control mt-2" value="<?php if(isset($name)){echo $name;} ?>">

                <label for="taux" class="label-control mt-5">taux</label>
                    <p>Pour une tva à 10% entrez 10.</p>
                <input type="number" step="0.5" name="taux" id="taux" class="form-control mt-2" value="<?php if(isset($taux)){echo $taux;} ?>">
                

                <button type="submit" class="btn btn-success m-3">Enregistrer</button>
            </form>
        </div>
    </div>


    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>