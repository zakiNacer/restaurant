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
