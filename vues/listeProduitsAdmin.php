   <div class="row">
         <div class="text-center">
<?php		
  if(isset($_SESSION["alert"])){
	?>
 <div class='alert alert-success' role='alert' data-auto-dismiss="5">
  <?php echo $_SESSION["alert"]  ;
  unset($_SESSION["alert"] );
  ?>
</div>

<?php
  }
?> 

<?php
if($_SESSION["autorisation"]=="OK"){
	?>
<div class="container">
          <div class="row">
             <div class="col"> 
				<h1 class="text-center text-danger mt-3"> Bienvenue sur la page d'administration du site </h1>
		</div>
         </div>
		 <div class="row">
			<span class="m-2 text-center"><a href="index.php?uc=admin&choix=deconnexion" class="btn btn-danger">Se deconnecter</a> </span>
		 </div>
		 <div class="row">
			<span class="m-2 text-center"><a href="index.php?uc=resto&resto=ajouter" class="btn btn-danger">Ajouter</a> </span>
		 </div>
		</div>
<?php
}
?> 
<div class="container">
<div class="row justify-content-center">
        <div class="col"> <h2> Nos produits </h2> </div>
        </div>
        <div class="row">
<?php

	foreach($lesProduits as $produit) { ?>
			<div class='card text-center' style='width: 15rem;'>
            <img class='card-img-top' src='img/produit/<?= $produit->getPhoto() ?>' >
            <div class='card-body'>
            <h5 class='card-title'><?=$produit->getNom() ?> </h5>
			<p class='card-text'> <?= $produit->getPrixProd() ?>€</p>
			<a id='mywish' href='index.php?uc=resto&resto=modifier&modif=<?=$produit->getIdProd() ?>' class='btn btn-danger'>Modifier</a>
            <a id='mywish' href='index.php?uc=resto&resto=supprimer&supp=<?=$produit->getIdProd() ?>' class='btn btn-danger' onclick="return confirm('Voulez vous supprimer ça ?')">Supprimer</a>        
			
			</div></div>
		<?php
	}

?>
 </div>

