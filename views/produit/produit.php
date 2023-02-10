<?php
$path = ($_SERVER['DOCUMENT_ROOT']);
include_once $path . '/init.php'; 

include_once ROOT . 'views/includes/header.php'; 
?>

<body>
    <?php include_once ROOT . 'views/includes/navbar.php'; ?> 
    <div class="container flex-wrap">
    
        <h4 class="text-center">Actions</h4>
        <a href="<?= URL ?>src/Controller/ProduitController.php?param=addProduit"><button class="btn btn-success" >Ajouter un Produit</button></a>  
           
        <div class="row m-3">
            <div class="col-6 border border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Ref</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Marque</th>
                            <th scope="col">Image</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produits as $produit) : ?>
                        <tr>
                            <td> <?= $produit->id ?> </td>
                            
                            <td> <?= $produit->name ?> </td>
                            <td> <?= $produit->ref ?> </td>
                            <td> <?= $produit->prix_unit ?> </td>
                            <td> <?= $produit->quantity ?> </td>
                            <td> <?= $produit->marque_id ?> </td>
                            <td> <?= $produit->image ?> </td>
                            <td>
                                <a href="<?= URL ?>src/Controller/ProduitController.php?param=showProduit&id=<?= $produit->id?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= URL ?>src/Controller/ProduitController.php?param=editProduit&id=<?= $produit->id?>"><i class="fas fa-cog"></i></a>
                                <a href="<?= URL ?>src/Controller/ProduitController.php?param=deleteProduit&id=<?= $produit->id?>"><i class="fas fa-trash-alt"></i></a>
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