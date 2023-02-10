<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <div class="container flex-wrap">
        <div class="row m-3">
            <div class="col-5 border border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">marque</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($marques as $marque) : ?>
                        <tr>
                            <th scope="row"><?= $marque->id ?></th>
                            <td> <?= $marque->name ?> </td>
                            <td>
                                <a href="<?= URL ?>src/Controller/MarqueController.php?param=showMarque&id=<?= $marque->id?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= URL ?>src/Controller/MarqueController.php?param=editMarque&id=<?= $marque->id?>"><i class="fas fa-cog"></i></a>
                                <a href="<?= URL ?>src/Controller/MarqueController.php?param=deleteMarque&id=<?= $marque->id?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>        
            </div>

            <div class="col-5 offset-2 border border-dark">
                <h4 class="text-center">Actions</h4>
                <a href="<?= URL ?>src/Controller/MarqueController.php?param=addMarque"><button class="btn btn-success" >Ajouter une marque</button></a>
                
            </div>

        </div>
        
        
    </div>
    
        
    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>