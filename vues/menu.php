<div class="container">
    <div class=" col-12  text-center ">
        <h1></h1>
    </div> 
</div> 

<div class="container">
<input type="text" id="rechercheNom" class="form-control"/>
</div>

<br>
 <div class="container">
    <div class=" col-12  text-center ">
      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="1" autocomplete="off" >
        <label class="btn btn-outline-primary" for="btnradio1">Sushi</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="2" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio2">Plat </label>
     </div>
    </div> 
</div>



<div class="container ">
    <div class=" col-12  text-center ">
    <?php 



  if(isset($_SESSION["alert"])){
	  ?>
	 <div id="alert" class='alert alert-success' role='alert' >
	  <?php echo $_SESSION["alert"] ?>
	</div>
	 
	<?php 
	unset($_SESSION["alert"]) ;
	}
	?>
  
	</div>
	<div class="row">
	
	  <span class="text-center m-4">
			<a class="btn btn-danger btn-lg me-5" aria-current="page" href="index.php?uc=panier">Payer <span class="badge bg-primary"><?= $nb ?> </span></a>
		</span>
	
    </div> 
</div> 



<div class="container-fluid ">
<div class="row justify-content-center">
        <div class="col"> <h2> Disponible  </h2> </div>
        </div>
        <div id="produits" class="row gy-2 d-flex justify-content-around  mb-5">
        <?php foreach($lesProduits as $produit) {?>
   <div class='card text-center border-dark mb-3' title="<?=$produit->getIngredient() ?>" style='width: 15rem;'>
   <br>
   <h5 class='card-title'><?=$produit->getNom() ?> </h5>

            <a href='index.php?uc=resto&resto=unProduit&idProd=<?=$produit->getIdProd() ?>'>
            <img class='card-img-top shadow-sm ' src='img/produit/<?= $produit->getPhoto() ?>'> 
            </a>
            <div class='card-body'>
			<p class='card-text'> <?= $produit->getPrixProd() ?>€</p>    
      <div class="card-footer bg-transparent border-dark bg:#fa8072;">  
       <a href='index.php?uc=resto&resto=ajoutPanier&idProd=<?=$produit->getIdProd() ?>' class='btn btn-danger'>Ajouter <i class="fas fa-plus"></i></a>
       <br>
       <br>
</div>

    </div> </div>
    <?php 
	} 
  ?>
<?php



?>
<script>
async function fetchJSON(url)
{
  let reponse=await fetch(url);
  let data= await reponse.json();
  console.log(data);
  return data;
}

function afficheProduit(desProduits)
{
  let chaineHTML="";
  for (const produit of desProduits) {
    chaineHTML+=` <div class='card text-center border-dark mb-3' style='width: 15rem;'>
   <br>
   <h5 class='card-title'>${produit.nom} </h5>

            <a href='index.php?uc=resto&resto=unProduit&idProd=${produit.idProd}'>
            <img class='card-img-top shadow-sm ' src='img/produit/${produit.photo}'> 
            </a>
            <div class='card-body'>
			<p class='card-text'> ${produit.prixProd}€</p>    
      <div class="card-footer bg-transparent border-dark bg:#fa8072;">  
       <a href='index.php?uc=resto&resto=ajoutPanier&idProd=${produit.idProd}' 
       class='btn btn-danger'>Ajouter <i class='fas fa-cart-plus fa-2x'></i></a>
       <br>
       <br>
</div>

    </div> </div>`
  }

  document.getElementById("produits").innerHTML=chaineHTML;
}

let btnRadios= document.getElementsByClassName("btn-check");
for(let unBtn of btnRadios)
{
  unBtn.addEventListener("click",function(event){
    let idCateg=event.target.value;
    fetchJSON("http://localhost/resto/indexAPI.php?uc=API&resto=produitJSON&idCateg="+idCateg).then(function(produits){
  // for(let produit of produits)
  // {
  //   console.log(produit);
    
  // }
  afficheProduit(produits)
});
  })
}

document.querySelector("#rechercheNom").addEventListener("keyup",function(event){
  let nomRechercher=event.target.value;
  fetchJSON("http://localhost/resto/indexAPI.php?uc=API&resto=nomProduitJSON&nom="+nomRechercher).then(
    function(data){
      
      afficheProduit(data);
    }
  )
}
)

// fetchJSON("http://localhost/resto/index.php?uc=API&resto=produitJSON&idCateg=1").then(function(produits){
//   // for(let produit of produits)
//   // {
//   //   console.log(produit);
    
//   // }
//   afficheProduit(produits)
// });
</script>
</div>

<!-- foreach($lesProduits as $produit) {?>
   <div class='card text-center border-dark mb-3' style='width: 15rem;'>
   <br>
   <h5 class='card-title'><?=$produit->getNom() ?> </h5>

            <a href='index.php?uc=resto&resto=unProduit&idProd=<?=$produit->getIdProd() ?>'>
            <img class='card-img-top shadow-sm ' src='img/produit/<?= $produit->getPhoto() ?>'> 
            </a>
            <div class='card-body'>
			<p class='card-text'> <?= $produit->getPrixProd() ?>€</p>    
      <div class="card-footer bg-transparent border-dark bg:#fa8072;">  
       <a href='index.php?uc=resto&resto=ajoutPanier&idProd=<?=$produit->getIdProd() ?>' class='btn btn-danger'>Ajouter <i class='fas fa-cart-plus fa-2x'></i></a>
       <br>
       <br>
<a tabindex="0" class="btn btn-s btn-clear" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="Dismissible popoverDismissible popoverDismissible popoverDismissible popoverDismissible popoverDismissible popoverDismissible popoverDismissible popover"> popover</a></span>
</div>

    </div> </div>-->
    <?php 
	// } 

  // $prixPanier=($_SESSION["prixPanier"]) ;

  ?>