<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    
    
    <div class="container">
        <a href="<?= URL ?>src/Controller/TvaController.php?param=liste"><button class="btn btn-primary text-white">Retour aux Tva</button></a>
        <div class="row">
            <div class="col-6">
                <p>nom de la TVA : <?= $tva->name ?></p>
                <p>taux de la TVA : <?= $tva->taux ?></p>
                <p>taux en pourcentage : <?= $tva->taux * 100 ?>%</p>
            </div>
        </div>
    </div>
    
        
    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>