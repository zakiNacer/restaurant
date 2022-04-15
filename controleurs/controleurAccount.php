<?php
if(isset($_GET["compte"])){
$compte=$_GET["compte"] ;
switch($compte)
{
    case "login" :
        include("vues/account.php");
        break;


		


		
	// case "verif" :

    // 	$rep=Admin::verifier($_POST["login"], md5($_POST["mdp"])) ;
    
	// 	if($rep==true){
	// 		$_SESSION["autorisation"]="OK" ;
	// 	  	include("vues/accueilAdmin.php") ;
	// 		$lesProduits=produit::afficherTous();
	// 		include ("vues/listeProduitsAdmin.php") ;
	// 		}
	// 		else
	// 		{	
	// 	    include("vues/echecRecherche.php") ;
	// 		}
	// 	break ;
	
	// case "deconnexion":
	// 	Admin::deconnecter() ;
	// 	include "vues/accueil.php" ;
	// 	break;
}
}