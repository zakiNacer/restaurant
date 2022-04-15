<?php
if(isset($_SESSION["autorisation"]) and $_SESSION["autorisation"]=="OK"){
?>
<div class="container">
<div class="row center mt-5">
<div class="col">
    <form method="POST" action="index.php?uc=resto&resto=valideModif" enctype="multipart/form-data">
     <div class="form-group">
    <label for="formGroupExampleInput">Nom du produit</label>
    <input type="text" class="form-control" id="formGroupExampleInput"  name="nom" value="<?php echo $produit->getNom() ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Prix du produit</label>
    <input type="text" class="form-control" id="formGroupExampleInput2"  name="prixProd" value="<?= $produit->getPrixProd() ?>">
    <br>
    <label for="formGroupExampleInput3">Image du produit</label>
    <input type="text" name="photo1" class="form-control" id="formGroupExampleInput3"  value="<?= $produit->getPhoto() ?>">
    <br>ou pour modifier l'image <input type="file" name="photo2" accept="image/png, image/jpg" >
    
  <div class="form-check">
  <input class="form-check-input" type="radio" name="categorie" value="1" id="categorie"checked>
  <label class="form-check-label" for="flexRadioDefault1">
    entrée
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="categorie" value="2" id="categorie" >
  <label class="form-check-label" for="flexRadioDefault2">
    plat
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="categorie" value="3" id="categorie">
  <label class="form-check-label" for="flexRadioDefault2">
    dessert
  </label>
</div>

<div class="row center mt-5">
    <div class="col-md-6">
  <div class="list-group">
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox"  name="ingredient1" value="saumon" >
    Saumon
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox"  name="ingredient2" value="riz"  >
    Riz
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="ingredient3" value="thon"  >
    Thon
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="ingredient4" value="avocat"  >
    Avocat
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="ingredient5" value="crevette"  >
    Crevette
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="ingredient6" value="algue"  >
    Algue nori
  </label>
  <label class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" name="ingredient7" value="fromage"  >
    Fromage
  </label>
</div>
    <br> 
    <input type="hidden" name="idProd" value="<?= $produit->getIdProd() ?>">
    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
  </div>
</form>
</div>
</div>
</div>
<?php
}
echo $produit->getIdProd();
?>
