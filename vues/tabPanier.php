<?php 

if(isset($_SESSION["panier"]) and !empty($_SESSION["panier"]))
{
 
$total =0;
$frais=5;
$totalttc = 0;

 ?>
 <div class="container">
	  <div class="row">
 </div>
 <div class="row">
 <div class="col-md-12">
 <table class="table">
  <thead>
          <tr >
            <th scope="col" >Produit</th>
			
            <th scope="col" >Prix Unit.</th>
            <th scope="col">Quantité</th>
            <th scope="col">Montant</th>
           </tr>
           </thead>
  <tbody>
		
           <?php 
		   
			   foreach($_SESSION['panier'] as $idProd=>$quantite )
			{
				$produits=Produit::trouverUnProduit($idProd) ;
				  
			?>
    <tr>           
            <td><?php echo $produits->getNom();?></td>
            
			<td><?php echo number_format($produits->getPrixProd(),2,',',' ');?> €</td>
        <td> 
              <?php echo $quantite; ?>
        </td>
        <td> <?php echo number_format($produits->getPrixProd()* $quantite,2,',',' ');?>€</td>
    </tr>
          <?php $total += $produits->getPrixProd()*$quantite;?>
          <?php } ?>
       
          </tbody>
  <tfoot>
      </table>
	  </div>
	  </div>
	   <div class="row">
	  <div class='col-md-6'> 
      <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Emportée
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2" value="">
    Livraison
  </label>
</div></div>
	  <div class="col-md-6">
		<tr> <th>Frais de port </th> <td> <em> <?php echo $frais ?> €</em></td></tr>
        <br>
    <tr> <th> TOTAL </th> <td> <em> <?php echo number_format($total+$frais,2,',',' ') ?> €</em></td> </tr>
    <hr></tfoot>
</table>

		 </div>
		 </div>
<?php
	 }
else
{
include("vues/panierVide.php") ;
}
?>
