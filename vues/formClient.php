<div class="container">
<div class="row">
<div class="col-md-4 justify-content-center">

<form method="POST" action="index.php?uc=client&client=newClient" enctype='multipart/form-data'>
  <div class="form-group">
    <label for="formGroupExampleInput">Nom</label>
    <input type="text" class="form-control" id="formGroupExampleInput"  name="nom">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Prenom</label>
    <input type="text" class="form-control" id="formGroupExampleInput2"  name="prenom">
	 </div>
<br>
<div class="form-group">
    <label for="formGroupExampleInput2">Adresse de livraison</label>
    <input type="text" class="form-control" id="formGroupExampleInput2"  name="adresse">
	 </div>
<br>  
   <div class="form-group">
    <label for="formGroupExampleInput2">Numero de telephone</label>
    <input type="number" class="form-control" id="formGroupExampleInput2"  name="tel">
	 </div>
 <br>
 <div class="form-group">
    <label for="formGroupExampleInput2">Code Postal</label>
    <input type="number" class="form-control" id="formGroupExampleInput2"  name="cp">
	 </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Adresse Mail</label>
    <input type="text" class="form-control" id="formGroupExampleInput2"  name="mail">
	 </div>


</div>
<div class="col-md-8 justify-content-center">
<?php
	 
include("vues/tabPanier.php") ;

?>

</div>
<div class="row">
  <div class='col-md-6'> </div>
		<div class="col-md-6">
	   <button type="submit" class="btn btn-primary">Payer</button>
</form>
    </div>
  </div>
</div>  

<hr class="my-4">

<h4 class="mb-3">Paiement</h4>

<div class="my-3">
  <div class="form-check">
    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
    <label class="form-check-label" for="credit">Carte de crédit</label>
  </div>
  <div class="form-check">
    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
    <label class="form-check-label" for="paypal">PayPal</label>
  </div>
</div>

<div class="row gy-3">
  <div class="col-md-5">
    <label for="cc-name" class="form-label">Nom de la carte</label>
    <input type="text" class="form-control" id="cc-name" placeholder="" required>
    <div class="invalid-feedback">
      Name on card is required
    </div>
  </div>

  <div class="col-md-3">
    <label for="cc-number" class="form-label">Numéro de la carte</label>
    <input type="text" class="form-control" id="cc-number" placeholder="" required>
    <div class="invalid-feedback">
      Credit card number is required
    </div>
  </div>

  <div class="col-md-5">
    <label for="cc-expiration" class="form-label">Date d'expiration</label>
    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
    <div class="invalid-feedback">
      Expiration date required
    </div>
  </div>

  <div class="col-md-2">
    <label for="cc-cvv" class="form-label">CVV</label>
    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
    <div class="invalid-feedback">
      Security code required
    </div>
  </div>
</div>

<hr class="my-4">

<!-- <input type="hidden" name="prix" value="<?php echo $_GET["price"]; ?>"> -->

</form>
</div><button class="btn btn-primary" type="submit">Valider la commande</button>

</div>  
</div>
 <br>