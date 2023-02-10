<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <div class="container flex-wrap">
        <h4 class="text-center">Actions</h4>
        <a href="<?= URL ?>src/Controller/TvaController.php?param=addTva"><button class="btn btn-success" >Ajouter une TVA</button></a>
        <div class="row m-3">
            <div class="col-5 border border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Taux</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tvas as $tva) : ?>
                        <tr>
                            <td> <?= $tva->id ?> </td>
                            <td> <?= $tva->name ?> </td>
                            <td> <?= $tva->taux ?> </td>
                            <td>
                                <a href="<?= URL ?>src/Controller/TvaController.php?param=showTva&id=<?= $tva->id?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= URL ?>src/Controller/TvaController.php?param=editTva&id=<?= $tva->id?>"><i class="fas fa-cog"></i></a>
                                <a href="<?= URL ?>src/Controller/TvaController.php?param=deleteTva&id=<?= $tva->id?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>        
            </div>
        </div> 
    </div>
   
    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>