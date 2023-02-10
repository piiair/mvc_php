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
    <a href="<?= URL ?>src/Controller/ProduitController.php?param=liste"><button class="btn btn-primary text-white">Retour aux Produits</button></a>
    <div class="container">

        <!-- partie formulaire -->
        <div class="row d-flex justify-content-center text-center" enctype="multipart/form-data">
            <h4>Renseignez un nouveau produit</h4>
            <form action="<?= URL ?>src/Controller/ProduitController.php?param=addProduit" method="post" class="col-4 text-center ">

                <!-- Nom -->
                <div>
                    <label for="name" class="label-control ">Nom</label>
                    <input type="text" name="name" id="name" class="form-control mt-2" value="<?php if(isset($name)){echo $name;} ?>">
                </div>
                
                <!-- Marque -->
                <div>
                    <label for="marque">Marque</label>
                    <?php if($currentMarque):?>
    
                        <option value=''>$currentMarque->name</option>
                    <?php endif ?>  
                        
                    <select name="marque_id" id="marque" class="form-control">
                        <?php foreach ($marques as $marque) : ?>
                            <option value="<?= $marque->id ?>"><?= $marque->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <!-- Prix -->
                <div>
                    <label for="prix" class="label-control">Prix</label>
                    <input type="number" step="0.01" name="prix_unit" id="prix" class="form-control" value="<?php if(isset($prix_unit)){echo $prix_unit;} ?>">
                </div>
                
                <!-- Tva -->
                <label for="tva">Tva</label>
                <select name="tva_id" id="tva" class="form-control">
                    <?php foreach ($tvas as $tva) : ?>
                        <option value="<?= $tva->id ?>"><?= $tva->taux ?></option>
                    <?php endforeach ?>
                </select>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="label-control">Stock</label>
                    <input type="number" name="quantity" id="quantity" class="form-control">
                </div>

                <!-- Ref -->
                <div>
                    <label for="ref" class="label-control">Référence</label>
                    <input type="text" name="ref" id="ref" class="form-control" value="<?php if(isset($ref)){echo $ref;} ?>">   
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="label-control">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="<?php if(isset($description)){echo $description;} ?>"></textarea>    
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="label-control">Image</label>
                    <input type="file" name="image" id="image">   
                </div>

                <!-- Ram -->
                <div>
                    <label for="ram" class="label-control ">Ram</label>
                    <input type="text" name="ram" id="ram" class="form-control mt-2" value="<?php if(isset($ram)){echo $ram;} ?>">
                </div>
                
                <button type="submit" class="btn btn-success m-3">Enregistrer</button>
            </form>
        </div>
    </div>

    <?php include_once ROOT . 'views/includes/footer.php'; ?>
</body>

</html>