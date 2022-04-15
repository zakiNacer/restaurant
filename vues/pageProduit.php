

<div class='card text-center' style='width: 15rem;'>
            <img class='card-img-top' src='img/produit/<?= $produit->getPhoto() ?>'>
            <div class='card-body'>
            <h5 class='card-title'><?=$produit->getNom() ?> </h5>
			<p class='card-text'> <?= $produit->getPrixProd() ?>€</p>    
    <a href='index.php?uc=resto&resto=ajoutPanier&idProd=<?=$produit->getIdProd() ?>' 
    class='btn btn-danger'>Ajouter <i class='fas fa-cart-plus fa-2x'></i></a>
    </div> </div>

<?php
    echo "<h2>recette</h2>";
     echo $produit->getIngredient("1")

?>