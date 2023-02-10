<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <a href="<?= URL ?>src/Controller/MarqueController.php?param=liste"><button class="btn btn-primary text-white">Retour aux marques</button></a>
    
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id de la marque</th>
                    <th scope="col">nom de la marque</th>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $marque->id ?></th>
                    <td> <?= $marque->name ?> </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
        
    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>