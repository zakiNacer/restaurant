<?php
if(isset($_GET["choix"])){
$choix=$_GET["choix"] ;
switch($choix)
{
    case "formulaire":
		include("vues/formAdmin.php") ;
		break;

    case "admin" :
        include("vues/formAdmin.php");
        break;
		
    // case "client" :
    //     include("vues/formClient.php");
    //     break;		

		
	case "verif" :
    	$rep=Admin::verifier($_POST["login"], md5($_POST["mdp"])) ;
    
		if($rep==true){
			$_SESSION["autorisation"]="OK" ;
		  	// include("vues/accueilAdmin.php") ;
			$lesProduits=produit::afficherTous();
			include ("vues/listeProduitsAdmin.php") ;
			}
			else
			{	
		    include("vues/echecRecherche.php") ;
			}
		break ;
	
	case "connecter" :
			$lesProduits=produit::afficherTous();
			include ("vues/listeProduitsAdmin.php") ;
			break ;
	
	case "deconnexion":
		Admin::deconnecter() ;
		include "vues/accueil.php" ;
		break;
}
} 