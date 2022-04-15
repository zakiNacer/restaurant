<?php 

if(isset($_SESSION["panier"]) and !empty($_SESSION["panier"]))
{
 
$total =0;
$frais=5;
$totalttc = 0;

 ?>
 <div class="container">
	  <div class="row">
	 
 <h1 class="text-center text-danger"> Votre délicieux panier </h1>

 </div>
 <div class="row">
    <div class="col-12 col-md-12">
         <table class="table table-striped mt-5">
        <thead>
          <tr >
            <th scope="col" >Produit</th>
			
            <th scope="col" >Prix Unit.</th>
            <th scope="col">Quantité</th>
            <th scope="col">Montant</th>
			<th scope="col" class="text-center">Ajouter un paquet</th>
			<th scope="col" class="text-center">Retirer un paquet</th>
           </tr>
        </thead>
        <tbody>
		
           <?php 
		   
			   foreach($_SESSION['panier'] as $idProd=>$quantite )
			{
				$produits=Produit::trouverUnProduit($idProd) ;
			?>
    <tr>           
            <td><img src='img/produit/<?= $produits->getPhoto() ?>' class="img-fluid w-25"   alt="..."><?php echo $produits->getNom();?></td>
            
			<td><?php echo number_format($produits->getPrixProd(),2,',',' ');?> €</td>
        <td> 
              <?php echo $quantite; ?>
        </td>
        <td> <?php echo number_format($produits->getPrixProd()* $quantite,2,',',' ');?>€</td>
		<td> <a href='index.php?uc=resto&resto=ajoutSuppPanier&idProd=<?php echo $produits->getIdProd()?>' ><i class="fa fa-plus fa_3x" aria-hidden="true"></i> </a></td>
		<td> <a href='index.php?uc=resto&resto=retraitPanier&idProd=<?php echo $produits->getIdProd() ?>' ><i class="fa fa-minus " aria-hidden="true"></i></td>
    </tr>
          <?php $total += $produits->getPrixProd()*$quantite;?>
          <?php } ?>
       

        </tbody>
      </table>
	  </div>
	  </div>
	   <div class="row">
	  <div class="col-12 col-md-12">
	  <table class= "table table-dark">
       <tr><th> Total HT  </th> <td> <em><?php echo number_format($total,2,',',' ') ?> €</em></td> </tr>
        <tr> <th> TVA(19.6 %) </th> <td> <em>  <?php echo number_format($total*0.196,2,',',' ') ?> €</em></td></tr>
		<tr> <th>Frais de port </th> <td> <em> <?php echo $frais ?> €</em></td></tr>
        <tr> <th> TOTAL TTC </th> <td> <em> <?php echo number_format($total+$frais,2,',',' ') ?> €</em></td> </tr>
  		</table>
		 </div>
		 </div>
		 <div class="row">
		 <div class="col-md-6">
             <a href="index.php?uc=resto&resto=menu" class="btn btn-info">Continuer mes achats</a> <br> <br>

         <a href="index.php?uc=commande&facture=formCommande" class="btn btn-info" >Payer</a> <br> <br>
		
		<a href="index.php?uc=resto&resto=viderPanier" class="btn btn-info">Vider le panier</a>
             </div>     
     
	 </div>
<?php
	 }

else
{
include("vues/panierVide.php") ;
}


?>
